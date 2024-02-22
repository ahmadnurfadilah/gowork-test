<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->
        @foreach ($getOptions() as $group => $opts)
          <div>
            <div class="font-bold uppercase tracking-wider text-sm mb-2 my-4">{{ $group }}</div>
            @foreach ($opts as $opt)
              <div class="flex justify-between items-center p-2 border gap-4 cursor-pointer"
                :class="{'bg-primary/20 text-primary': state === '{{ $opt['code'] }}', 'bg-white text-dark hover:bg-primary/10': state !== '{{ $opt['code'] }}'}"
                x-on:click="state = '{{ $opt['code'] }}'">
                <img src="{{ $opt['icon_url'] }}" alt="" class="w-12">
                <div class="flex-1">
                  <h6 class="font-bold">{{ $opt['name'] }}</h6>
                  <p class="text-xs opacity-50">Admin Fee: Rp{{ $opt['fee_customer']['flat'] }} {{ $opt['fee_customer']['percent'] > 0 ? '+ ' . $opt['fee_customer']['percent'] . '%' : ''  }}</p>
                </div>
              </div>
            @endforeach
          </div>
        @endforeach
    </div>
</x-dynamic-component>
