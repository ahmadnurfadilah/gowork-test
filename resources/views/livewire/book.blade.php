<div class="w-full rounded-2xl border border-primary p-6">
    <form wire:submit="book">
        {{ $this->form }}
    </form>

    <x-filament-actions::modals />
</div>
