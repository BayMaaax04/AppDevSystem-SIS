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

                <div class="flex h-full justify-between ">
                    <div class="intro-y box mt-5 lg:mt-0 px-1 py-10 pb-40 flex-3 flex items-center flex-col bg-white dark:bg-gray-tertiary-dark rounded-md shadow-md border-t-4 border-red-accent items-center space-x-4 mr-5">
                        <div class=" relative block text-center items-center p-5">
                            <div class="h-40 w-40 rounded-full overflow-hidden border-1 border-gray-400 focus:outline-none focus:border-white">
                                <img alt="" class="h-full w-full object-cover" src="https://icewall-laravel.left4code.com/dist/images/profile-10.jpg">
                            </div>
                            <div class="mt-1">
                                <div class="font-medium text-base">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                                <div class="text-gray-600">BSIT 3-2</div>
                            </div>
                        </div>

                        <div class="p-5 border-t border-gray-200 dark:border-dark-50 flex justify-between w-full">
                            <h3>Current Status : </h3>
                            <div class="flex items-end|">
                                <svg height="100" width="100">
                                    <circle class="fill-current text-green-500" cx="5" cy="5" r="5" stroke="none" stroke-width="3" />
                                </svg>
                                <h3>Enrolled</h3>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 mt-5 lg:mt-0 p-2 block bg-white dark:bg-gray-tertiary-dark rounded-md shadow-md border-t-4 border-red-accent items-center">
                        <div class="nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start" role="tablist">
                            <a id="dashboard-tab" data-toggle="tab" data-target="#dashboard" href="javascript:;" class="py-4 sm:mr-8 active" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                            <a id="account-and-profile-tab" data-toggle="tab" data-target="#account-and-profile" href="javascript:;" class="py-4 sm:mr-8" role="tab" aria-selected="false">Account &amp; Profile</a>
                            <a id="activities-tab" data-toggle="tab" data-target="#activities" href="javascript:;" class="py-4 sm:mr-8" role="tab" aria-selected="false">Activities</a>
                            <a id="tasks-tab" data-toggle="tab" data-target="#tasks" href="javascript:;" class="py-4 sm:mr-8" role="tab" aria-selected="false">Tasks</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</main>
@endsection
