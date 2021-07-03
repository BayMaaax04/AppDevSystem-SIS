@extends('layouts.app')

@section('content')

<main class="p-6 m-9 bg-white dark:bg-gray-tertiary-dark rounded-xl shadow-md border-t-4 border-red-accent items-center space-x-4 mt-16">
    <div class="flex-shrink-0">
        <div class="max-w-sm mx-auto space-y-9">
            <section class="p-4 rounded-xl shadow-md divide-y-2 dark:bg-gray-primary-dark">
                <header class="pt-2 font-normal text-center uppercase text-xl block text-red-accent dark:text-white mb-2 sm:mb-4 ">
                    {{ __('Change Password') }}
                </header>

                @if (session('status'))
                    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-3 " method="POST" action="{{ route('user.changePassword') }}" id="changePasswordForm">
                    @csrf

                        <div class="flex flex-col mb-4 w-full">

                            <div class="pt-6 flex flex-row mb-1 items-center justify-between" x-data="{ show: true }">
                                <svg class="w-8 h-8 mr-3 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            
                                <div class="relative w-full">
                                    <input class="text-sm border rounded-md py-2 px-3 text-grey-darkest focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 w-full @error('currentPassword') border-red-500 @enderror" placeholder="Enter your current password" id="currentPassword" :type="show ? 'password' : 'text'" name="currentPassword"  autocomplete="currentPassword"
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
    
                            
    
                            @error('currentPassword')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    <div class="flex flex-col mb-4">

                        <div class="pt-1 flex flex-row mb-1 items-center justify-between" x-data="{ show: true }">
                            <svg class="w-8 h-8 mr-3 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        
                            <div class="relative w-full">
                                <input class="text-sm border rounded-md py-2 px-3 text-grey-darkest focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 w-full @error('newPassword') border-red-500 @enderror" placeholder="Enter your new password" id="newPassword" :type="show ? 'password' : 'text'" name="newPassword"  autocomplete="newPassword"
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

                        

                        @error('newPassword')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4">
                        <div class="pt-1 flex flex-row mb-1 items-center justify-between" x-data="{ show: true }">
                            <svg class="w-8 h-8 mr-3 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>

                            <div class="relative w-full">
                                <input class="text-sm border rounded-md py-2 px-3 text-grey-darkest focus:outline-none focus:ring-2 ring-gray-200 ring-opacity-75 md:ring-opacity-50 w-full @error('confirmPassword') border-red-500 @enderror" placeholder="Confirm new password" id="confirmPassword" :type="show ? 'password' : 'text'"  name="confirmPassword"  autocomplete="confirmPassword"
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
                        @error('confirmPassword')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="text-gray-100 py-4 text-right">
                        <button type="submit" class="text-sm px-4 py-2 rounded-full active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-500 ease-in-out bg-red-accent hover:bg-red-800 transform">
                            {{ __('Update Password') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection

@section('scripts')
    @if ( Session::get('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                width: 450,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success')}}'
            })
        </script>
    @endif
    @if ( Session::get('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                width: 500,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('error')}}'
            })
        </script>
    @endif
@endsection
