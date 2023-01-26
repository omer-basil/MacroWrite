<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div x-data="{ expanded: false }">
        <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center grid grid-cols-2">
                            <a href="{{ route('welcome') }}">
                                <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                            </a>
                        </div>
                    </div>
                    <!-- nav link -->
                        @if(Auth::check())
                            @if(Auth::user()->role->name === "admin")
                                <a href="{{ url('/admin') }}" class="">
                                    Admin
                                </a>
                            @endif
                        @endif
                    <!-- end of nav link -->
                    <button class="sm:hidden" @click.prevent="expanded = ! expanded">
                        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                    <!-- search large screen-->
                    <div class="sm:inline hidden">
                        <x-search/>
                    </div>
                    <!-- end of search -->
                    <div class="flex">
                        <!-- Notification dropdown -->
                            <div class="py-4 sm:flex sm:items-center sm:ml-6 right-0 col-end">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            @if (Route::has('login'))
                                                @auth
                                                    <a class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                        <livewire:notification.indicator>
                                                    </a>
                                                @endauth
                                            @endif
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                    
                                        @auth
                                            <x-notification-link id="notified" >
                                                
                                            </x-notification-link>
                                        @endauth
                                        
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        <!-- end Notification dropdown -->
                        <!-- Settings Dropdown -->
                            <div class="py-4 sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                            @if (Route::has('login'))
                                                @auth
                                                    <a class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::user()->name }}</a>
                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                @else
                                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                                    @if (Route::has('register'))
                                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                    @endif
                                                @endauth
                                            @endif
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        @auth
                                            @if(Auth::user()->magazine)
                                                <x-dropdown-link :href="route('mag.show', Auth::user()->magazine)">
                                                    {{ Auth::user()->magazine->slug }}
                                                </x-dropdown-link>
                                            @endif
                                            <x-dropdown-link :href="route('mag.mod')">
                                                @if(Auth::user()->magazine)
                                                    Edit Magazine
                                                @else
                                                    Create a magazine
                                                @endif
                                            </x-dropdown-link>
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endauth
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        <!-- end setting dropdown -->
                    </div>
                </div>
            </div>
            <!-- search mobile screen-->
                <div x-show="expanded" class="flex items-stretch place-items-center grid py-2 sm:hidden">
                    <x-search/>
                </div>
            <!-- end of search -->
        <!-- End Primary Navigation Menu -->
        <!-- side menu -->
            <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); ">
                <div class="flex antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
                    <!-- Sidebar -->
                        <div x-transition:enter="transform transition-transform duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition-transform duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-show="isSidebarOpen" class="fixed inset-y-0 z-10 flex w-80 bg-white shadow-lg">
                            <!-- Sidebar content -->
                            <div class="z-10 flex flex-col flex-1">
                                <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
                                    <!-- Close btn -->
                                    <button @click="isSidebarOpen = false" class="p-1 rounded-lg focus:outline-none focus:ring">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <span class="sr-only">Close sidebar</span>
                                    </button>
                                </div>
                                <!-- sidebar options -->
                                    <nav class="flex flex-col flex-1 w-full overflow-y-scroll">
                                        <div class="px-4 pt-2 mt-2 flex flex-col space-y-t-2" x-data="{ open: true }">
                                            <button @click="open = ! open" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-t shadow w-full">
                                                Dashboard
                                            </button>
                                            <div x-show="open" class="bg-white flex flex-col space-y-2 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-b w-full">
                                                <a href="{{ route('dashboard') }}">Home</a>
                                                @auth 
                                                    <a @if(Auth::user()->magazine) href="{{ route('draft.index') }}" @else href="{{ route('mag.store') }}" @endif>Write an article</a>
                                                @endauth
                                                <a href="{{ route('manga.index') }}">Write a Manga</a>
                                            </div>
                                        </div>
                                        <div class="px-4 flex flex-col" x-data="{ open: true }">
                                            <button @click="open = ! open" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-t shadow w-full">
                                                Trending
                                            </button>
                                            <div x-show="open" class="bg-white max-h-80 overflow-y-auto flex flex-col space-y-2 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-b w-full">
                                                @foreach($trends as $trend)
                                                    <a href="{{ route('draft.show', $trend->uid) }}">{{ $trend->title }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="px-4 flex flex-col" x-data="{ open: false}">
                                            <button @click="open = ! open " class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-t shadow w-full">
                                                Favourite
                                            </button>
                                            <div x-show="open" class="bg-white max-h-80 overflow-y-auto flex flex-col space-y-2 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded-b w-full">
                                                <a href="{{ route('fav.liked') }}">Likes</a>
                                                <a href="{{ route('fav.marked') }}">Bookmarks</a>
                                                <a href="{{ route('quote.index') }}">Quoates</a>
                                                @auth
                                                    <a href="{{ route('subscriptions') }}">Subscriptions</a>
                                                @endauth
                                            </div>
                                        </div>
                                    </nav>
                                <!-- end of sidebar options -->
                            </div>  
                        </div>
                    <!-- end of Sidebar -->
                    <main class="flex items-center flex-1">
                        <!-- Page content -->
                            <button @click="isSidebarOpen = true" class=" fixed p-2 text-white bg-black shadow-lg rounded-full top-20 left-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </button>
                        <!-- end of page content -->
                    </main>
                </div>
            </div>  
        <!-- end of side menu -->
    </div>
</nav>

<script>
    const setup = () => {
    return {
            isSidebarOpen: false,
        }
    }
</script>
