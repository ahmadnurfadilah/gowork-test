<x-layouts.app>
    <x-navbar />

    {{-- Header --}}
    <div class="relative md:pb-16" x-data="slider">
        <div class="grid grid-cols-1 md:grid-cols-12 relative pl-4 md:pl-0">
            {{-- Add space on md screen --}}
            <div class="md:col-span-2"></div>
            <div class="md:col-span-10">
                <img class="relative aspect-[2/1] md:aspect-[3/2] lg:aspect-[2/1] w-full object-cover object-center rounded-tl-[10px] md:rounded-tl-none" :class="animate && 'fade-up'" :src="images[selected]" alt="Slider image" x-transition />
            </div>
        </div>

        <div class="md:absolute inset-x-0 bottom-0">
            <div class="container px-0 md:px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 items-end">
                    <div class="bg-white py-7 pl-4 pr-4 md:pl-0 md:pr-8 rounded-r-[10px] -translate-y-10">
                        <h1 class="font-display text-4xl lg:text-5xl mb-2.5">Heading for Lorem Ipsum Dolor sit Amet, Consectetur Elit.</h1>
                        <p class="pb-10">Introduction for lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                        <div class="relative">
                            <x-icon.location class="absolute w-6 top-4 left-2.5 pointer-events-none text-[#92A2A6]" />
                            <select aria-label="Select location" name="location" id="location" class="block w-80 mb-2.5 border-[#BEC9CC] rounded-[14px] py-3 px-2.5 pl-10 text-[#92A2A6]">
                                <option value="">Select location</option>
                                <option value="Kemang">Kemang</option>
                                <option value="Pacific Place">Pacific Place</option>
                                <option value="Fatmawati">Fatmawati</option>
                            </select>
                        </div>
                        <x-button class="px-16 py-3">Find Space</x-button>
                    </div>
                    {{-- Add space on xl screen --}}
                    <div class="hidden xl:block"></div>
                    <div class="hidden md:block">
                        <div class="flex justify-end gap-7 py-7">
                            {{-- Previous image button --}}
                            <button class="text-black" :class="{'opacity-30': !(selected >= (images.length - 1))}" x-on:click="prev()" aria-label="Previous">
                                <x-icon.arrow-left />
                            </button>
                            {{-- Next image button --}}
                            <button class="text-black" :class="{'opacity-30': !(selected < (images.length - 1))}" x-on:click="next()" aria-label="Next">
                                <x-icon.arrow-right />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Plan --}}
    <section class="my-12 md:my-20">
        <div class="container px-4">
            <h2 class="uppercase font-bold text-2xl text-center tracking-widest text-dark mb-7">Find the plan Lorem Ipsum Dolor</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
                <x-card.plan title="Plan One" description="Introduction Lorem ipsum dolor sit amet, consectetur." :price="2800000" :benefits="['Benefit', 'Benefit', 'Benefit', 'Benefit']" />
                <x-card.plan title="Plan Two" description="Introduction Lorem ipsum dolor sit amet, consectetur." :price="2800000" :benefits="['Benefit', 'Benefit', 'Benefit', 'Benefit']" />
                <x-card.plan title="Plan Three" description="Introduction Lorem ipsum dolor sit amet, consectetur." :price="2800000" :benefits="['Benefit', 'Benefit', 'Benefit', 'Benefit']" />
                <x-card.plan title="Plan Four" description="Introduction Lorem ipsum dolor sit amet, consectetur." :price="2800000" :benefits="['Benefit', 'Benefit', 'Benefit', 'Benefit']" />
                <x-card.plan title="Plan Five" description="Introduction Lorem ipsum dolor sit amet, consectetur." :price="2800000" :benefits="['Benefit', 'Benefit', 'Benefit', 'Benefit']" />
            </div>
            <p class="text-right text-[#929292] mt-5 text-xs">*VAT is applicable</p>

            <div class="my-[100px]">
                <p class="text-dark font-light text-lg md:text-xl">Caption for lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

            <div class="my-[100px] text-dark">
                <h4 class="font-bold text-2xl mb-5">All plans lorem ipsum</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
                    <div>
                        <h5 class="font-semibold text-xl mb-2.5">Title Lorem Ipsum Dolor</h5>
                        <p>Description lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div>
                        <h5 class="font-semibold text-xl mb-2.5">Title Lorem Ipsum Dolor</h5>
                        <p>Description lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>

            <div class="my-[100px]">
                <div class="bg-gradient-to-r from-[#E5F5FA] to-[#EDF5F7] py-6 px-5 rounded-[10px] grid grid-cols-1 md:grid-cols-2 gap-2.5 items-center">
                    <h6 class="font-semibold text-[22px]">Looking for a lorem ipsum dolor sit amet?</h6>
                    <div>
                        <a href="#" class="font-medium text-sm flex items-center justify-end gap-2 text-primary hover:text-[#BF8C15] font-inter">
                            Call to Action
                            <x-icon.chevron-right  />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

    @push('scripts')
        <script>
            // Use alpineJS to handle slider function
            document.addEventListener('alpine:init', () => {
                Alpine.data('slider', () => ({
                    // property to run animation
                    animate: false,
                    // selected image
                    selected: 0,
                    // list of images on slider
                    images: ["/assets/img/slider/slider-1.webp", "/assets/img/slider/slider-2.webp"],
                    // function to slide previous image
                    prev() {
                        if (this.selected >= (this.images.length - 1)) {
                            this.selected--;
                            this.animate = true;
                            setTimeout(() => {
                                this.animate = false
                            }, 400);
                        }
                    },
                    // function to slide next image
                    next() {
                        if (this.selected < (this.images.length - 1)) {
                            this.selected++;
                            this.animate = true;
                            setTimeout(() => {
                                this.animate = false
                            }, 400);
                        }
                    },
                }))
            });
        </script>
    @endpush
</x-layouts.app>
