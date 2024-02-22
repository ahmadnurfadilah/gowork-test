<x-layouts.app>
    <x-navbar />

    <section class="my-16">
        <h2 class="uppercase font-bold text-2xl text-center tracking-widest text-dark mb-7">Book Your Seat</h2>
        <div class="max-w-xl mx-auto px-4">
            @livewire('book', ['location' => $location, 'plan' => $plan])
        </div>
    </section>

    <x-footer />

    @livewire('notifications')
    @push('scripts')
        @filamentStyles
        @filamentScripts
        @livewireStyles
        @livewireScripts
    @endpush
</x-layouts.app>
