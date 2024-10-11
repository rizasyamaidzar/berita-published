<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<section x-data="{ atTop: true }">
    <!-- Alpine.js initializes data properties for the component. `atTop` determines if the page is scrolled past a certain point. -->
    <div class="fixed z-50 w-full px-8 py-4 transition-all duration-1000 rounded-full mt-4 max-w-2xl inset-x-0 mx-auto ease-in-out transform"
        :class="{ 'bg-black bg-opacity-90 backdrop-blur-xl max-w-4xl ': !atTop, 'max-w-2xl': atTop }"
        @scroll.window="atTop = (window.pageYOffset > 50 ? false : true)">
        <!-- This div is styled to change its appearance based on the scroll position, toggling classes for background, opacity, blur, and width. -->
        <div x-data="{ open: false }"
            class="flex flex-col w-full p-2 mx-auto md:items-center md:justify-between md:flex-row">
            <!-- Another Alpine.js component for handling the navigation menu's open/close state. -->
            <div class="flex flex-row items-center justify-between"> <span
                    class="font-bold tracking-tighter text-black uppercase"
                    :class="{ 'text-black': atTop, 'text-white': !atTop }">
                    <!-- This span changes color based on the scroll position, using the `atTop` state. -->
                    <a href="/"> ✺ SmartNews</a>
                </span> <button class="md:hidden focus:outline-none">
                    <!---- SVG Burger goes here ---->
                </button> </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow gap-8 hidden pb-4 md:pb-0 md:flex md:flex-row lg:ml-auto justify-end">
                <!-- This navigation changes its display based on the `open` state, showing on mobile when `open` is true. -->
                <a :class="{ 'text-black': atTop, 'text-white': !atTop }" href="/news" class="text-black">News</a>
                <!-- Links within the navigation also change color based on the scroll position. --> <a
                    :class="{ 'text-black': atTop, 'text-white': !atTop }" href="/login" class="text-black">Login</a>
            </nav>
        </div>
    </div>


</section>
