<div class="w-full border border-[#DAD3CE] rounded-2xl shadow-md">
    <div class="px-2.5 pt-2.5 pb-5 rounded-t-2xl text-dark space-y-2.5">
        <div class="flex flex-row md:flex-col items-center gap-2.5">
            <img src="/assets/img/icon/plan.webp" alt="Plan Icon" class="mx-auto w-[100px]" />
            <div class="space-y-2.5">
                <h4 class="font-semibold tracking-wider text-lg uppercase md:text-center">{{ $title }}</h4>
                <p class="text-xs">{{ $description }}</p>
            </div>
        </div>

        <div class="grid md:grid-cols-1 grid-cols-2 gap-2.5">
            @foreach ($benefits as $benefit)
                <div class="flex items-center gap-1 text-[#414E52] border-t border-dashed border-[#92A2A6] pt-2.5">
                    <x-icon.print class="w-4" />
                    <span class="text-[10px] uppercase">{{ $benefit }}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-2.5 rounded-b-2xl bg-[#FCF4ED] text-[#414E52] text-center">
        <p class="text-xs">Starts from</p>
        <h6 class="font-semibold">Rp{{ number_format($price, 0, ',', '.') }}*</h6>
        <p class="font-semibold text-sm">/pax/month</p>
    </div>
</div>
