@extends('layouts.app')

@section('title')
  PUP Student Portal | Registration  
@endsection

@section('content')
<main class="sm:container sm:mx-auto sm:mt-2 text-sm">
    <main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 mt-20">
        <header class="font-bold text-xl pb-2 block text-gray-800 dark:text-white mb-2 sm:mb-4 ">
            {{ __('Registration Page') }}
        </header>
        <div class="flex-shrink-0">
            <div class="max-w-6xl mx-auto">
                <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark ">
                    <table id="registration_table" class="pb-4/12 " style=" width:100%;">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-600">
                            {{-- @foreach ( as $item)
                                
                            @endforeach --}}
                        </tbody>
                    </table>
                    <div class="flex items-center justify-end">
                        <button type="submit"
                        class=" relative inline-block overflow-hidden mt-1 p-2 w-40 border-none rounded-full bg-red-accent text-white outline-none cursor-pointer transition hover:bg-red-800" id="registernowBtn">
                        <a href="{{ route('user.application') }}">
                            {{ __('Enroll Now') }}
                        </a>
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </main>
</main>
@endsection

@section('scripts')

@endsection