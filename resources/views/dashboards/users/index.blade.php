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
                            <div class="lg:h-40 lg:w-40 md:h-36 md:w-36 h-28 w-28 rounded-full border-1 overflow-hidden border-gray-400 focus:outline-none focus:border-white ">
                                <img alt="Profile" src="{{ Auth::user()->picture}}" class="h-full w-full object-cover" >
                            </div>

                            <div class="flex-1 pt-2">
                                <div class="font-medium text-base ">{{ Auth::user()->lastname }}, {{ Auth::user()->firstname }} {{ Auth::user()->middlename[0] }}.</div>
                                <div class="text-gray-600 ">BSIT 3-2</div>
                            </div>

                            <input type="file" name="profile-pic" id="profile-pic" class="hidden pointer-events-none disabled cursor-default"/>

                            <a href="javascript:void(0)" id="change-picture-btn" class="w-9 h-9 transition-colors duration-200 rounded-xl">
                                <svg class="lg:w-11 lg:h-11 w-9 h-9 transform lg:-translate-y-52 -translate-y-40 md:-translate-y-44 lg:translate-x-32 md:translate-x-15 translate-x-10 stroke-current bg-red-accent hover:bg-gray-100 text-gray-200 hover:text-red-accent p-2 rounded-full " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>  
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
                        <div class="flex flex-col min-w-0 break-words bg-white dark:bg-transparent text-gray-700 dark:text-gray-50 w-full mb-6">

                            <h1 class="text-lg font-bold ml-60">Personal Details</h1>
                            <div class="px-20 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <div class="block" id="tab-info">
                                        <div class="flex flex-col md:flex-row ">
                                            <div class="w-36 font-bold h-6 mx-2 mt-3 text-gray-500">Lastname *</div>
                                            <div class="flex-1 flex flex-col md:flex-row">
                                                <div class="w-full flex-1 mx-2">
                                                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                                        <input placeholder="Lastname" class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col md:flex-row ">
                                            <div class="w-36 font-bold h-6 mx-2 mt-3 text-gray-500">Firstname *</div>
                                            <div class="flex-1 flex flex-col md:flex-row">
                                                <div class="w-full flex-1 mx-2">
                                                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                                        <input placeholder="Firstname" class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                                            <div class="w-36 font-bold h-6 mx-2 mt-3 text-gray-500">Middlename *</div>
                                            <div class="flex-1 flex flex-col md:flex-row">
                                                <div class="w-full flex-1 mx-2">
                                                    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                                        <input placeholder="Middlename" class="p-1 px-2 appearance-none outline-none w-full text-gray-800 ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=""></div>
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
