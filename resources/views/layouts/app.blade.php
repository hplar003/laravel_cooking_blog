<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-gray-100 md:bg-transparent lg:bg-transparent py-6 tracking-wider font-semibold">
            <div class="container mx-auto flex flex-row justify-between  px-6 ">
                <div>
                    <a href="{{ url('/') }}" class=" flex flex-row flex-shrink text-lg font-extrabold text-red-300 no-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mx-3 my-1" viewBox="0 0 20 20" fill="#fca3b7">
                            <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h.01a1 1 0 010 2H7a1 1 0 01-1-1zm2 3a1 1 0 00-2 0v1a2 2 0 00-2 2v1a2 2 0 00-2 2v.683a3.7 3.7 0 011.055.485 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0 3.704 3.704 0 014.11 0 1.704 1.704 0 001.89 0A3.7 3.7 0 0118 12.683V12a2 2 0 00-2-2V9a2 2 0 00-2-2V6a1 1 0 10-2 0v1h-1V6a1 1 0 10-2 0v1H8V6zm10 8.868a3.704 3.704 0 01-4.055-.036 1.704 1.704 0 00-1.89 0 3.704 3.704 0 01-4.11 0 1.704 1.704 0 00-1.89 0A3.704 3.704 0 012 14.868V17a1 1 0 001 1h14a1 1 0 001-1v-2.132zM9 3a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm3 0a1 1 0 011-1h.01a1 1 0 110 2H13a1 1 0 01-1-1z" clip-rule="evenodd" />
                          </svg> <span class="pt-3">Cook with me</span>
                        {{-- Cook with me --}}
                    </a>
                </div>
                
                <nav class="space-x-4 text-red-300 font-extrabold text-sm sm:text-base">
                <div class="hidden md:flex lg:block md:justify-between lg:justify-between space-x-4">   
                    <a class="no-underline hover:underline hover:text-red-400" href="/">Home</a>
                    <a class="no-underline hover:underline hover:text-red-400" href="/recipes">Recipes</a>
                    @yield('menu')

            @if (Auth::check())
                <a class="no-underline hover:underline hover:text-red-400" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a>
                <a class="no-underline hover:underline hover:text-red-400" href="/recipes/create">Create Recipe</a>
               
            @endif

                    @guest
                        
                        <a class="no-underline hover:underline hover:text-red-400" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline hover:text-red-400 transition-color duration-200" href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    
                    
                </div>
                {{-- mobile  hamburger--}}
                <div class="flex flex-row items-center md:hidden lg:hidden ">
                    <button class="mobile-menu-button">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#667389">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                </nav>
            </div>
            {{-- mobile menu --}}
            <div class=" px-10 blur  text-gray-700 mobile-menu hidden">
            
                <a class="block py-2 px-4 text-sm" href="/">Home</a>
                <a class="block py-2 px-4 text-sm" href="/recipes">Recipes</a>
                @if (Auth::check())
                <a class="block py-2 px-4 text-sm" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a>
                <a class="block py-2 px-4 text-sm" href="/recipes/create">Create Recipe</a>
               
            @endif

                    @guest
                        
                        <a class="block py-2 px-4 text-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="block py-2 px-4 text-sm" href="{{ route('register') }}">Sign Up</a>
                        @endif
                    @else
                        <span>{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
            </div>
        </header>
      

        @yield('content')
    </div>

    <footer class="bg-red-100 text-xl text-gray-500 text-center border-t-1 border-red-500 inset-x-0 bottom-0 mt-10 fixed h-30 md:h-30 lg:h-30">  &copy; 2021 Cookwithme </footer>
    


    @yield('scripts')

    <script>
        
        const btn = document.querySelector('button.mobile-menu-button ');
        const menu = document.querySelector('.mobile-menu');

        btn.addEventListener('click',(e) => {
            menu.classList.toggle("hidden")
        });








    </script>
</body>
</html>
