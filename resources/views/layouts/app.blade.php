<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PUP Student Portal') }}</title>

    <!-- Scripts -->
    <script>
      document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
      });


      if (localStorage.theme === 'dark' || (!'theme' in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
          document.querySelector('html').classList.add('dark')
      } else if (localStorage.theme === 'dark') {
          document.querySelector('html').classList.add('dark')
      }
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.0.1/dist/alpine.js" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>

<body class="bg-gray-100 dark:bg-gray-primary-dark h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="dark:bg-gray-secondary-dark bg-white header-bg py-3  px-10">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                    <a href="#" class="text-lg font-semibold text-white-500 dark:text-white-700 no-underline flex">
                     {{-- {{ config('app.name', 'PUP Student Portal') }} --}}
                        {{-- <span class="nav-color text-lg font-semibold no-underline">PUP</span>
                        {{ 'Student Portal' }} --}}
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="h-9 self-end fill-current text-red-accent dark:text-white" viewBox="0 0 1008 746">
                            <path id="Color_Fill_1" data-name="Color Fill 1" d="M39,0H227c34.135,0,64.771-2.613,79,17,10.353,14.271,9,37.838,9,63V685c0,19.218,2.317,42.6-1,60h-2c-4.592,2.834-17.39,1-24,1H4c-6.693-11.2-3-39.442-3-56V38c4.381-6.316,4.691-15.07,9-21C14.419,10.918,23.6,4.962,31,2,33.724,0.909,36.879,1.407,39,0ZM385,0H573c34.135,0,64.771-2.613,79,17,10.359,14.278,9,37.8,9,63V685c0,19.218,2.317,42.6-1,60h-2c-4.406,2.727-16.612,1-23,1H425c-24.531,0-54.4,3.339-77-1v-2c-3.625-5.872-1-37.415-1-47V74c0-17.371-1.468-37.013,4-49,3.558-7.8,13.194-17.45,21-21C376.141,2.117,381.35,2.425,385,0ZM732,0H920c34.135,0,64.771-2.613,79,17,10.36,14.278,9,37.8,9,63V685c0,19.218,2.32,42.6-1,60h-2c-4.41,2.727-16.612,1-23,1H772c-24.531,0-54.4,3.339-77-1v-2c-3.625-5.872-1-37.415-1-47V74c0-17.393-1.477-36.953,4-49,3.545-7.8,13.2-17.454,21-21C723.141,2.117,728.35,2.425,732,0ZM11,736H305V83c0-22.143,2.265-47.182-7-60-11.395-15.763-38.746-13-66-13H40C27.666,13.078,17.5,21.1,13,32c-4.756,11.518-2,33.082-2,48V736Zm346,0H651V83c0-22.143,2.265-47.182-7-60-11.395-15.763-38.746-13-66-13H386c-12.334,3.078-22.5,11.1-27,22-4.756,11.518-2,33.082-2,48V736Zm347,0H998V83c0-22.143,2.27-47.182-7-60-11.395-15.763-38.746-13-66-13H733c-12.334,3.078-22.5,11.1-27,22-4.756,11.518-2,33.082-2,48V736ZM161,173c0.046,8.837,2.955,49.706,1,53-7.806,4.907-44.151,2.1-57,2q-2-76.492-4-153c55.374-.615,124.414-9.689,147,25,2.579,3.961,4.779,10.354,6,15,2.449,9.321-.194,19.351-3,26C238.207,171.318,204.81,173.467,161,173ZM482,75q1.5,41,3,82c2.757,12.691-3.74,26.643,7,31,7.725,7.786,31.856,4.121,35-5,4.232-4.917,2-21.493,2-30q-1-39-2-78l44-1c1.913,5.639,1.079,15.695,1,23,2.086,3.311,1,11.934,1,17q0.5,17.5,1,35c0,16.92,3.593,35.559-2,49-11.887,28.566-65.211,40.936-105,28-14.891-4.841-30.119-13.16-36-27-6.359-14.965-.105-33.6-4-52-2.06-9.729,1.325-24.015-1-35-2.083-9.841-1.093-24.457-1-36C437.771,71.749,466.463,74.921,482,75Zm302,1c50.565-.574,122.58-8.554,144,21l8,15c2.521,7.762,2,16.857,0,24-10.08,36.058-45.241,38.5-92,38q0.5,27,1,54c-12.771,4.251-41.463,1.08-57,1Q786,152.508,784,76ZM159,112v26c14.022,0.432,31.328,1.121,37-7,2.061-2.551,2.373-6.712,1-10C192.246,109.614,175.211,111.373,159,112Zm683,1v26c12.969,0.2,24.546-.76,34-3,2.824-4.235,4.883-5.417,5-13a11.725,11.725,0,0,1-2-5C870.086,112.807,857.1,112.9,842,113Z"/>
                          </svg>

                        <h1 class="pl-1 items-end self-end font-bold dark:text-white">Student<span class="text-red-accent"">Portal</span></h1>
                    </a>
                </div>
                

                <nav class="space-x-4 text-gray-900 dark:text-white text-sm sm:text-base flex">
                    @guest
                        {{-- <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif --}}
                    @else

                          
                            <button id="switchTheme" class="h-10 w-10 flex justify-center items-center focus:outline-none text-black-500">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                            </button>


                            <div x-data="{ dropdownOpen: false }" class="relative">
                              <button @click="dropdownOpen = !dropdownOpen" class="block h-10 w-10 rounded-full overflow-hidden border-1 border-gray-400 focus:outline-none focus:border-white">
                                <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1558898479-33c0057a5d12?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Your avatar">
                              </button>



                              <div x-show="dropdownOpen" class="absolute right-0 mt-1 w-80 pb-2  bg-white  dark:bg-gray-500 rounded-lg shadow-xl divide-y-1 divide-gray-200 ">
                                <div class="px-4 py-3 bg-red-900 flex ">
                                  <div class="block h-20 w-20 rounded-full overflow-hidden focus:outline-none focus:border-white ">
                                    <img class="h-full w-full object-cover " src="https://images.unsplash.com/photo-1558898479-33c0057a5d12?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="Your avatar">
                                  </div>

                                  <div class="profile-detail self-center text-white pl-4">
                                    <h4 class="text-xs py-1">signed in as:</h4>
                                    <span class="py-2 font-bold uppercase">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                                    <h5 class="text-xs italic">{{ Auth::user()->email }}</h5>
                                  </div>
                                </div>

                                <div class="">
                                  <a href="" class="block px-4 py-3 text-gray-800 dark:text-white dark:hover:font-bold hover:text-red-800 hover:font-bold transition ease-in ">Account Settings</a>

                                  <a href="{{ route('logout') }}" class="block px-4 py-3 text-gray-800 dark:text-white hover:text-red-800 hover:font-bold transition ease-in" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                  
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                  </form>
                                </div>

                              </div>

                            </div>
                    @endguest
                </nav>

            </div>
        </header>


        @yield('content')
    </div>
</body>
{{-- @push('scripts') --}}
<script>
    document.getElementById("switchTheme").addEventListener("click", function() {
        let htmlClasses = document.querySelector("html").classList;
        if (localStorage.theme == "dark") {
            htmlClasses.remove("dark");
            localStorage.removeItem("theme");
        } else {
            htmlClasses.add("dark");
            localStorage.theme = "dark";
        }
    });



</script>


{{-- @endpush --}}
</html>
