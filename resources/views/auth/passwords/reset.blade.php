@extends('layouts.app')

@section('content')

<main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 ">
    <div class="flex-shrink-0">
        <div class="max-w-sm mx-auto space-y-9">
            <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark">
                <header class="font-bold text-xl text-center pb-2 block text-gray-800 dark:text-white mb-2 sm:mb-4 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-40 h-10 w-50 text-center stroke-current text-red-900" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                      {{ __('Reset Password') }}
                </header>

                <form class="space-y-3 " method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="pt-6 flex flex-col mb-4">
                        <label for="email" class="block text-gray-700 dark:text-white text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }} :
                        </label>

                        <input class="bg-white border rounded-md py-2 px-3 text-gray-500 focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 @error('email') border-red-500 @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" readonly autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror      
                    </div>

                    <div class="flex flex-col mb-4">

                        <div class="py-2" x-data="{ show: true }">
                            <label for="password" class="block text-gray-700 dark:text-white text-sm font-bold mb-2 sm:mb-4">
                                {{ __('New Password') }} :
                            </label>
                        
                            <div class="relative">
                                <input class="border rounded-md py-2 px-3 text-grey-darkest focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 w-full @error('password') border-red-500 @enderror" placeholder="***********" id="password" :type="show ? 'password' : 'text'" name="password" required autocomplete="new-password"
                                >

                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                    <svg class="h-4 text-gray-700" fill="none" @click="show = !show"
                                      :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                      viewbox="0 0 576 512">
                                      <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                      </path>
                                    </svg>
                
                                    <svg class="h-4 text-gray-700" fill="none" @click="show = !show"
                                      :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                      viewbox="0 0 640 512">
                                      <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                      </path>
                                    </svg>
                
                                  </div>
                            </div>
                        </div>

                        

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4" x-data="{ show: true }">
                        <label for="password-confirm" class="block text-gray-700 dark:text-white text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm New Password') }} :
                        </label>
                        <div class="relative">
                            <input class="border rounded-md py-2 px-3 text-grey-darkest focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 w-full " placeholder="***********" id="password-confirm" :type="show ? 'password' : 'text'"  name="password_confirmation" required autocomplete="new-password"
                            >

                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                                <svg class="h-4 text-gray-700" fill="none" @click="show = !show"
                                  :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                  viewbox="0 0 576 512">
                                  <path fill="currentColor"
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                  </path>
                                </svg>
            
                                <svg class="h-4 text-gray-700" fill="none" @click="show = !show"
                                  :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                  viewbox="0 0 640 512">
                                  <path fill="currentColor"
                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                  </path>
                                </svg>
            
                              </div>
                        </div>
                    </div>

                    <div class="text-center text-gray-100 py-4">
                        <button type="submit" class="w-40 h-8 rounded-full active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-500 ease-in-out bg-red-accent hover:bg-red-900 transform hover:-translate-y-0.5 hover:scale-100">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
