<div class="bg-[#F5FBFC]">
    <div class="container p-4">
        <p class="text-xs text-[#6C7C80] leading-relaxed">Snippet Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
    </div>
</div>

<footer class="mt-5 mb-10">
    <div class="container px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5">
            <div class="md:col-span-2">
                <x-logo.go-work class="h-5" />
            </div>
            <div class="relative">
                <input type="text" placeholder="Enter your email address for updates" class="w-full rounded-[14px] border-[#BEC9CC] py-3 px-2.5 placeholder:text-[#92A2A6] focus:ring-dark focus:border-dark peer" />
                <button class="hidden absolute top-1.5 right-1.5 bg-dark font-medium text-sm px-5 py-2 text-white rounded-full font-inter peer-focus:block">Subscribe</button>
            </div>
        </div>
        <hr class="border-[#BEC9CC] my-5" />
        <div class="grid grid-cols-1 md:grid-cols-6 gap-8 md:gap-5">
            <div class="text-[#BF8C15] font-medium font-inter text-xs flex gap-5 justify-between md:flex-col items-start">
                <div class="space-y-5">
                    <a href="#" class="flex items-center gap-2 hover:text-primary">
                        <x-icon.phone class="w-4 text-primary" />
                        <p>+62 21 3970 7888</p>
                    </a>
                    <a href="#" class="flex items-center gap-2 hover:text-primary">
                        <x-icon.whatsapp class="w-4 text-primary" />
                        <p>+62 811 996 8896</p>
                    </a>
                </div>
                <div class="flex items-center gap-7">
                    <a href="#" aria-label="Instagram">
                        <x-icon.instagram class="w-5 text-primary" />
                    </a>
                    <a href="#" aria-label="LinkedIn">
                        <x-icon.linkedin class="w-5 text-primary" />
                    </a>
                    <a href="#" aria-label="YouTube">
                        <x-icon.youtube class="w-5 text-primary" />
                    </a>
                </div>
            </div>

            <div>
                <a href="#" class="flex items-center font-medium font-inter text-xs tracking-wide uppercase text-dark hover:text-deepsea">Menu One</a>
            </div>

            <div>
                <a href="#" class="flex items-center font-medium font-inter text-xs tracking-wide uppercase text-dark hover:text-deepsea">Menu Two</a>
            </div>

            <div>
                <a href="#" class="flex items-center font-medium font-inter text-xs tracking-wide uppercase text-dark hover:text-deepsea">Menu Three</a>
            </div>

            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-8 md:mb-10">
                    <h6 class="font-bold text-sm">Download GoWork App for free now!</h6>
                    <a href="#" aria-label="Download on AppStore">
                        <x-icon.apple class="w-6" />
                    </a>
                    <a href="#" aria-label="Download on PlayStore">
                        <x-icon.android class="w-6" />
                    </a>
                </div>
                <p class="text-[10px] text-[#6C7C80]">©Copyright 2021 GoWork Coworking & Office Space <br/>
                    Kolaborasi Global Sukses, PT</p>
            </div>
        </div>
    </div>
</footer>
