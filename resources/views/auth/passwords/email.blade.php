@extends('layouts.app')

@section('content')
{{-- <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Reset Password') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                            class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center items-center space-y-6 pb-6 sm:pb-10 sm:space-y-0 sm:justify-between">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:w-auto sm:px-4 sm:order-1">
                            {{ __('Send Password Reset Link') }}
                        </button>

                        <p class="mt-4 text-xs text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline sm:text-sm sm:order-0 sm:m-0">
                            <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                {{ __('Back to login') }}
                            </a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main> --}}



<main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 ">
    <div class="flex-shrink-0">
        <div class="max-w-sm mx-auto space-y-9">

            @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif

            <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark">
                <header class="font-bold text-sm text-center pb-2 block text-gray-800 dark:text-white mb-2 sm:mb-4">
                    <h1 class="font-bold text-xl text-center pb-2 block text-red-accent dark:text-red-700 mb-2 sm:mb-4 uppercase ">
                        {{ __('Forgot Password') }}
                    </h1>
                    {{ __('You forgot your password? You can easily request new password here.') }}
                </header>

                <form class="space-y-3 " method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="pt-6 pb-2 flex flex-col mb-4">
                        <input class="border rounded-md py-2 px-3 text-gray-500 focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 @error('email') border-red-500 @enderror"" placeholder="Email Address" id="email" type="email" name="email" value="" required autocomplete="email" autofocus >
                    </div>

                    @error('email')
                    <p class="font-bold text-red-500 text-xs italic mt-4 pb-4">
                        {{ $message }}
                    </p>
                    @enderror

                    <button type="submit" class="text-white font-bold w-full h-8 rounded-full active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-500 ease-in-out bg-red-accent hover:bg-red-900 transform hover:-translate-y-0.5 hover:scale-100">
                        {{ __('Request New Password') }}
                    </button>

                    <p class="p-2 text-red-accent text-base font-bold hover:underline sm:text-sm sm:order-0 sm:m-0 w-20">
                        <a href="{{ route('login') }}" >
                            {{ __('Sign in') }}
                        </a>
                    </p>
                </div>
                </form>
            </section>
        </div>
    </div>
</main>


@endsection
