<?php

namespace App\Livewire;

use App\Forms\Components\TripayChannel;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Plan;
use App\Services\Tripay;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Illuminate\Support\Str;

class Book extends Component implements HasForms
{
    use InteractsWithForms;

    public $plan;
    public $location;
    public ?array $data = [];

    public $tripayChannels;
    public $selectedTripayChannel;

    public function mount($plan, $location): void
    {
        $getData = (new Tripay)->paymentChannel();
        if ($getData['success']) {
            $this->tripayChannels = collect($getData['data'])->where('active', 1)->groupBy('group')->toArray();
        } else {
            $this->tripayChannels = [];
        }

        $this->form->fill([
            'plan_id' => $plan->id ?? '',
            'location_id' => $location->id ?? '',
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order')
                        ->schema([
                            Select::make('plan_id')
                                ->label('Plan')
                                ->required()
                                ->options(Plan::pluck('name', 'id')),
                            Select::make('location_id')
                                ->label('Location')
                                ->required()
                                ->options(Location::pluck('name', 'id')),
                        ]),
                    Wizard\Step::make('Data')
                        ->schema([
                            TextInput::make('name')
                                ->placeholder('Your Name')
                                ->required(),
                            TextInput::make('email')
                                ->email()
                                ->placeholder('Your Email')
                                ->required(),
                            TextInput::make('phone')
                                ->placeholder('Your Phone')
                                ->required(),
                        ]),
                    Wizard\Step::make('Billing')
                        ->schema([
                            TripayChannel::make('selectedTripayChannel')
                                ->label('Select Payment Method')
                                ->required()
                                ->options($this->tripayChannels),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                <x-filament::button
                    type="submit"
                    size="sm"
                >
                    Submit
                </x-filament::button>
            BLADE)))
            ])
            ->statePath('data');
    }

    public function book()
    {
        $this->validate([
            'data.selectedTripayChannel' => 'required',
        ]);

        $plan = Plan::find($this->form->getState()['plan_id']);
        $location = Location::find($this->form->getState()['location_id']);

        $trxId = date("Ymd") . strtoupper(Str::random(6));
        $amount = $plan->price;

        $pay = new Payment();
        $pay->trx_id = $trxId;
        $pay->plan_id = $plan->id;
        $pay->customer_name = $this->form->getState()['name'];
        $pay['meta->customer_email'] = $this->form->getState()['email'];
        $pay['meta->customer_phone'] = $this->form->getState()['phone'];
        $pay->location_id = $location->id;
        $user = [
            'name' => $this->form->getState()['name'],
            'email' => $this->form->getState()['email'],
            'phone' => $this->form->getState()['phone'],
        ];

        $signature = (new Tripay)->createSignature($trxId, $amount);
        $createTrx = (new Tripay)->createTransaction($user, $signature, $this->form->getState()['selectedTripayChannel'], $trxId, $amount, [
            [
                'sku' => 'GW-' . $plan->id,
                'name' => $plan->name . ' @ ' . $location->name,
                'price' => $amount,
                'quantity' => 1,
            ]
        ]);

        if ($createTrx['success']) {
            $pay['meta->reference'] = $createTrx['data']['reference'];
            $pay['meta->payment_method'] = $createTrx['data']['payment_method'];
            $pay['meta->payment_name'] = $createTrx['data']['payment_name'];
            $pay['meta->fee_merchant'] = $createTrx['data']['fee_merchant'];
            $pay['meta->fee_customer'] = $createTrx['data']['fee_customer'];
            $pay['meta->total_fee'] = $createTrx['data']['total_fee'];
            $pay['meta->amount_received'] = $createTrx['data']['amount_received'];
            $pay['meta->pay_code'] = $createTrx['data']['pay_code'];
            $pay['meta->pay_url'] = $createTrx['data']['pay_url'];
            $pay['meta->checkout_url'] = $createTrx['data']['checkout_url'];
            $pay['meta->instructions'] = $createTrx['data']['instructions'];
            if (isset($createTrx['data']['qr_url'])) {
                $pay['meta->qr_url'] = $createTrx['data']['qr_url'];
            }
        } else {
            return Notification::make()->title($createTrx['message'] ?? 'Error')->danger()->send();
        }
        $pay->amount = $amount;
        $pay->due_at = now()->addDay();
        $pay->save();

        return redirect()->away($pay->meta['checkout_url']);
    }

    public function render()
    {
        return view('livewire.book');
    }
}
