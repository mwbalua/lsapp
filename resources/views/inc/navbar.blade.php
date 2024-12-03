<header class="absolute inset-x-0 top-0 z-50 bg-neutral-200 shadow">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
                <span class="font-bold">POSTERIZE</span>
            </a>
        </div>
        <div class="flex lg:hidden">
            <button onclick="openDropdown('navbar-modal')" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="/"
                class="text-sm/6 font-semibold text-gray-900 hover:bg-neutral-200 px-4 py-2 duration-300">Home</a>
            <a href="/posts"
                class="text-sm/6 font-semibold text-gray-900 hover:bg-neutral-200 px-4 py-2 duration-300">Posts</a>
            <a href="/about"
                class="text-sm/6 font-semibold text-gray-900 hover:bg-neutral-200 px-4 py-2 duration-300">About</a>
            <a href="/services"
                class="text-sm/6 font-semibold text-gray-900 hover:bg-neutral-200 px-4 py-2 duration-300">Services</a>
        </div>

        @auth
            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-4">
                <span class="text-sm font-semibold">{{ Auth::user()->name }}</span>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="text-sm/6 font-semibold text-white px-4 py-2 bg-red-600 hover:bg-red-700 duration-300">Logout</button>

                </form>
            </div>
        @endauth

        @guest
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/login"
                    class="text-sm/6 font-semibold text-gray-900 hover:bg-neutral-200 px-4 py-2 duration-300">Log in <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        @endguest

    </nav>

    {{--  <!-- Mobile menu, show/hide based on menu open state. -->  --}}
    <div id="navbar-modal" class="hidden" role="dialog" aria-modal="true">
        {{--  <!-- Background backdrop, show/hide based on slide-over state. -->  --}}
        <div class="fixed inset-0 z-50"></div>
        <div
            class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="/" class="-m-1.5 p-1.5 font-bold">
                    <span>BLOGGERSZX</span>
                </a>
                <button onclick="closeDropdown('navbar-modal')" type="button"
                    class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="/"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                        <a href="/posts"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Posts</a>
                        <a href="/about"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">About</a>
                        <a href="/services"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Services</a>
                    </div>


                    @auth
                        <form action="/logout" method="POST" class="py-6">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Logout</button>
                        </form>
                    @endauth


                    @guest
                        <div class="py-6">
                            <a href="/login"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        </div>
                    @endguest

                </div>
            </div>
        </div>
    </div>
</header>