@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-2">
    <div class="w-full sm:px-30">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words">
            <div class="mx-20 my-2">
                <h2 class="text-2xl font-medium mr-auto my-4 dark:text-gray-400">
                    Profile
                </h2>

                <div class="lg:flex block h-full justify-between">
                    <div class="intro-y box mt-5 lg:mt-0 px-1 lg:pb-40 lg:flex-3 flex-2 lg:flex block items-center lg:flex-col bg-white dark:bg-gray-tertiary-dark rounded-md shadow-md border-t-4 border-red-accent lg:space-x-4 lg:mr-5 dark:text-gray-50">
                        <div class="lg:block flex text-center items-center p-5 w-full">
                            <div class="lg:h-40 lg:w-40 md:h-36 md:w-36 h-28 w-28 rounded-full overflow-hidden border-1 border-gray-400 focus:outline-none focus:border-white ">
                                <img alt="" class="h-full w-full object-cover" src="https://icewall-laravel.left4code.com/dist/images/profile-10.jpg">
                            </div>
                            <div class="mt-1 flex-1">
                                <div class="font-medium text-base ">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                                <div class="text-gray-600 ">BSIT 3-2</div>
                            </div>
                        </div>

                        <div class="lg:p-5 border-t border-gray-200 dark:border-dark-50  ">

                        </div>
                        <div class="flex justify-between w-full items-center p-5">
                            <h3>Current Status : </h3>
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                                <h3>Enrolled</h3>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 mt-5 lg:mt-0 p-2 block bg-white dark:bg-gray-tertiary-dark dark:text-gray-50 rounded-md shadow-md border-t-4 border-red-accent items-center">
                        <nav>
                            <ul class="lg:flex item-center text-base text-gray-800 dark:text-white ">
                                <li>
                                    <a href="" class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent dark:hover:border-white hover:border-gray-500 hover:font-bold">Basic Information</a>
                                </li>
                                <li>
                                    <a href="" class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent  dark:hover:border-white hover:border-gray-500 hover:font-bold">Address</a>
                                </li>
                                <li>
                                    <a href="" class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent  dark:hover:border-white hover:border-gray-500 hover:font-bold">Guardian</a>
                                </li>
                                <li>
                                    <a href="" class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent  dark:hover:border-white hover:border-gray-500 hover:font-bold">Education</a>
                                </li>
                            </ul>  
                        </nav>
                        <div class="lg:p-5 border-t border-gray-200 dark:border-dark-50  "></div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</main>
@endsection
