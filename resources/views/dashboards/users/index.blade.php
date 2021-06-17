@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-2 text-sm">
    <div class="w-full sm:px-30">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words">
            <div class="mx-20 my-2">
                <h2 class="text-lg uppercase font-bold mr-auto my-4 dark:text-gray-200">
                    Profile
                </h2>

                <div class="lg:flex block h-full justify-between">
                    <div class="intro-y box mt-5 lg:mt-0 px-1 lg:pb-40 lg:flex-3 flex-2 lg:flex block items-center lg:flex-col bg-white dark:bg-gray-primary-dark rounded-md shadow-md border-t-4 border-red-accent lg:mr-5 dark:text-gray-50">
                        <div class="lg:block flex text-center flex-col items-center p-5">
                            <div class="relative lg:h-40 lg:w-40 md:h-36 md:w-36 h-28 w-28 rounded-full border-1 overflow-hidden border-gray-400 focus:outline-none focus:border-white">
                                <img alt="" class="h-full w-full object-cover" src="https://icewall-laravel.left4code.com/dist/images/profile-10.jpg">
                            </div>
                            
                            <input type="file" name="profile-pic" id="profile-pic" class="hidden"/>
                                
                            <a href="javascript:void(0)" id="change-picture-btn" class="w-9 h-9 transition-colors duration-200 rounded-xl relative">
                                <svg class="w-9 h-9 z-10 absolute bottom-0.5 stroke-current text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </a>

                            <div class="mt-1 flex-1">
                                <div class="font-medium text-base ">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                                <div class="text-gray-600 ">BSIT 3-2</div>
                            </div>
                        </div>

                        <div class=" border-t border-gray-400 dark:border-dark-50  w-full">

                        </div>
                        <div class="flex justify-between w-full items-center p-5">
                            <h3>Current Status : </h3>
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 fill-current text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"></path></svg>
                                <h3>Enrolled</h3>
                            </div>
                        </div>
                    </div>

                    {{-- Tab Links --}}
                    <div class="flex-1 mt-5 lg:mt-0 p-2 block bg-white dark:bg-gray-primary-dark dark:text-gray-50 rounded-md shadow-md border-t-4 border-red-accent items-center flex-wrap"  id="tabs-id">
                        <div class="w-full">
                            <ul class="lg:flex item-center text-sm text-gray-800 dark:text-white flex-wrap flex-row ">
                                <li>
                                    <a class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent hover:border-red-accent hover:font-bold hover:text-gray-800 text-gray-800 border-red-accent
                                    dark:hover:border-red-accent dark:text-gray-50 dark:hover:text-gray-50 cursor-pointer" onclick="changeAtiveTab(event,'tab-info')">Basic Information</a>
                                </li>
                                <li>
                                    <a class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent hover:border-red-accent hover:text-gray-800 text-gray-500 cursor-pointer dark:hover:border-red-accent dark:text-gray-500 dark:hover:text-gray-50" onclick="changeAtiveTab(event,'tab-address')">Address</a>
                                </li>
                                <li>
                                    <a class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent hover:border-red-accent hover:text-gray-800 text-gray-500  cursor-pointer
                                    dark:hover:border-red-accent dark:text-gray-500 dark:hover:text-gray-50" " onclick="changeAtiveTab(event,'tab-guardian')">Guardian</a>
                                </li>
                                <li>
                                    <a class="lg:p-2 py-1 lg:px-2 px-0 block border-b-2 border-transparent hover:border-red-accent hover:text-gray-800 text-gray-500  cursor-pointer dark:hover:border-red-accent dark:text-gray-500 dark:hover:text-gray-50" " onclick="changeAtiveTab(event,'tab-educ')">Education</a>
                                </li>
                            </ul>  
                        </div>
                        <div class="lg:p-5 border-t border-gray-400 dark:border-dark-50  "></div>

                        {{-- Start Tabs --}}
                        <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-transparent text-gray-700 dark:text-gray-50 w-full mb-6 shadow-lg rounded">
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                <div class="block" id="tab-info">
                                    <p>
                                    Collaboratively administrate empowered markets via
                                    plug-and-play networks. Dynamically procrastinate B2C users
                                    after installed base benefits.
                                    <br />
                                    <br />
                                    Dramatically visualize customer directed convergence
                                    without revolutionary ROI.
                                    </p>
                                </div>
                                <div class="hidden" id="tab-address">
                                    <p>
                                    Completely synergize resource taxing relationships via
                                    premier niche markets. Professionally cultivate one-to-one
                                    customer service with robust ideas.
                                    <br />
                                    <br />
                                    Dynamically innovate resource-leveling customer service for
                                    state of the art customer service.
                                    </p>
                                </div>
                                <div class="hidden" id="tab-guardian">
                                    <p>
                                    Efficiently unleash cross-media information without
                                    cross-media value. Quickly maximize timely deliverables for
                                    real-time schemas.
                                    <br />
                                    <br />
                                    Dramatically maintain clicks-and-mortar solutions
                                    without functional solutions.
                                    </p>
                                </div>
                                <div class="hidden" id="tab-educ">
                                    <p>
                                    Almost every day we encounter a lot of exotic animal in the forrest and it efficiently unleash cross-media information without
                                    cross-media value. Quickly maximize timely deliverables for
                                    real-time schemas.
                                    <br />
                                    <br />
                                    Basically it dramatically maintain clicks-and-mortar solutions
                                    without functional solutions.
                                    </p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</main>
@endsection
