{{-- use alpineJS to handle state show/hide nav on mobile --}}
<nav class="h-20 flex items-center z-10 relative bg-white" x-data="{show: false}">
    <div class="container px-4 flex items-center justify-between relative">
        <div class="flex items-center gap-2.5">
            <button class="block md:hidden" x-on:click="show = !show">
                {{-- show hamburder icon when state is not show --}}
                <x-icon.hamburger x-show="!show" x-cloak />
                {{-- show hamburder icon when state is show --}}
                <x-icon.close x-show="show" x-cloak />
            </button>
            <a href="/">
                <x-logo.go-work class="h-3.5" />
            </a>
        </div>
        <div class="flex items-center gap-6">
            <ul class="absolute -translate-x-[110%] md:translate-x-0 inset-x-0 top-14 md:relative md:top-0 flex flex-col md:flex-row items-start md:items-center md:gap-6 font-inter text-dark font-medium text-xs tracking-widest uppercase bg-white shadow-lg rounded-b-2xl pb-2.5 md:shadow-none md:rounded-b-none md:pb-0 transition-all" :class="{'-translate-x-[110%]': !show}">
                <li>
                    <a href="#" class="block w-full hover:text-regalblue p-4">Menu One</a>
                </li>
                <li>
                    <a href="#" class="block w-full hover:text-regalblue p-4">Menu Two</a>
                </li>
                <li>
                    <a href="#" class="block w-full hover:text-regalblue p-4">Menu Three</a>
                </li>
            </ul>
            <x-button.outline>Direct Action</x-button.outline>
        </div>
    </div>
</nav>
