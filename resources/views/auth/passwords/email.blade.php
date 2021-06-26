@extends('layouts.app')

@section('content')
<main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 mt-16">
    <div class="flex-shrink-0">
        <div class="max-w-sm mx-auto space-y-9">

            {{-- @if (session('status'))
            <div class="text-sm text-green-700 bg-green-100 px-5 py-6 sm:rounded sm:border sm:border-green-400 sm:mb-6"
                role="alert">
                {{ session('status') }}
            </div>
            @endif --}}

            <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark">
                <header class="text-sm text-center pb-2 block text-gray-800 dark:text-white mb-2 sm:mb-4">
                    <h1 class=" text-xl text-center pb-2 block text-red-accent dark:text-red-700 mb-2 sm:mb-4 uppercase ">
                        {{ __('Forgot Password') }}
                    </h1>
                    <h4  class="text-sm font-normal">
                    {{ __('You forgot your password? You can easily request new password here.') }}</h4>
                </header>

                <form class="space-y-3 " method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="pt-6 pb-2 flex flex-col mb-4">
                        <input class="border rounded-md py-2 px-3 text-gray-500 focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 @error('email') border-red-500 @enderror"" placeholder="Email Address" id="email" type="email" name="email" value="" required autocomplete="email" autofocus >
                    </div>

                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4 pb-4">
                        {{ $message }}
                    </p>
                    @enderror

                    <button type="submit" class="text-white w-full h-10 rounded-lg active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-300 bg-red-accent hover:bg-red-800 transform">
                        {{ __('Request New Password') }}
                    </button>

                    <p class="p-2 text-red-accent hover:text-red-700 text-base hover:underline sm:text-sm sm:order-0 sm:m-0 w-20">
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

@section('scripts')
    @if (session('status'))
    <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'We have emailed your password reset link!',
                text: 'You may now check to your email',
                backdrop: `rgba(0,0,0,0.70)`,
                width: 600,
                showConfirmButton:true,
                confirmButtonColor: '#800000',
                showClass: {
                    popup: 'animated fadeInDown faster'
                },
                hideClass: {
                    popup: 'animated fadeOutUp faster'
                }
            })
    </script>
    @endif
@endsection