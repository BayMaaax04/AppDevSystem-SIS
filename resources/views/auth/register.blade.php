@extends('layouts.nonav')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Register') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('register') }}">
                    <br>
                    @if( Session::get('success'))
                        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if( Session::get('error'))
                        <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Last Name') }}:
                        </label>

                        <input id="lastname" type="text" class="form-input w-full @error('lastname')  border-red-500 @enderror"
                            name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>

                        @error('lastname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('First Name') }}:
                        </label>

                        <input id="firstname" type="text" class="form-input w-full @error('firstname')  border-red-500 @enderror"
                            name="firstname" value="{{ old('firstname') }}"  autocomplete="name" autofocus>

                        @error('firstname')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="middlename" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Middle Name') }}:
                        </label>

                        <input id="middlename" type="text" class="form-input w-full @error('middlename')  border-red-500 @enderror"
                            name="middlename" value="{{ old('middlename') }}"  autocomplete="middlename" autofocus>

                        @error('middlename')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}"  autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Password') }}:
                        </label>

                        <input id="password" type="password"
                            class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                             autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                            name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Register') }}
                        </button>

                        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                            {{ __('Already have an account?') }}
                            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection