 <header class="relative bg-white dark:bg-darker">
     <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
         <!-- Mobile menu button -->
         <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
             class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
             <span class="sr-only">Open main manu</span>
             <span aria-hidden="true">
                 <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M4 6h16M4 12h16M4 18h16" />
                 </svg>
             </span>
         </button>

         <!-- Brand -->
         @php
             $hour = now()->format('H');
             if ($hour >= 5 && $hour < 12) {
                 $greeting = 'Selamat pagi';
             } elseif ($hour >= 12 && $hour < 18) {
                 $greeting = 'Selamat siang';
             } elseif ($hour >= 18 && $hour < 22) {
                 $greeting = 'Selamat malam';
             } else {
                 $greeting = 'Selamat tidur';
             }
         @endphp
         <a href="/dashboard"
             class="inline-block text-xl md:text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">
             {{ $greeting }} {{ Auth::user()->username ?? 'riza' }}
         </a>

         <!-- Mobile sub menu button -->
         <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
             class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
             <span class="sr-only">Open sub manu</span>
             <span aria-hidden="true">
                 <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                 </svg>
             </span>
         </button>

         <!-- Desktop Right buttons -->
         <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
             <!-- Toggle dark theme button -->
             <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                 <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                 </div>
                 <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-150 transform scale-110 rounded-full shadow-sm"
                     :class="{
                         'translate-x-0 -translate-y-px  bg-white text-primary-dark': !
                             isDark,
                         'translate-x-6 text-primary-100 bg-primary-darker': isDark
                     }">
                     <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                     </svg>
                     <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                     </svg>
                 </div>
             </button>

             <!-- Settings button -->
             <button @click="openSettingsPanel"
                 class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                 <span class="sr-only">Open settings panel</span>
                 <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                 </svg>
             </button>

             <!-- User avatar button -->
             <div class="relative" x-data="{ open: false }">
                 <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })" type="button"
                     aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                     class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                     <span class="sr-only">User menu</span>
                     <img class="w-10 h-10 rounded-full" src="{{ asset('admin/' . 'admin.png') }}" alt="Admin" />
                 </button>

                 <!-- User dropdown menu -->
                 <div x-show="open" x-ref="userMenu" x-transition:enter="transition-all transform ease-out"
                     x-transition:enter-start="translate-y-1/2 opacity-0"
                     x-transition:enter-end="translate-y-0 opacity-100"
                     x-transition:leave="transition-all transform ease-in"
                     x-transition:leave-start="translate-y-0 opacity-100"
                     x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                     @keydown.escape="open = false"
                     class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                     tabindex="-1" role="menu" aria-orientation="vertical" aria-label="User menu">
                     <a href="#" role="menuitem"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                         Settings
                     </a>
                     <form action="/logout" method="post">
                         @csrf
                         <button type="submit" role="menuitem"
                             class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary w-full">
                             Logout
                     </form>
                 </div>
             </div>
         </nav>


         <!-- Mobile sub menu -->
         <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
             x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
             x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
             x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="-translate-y-full opacity-0"
             x-show="isMobileSubMenuOpen" @click.away="isMobileSubMenuOpen = false"
             class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
             aria-label="Secondary">
             <div class="space-x-2">
                 <!-- Toggle dark theme button -->
                 <button aria-hidden="true" class="relative focus:outline-none" x-cloak @click="toggleTheme">
                     <div class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                     </div>
                     <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                         :class="{
                             'translate-x-0 -translate-y-px  bg-white text-primary-dark': !
                                 isDark,
                             'translate-x-6 text-primary-100 bg-primary-darker': isDark
                         }">
                         <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                         </svg>
                         <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                         </svg>
                     </div>
                 </button>

                 <!-- Settings button -->
                 <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                     class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                     <span class="sr-only">Open settings panel</span>
                     <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg>
                 </button>
             </div>

             <!-- User avatar button -->
             <div class="relative ml-auto" x-data="{ open: false }">
                 <button @click="open = !open" type="button" aria-haspopup="true"
                     :aria-expanded="open ? 'true' : 'false'"
                     class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                     <span class="sr-only">User menu</span>
                     <img class="w-10 h-10 rounded-full"
                         src="{{ asset('admin/' . (auth()->user()->admin->foto ?? 'img/default-avatar.jpg')) }}"
                         alt="Ahmed Kamel" />
                 </button>

                 <!-- User dropdown menu -->
                 <div x-show="open" x-transition:enter="transition-all transform ease-out"
                     x-transition:enter-start="translate-y-1/2 opacity-0"
                     x-transition:enter-end="translate-y-0 opacity-100"
                     x-transition:leave="transition-all transform ease-in"
                     x-transition:leave-start="translate-y-0 opacity-100"
                     x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                     class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                     role="menu" aria-orientation="vertical" aria-label="User menu">
                     <a href="#" role="menuitem"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                         Your Profile
                     </a>
                     <a href="#" role="menuitem"
                         class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                         Settings
                     </a>
                     <form action="/logout" method="post">
                         @csrf
                         <button type="submit" role="menuitem"
                             class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary w-full">
                             Logout
                     </form>
                 </div>
             </div>
         </nav>
     </div>









     <!-- Mobile main manu -->
     <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen"
         @click.away="isMobileMainMenuOpen = false">
         <nav aria-label="Main" class="px-2 py-4 space-y-2">
             <!-- Dashboards links -->
             <div x-data="{ isActive: true, open: true }">
                 <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="#" @click="$event.preventDefault(); open = !open"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm"> Dashboards </span>
                     <span class="ml-auto" aria-hidden="true">
                         <!-- active class 'rotate-180' -->
                         <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                         </svg>
                     </span>
                 </a>
                 <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                     <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                     <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                     <a href="/dashboard" role="menuitem"
                         class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md dark:text-light dark:hover:text-light hover:text-gray-700">
                         Dashboard
                     </a>
                 </div>
             </div>

             <!-- Authentication links -->
             <div x-data="{ isActive: false, open: false }">
                 <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="" @click="$event.preventDefault(); open = !open"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm"> User Management </span>
                     <span aria-hidden="true" class="ml-auto">
                         <!-- active class 'rotate-180' -->
                         <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                         </svg>
                     </span>
                 </a>
                 <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                     <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                     <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                     <a href="/user-management" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                         Admin
                     </a>
                     <a href="/coach" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                         Coach
                     </a>
                     <a href="/player" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                         Player
                     </a>
                 </div>
             </div>

             <!-- Layouts links -->
             <div x-data="{ isActive: false, open: false }">
                 <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="#" @click="$event.preventDefault(); open = !open"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm"> Program </span>
                     <span aria-hidden="true" class="ml-auto">
                         <!-- active class 'rotate-180' -->
                         <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                         </svg>
                     </span>
                 </a>
                 <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Layouts">
                     <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                     <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                     <a href="/program-management" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                         Program
                     </a>
                     <a href="/jadwal-management" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                         Jadwal
                     </a>
                 </div>
             </div>

             <!-- Components links -->
             <div x-data="{ isActive: false, open: false }">
                 <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="#" @click="$event.preventDefault(); open = !open"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm"> Berita </span>
                     <span aria-hidden="true" class="ml-auto">
                         <!-- active class 'rotate-180' -->
                         <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                         </svg>
                     </span>
                 </a>
                 <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                     <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                     <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                     <a href="/berita-management" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                         Category
                     </a>
                     <a href="/berita-management/berita" role="menuitem"
                         class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700">
                         Berita
                     </a>
                 </div>
             </div>

             <!-- Pages links -->
             <div x-data="{ isActive: false, open: false }">
                 <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                 <a href="/galery-management"
                     class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                     :class="{ 'bg-primary-100 dark:bg-primary': isActive || open }" role="button"
                     aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                     <span aria-hidden="true">
                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                         </svg>
                     </span>
                     <span class="ml-2 text-sm">Galery</span>
                 </a>
             </div>



         </nav>
     </div>
 </header>
