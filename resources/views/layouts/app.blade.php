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
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-red-100 py-6 tracking-wider font-semibold">
            <div class="container mx-auto flex flex-row justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class=" flex flex-row flex-shrink text-lg font-semibold text-gray-500 no-underline">
                        <img src="{{ asset('/img/chef.svg') }}" alt="" width="30" ><span class="pt-3">Cook with me</span>
                        {{-- Cook with me --}}
                    </a>
                </div>
                <nav class="space-x-4 text-gray-500 text-sm sm:text-base">
                    <a class="no-underline hover:underline" href="/">Home</a>
                    <a class="no-underline hover:underline" href="/recipes">Recipes</a>
                    @yield('menu')

            @if (Auth::check())
                <a class="no-underline hover:underline" href="/recipes/my_recipe/{{ Auth::user()->id }}">My Recipes </a>
                <a class="no-underline hover:underline" href="/recipes/create">Create Recipe</a>
               
            @endif

                    @guest
                        
                        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                </nav>
            </div>
        </header>
      

        @yield('content')
    </div>

    <footer class="bg-red-100
    text-xl text-gray-500 text-center
    border-t-1 border-red-500
    inset-x-0
    bottom-0
    mt-10
    fixed
    p-4" >  &copy; 2021 Cookwithme
    </footer>


    @yield('scripts')
</body>
</html>
