@extends('layouts.app')

@section('title')
  PUP Student Portal | Home  
@endsection

@section('content')

<main class="sm:container sm:mx-auto sm:mt-2 text-sm">
    <div class="w-full sm:px-30">

        {{-- @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif --}}

        <section class="flex flex-col break-words">
            <div class="lg:mx-20 mx-2 my-2">
                <div class="mt-16"></div>

                <div class="lg:flex block h-full justify-between">
                    <div class="intro-y box mt-5 lg:mt-0 px-8 lg:pb-40 lg:flex-3 flex-2 lg:flex block items-center lg:flex-col bg-white dark:bg-gray-primary-dark rounded-md shadow-md border-t-4 border-red-accent lg:mr-5 dark:text-gray-50">
                        <div class="lg:block flex text-center flex-col items-center p-5">
                            <div class="lg:h-40 lg:w-40 md:h-36 md:w-36 h-28 w-28 rounded-full border-1 overflow-hidden border-gray-400 focus:outline-none focus:border-white ">
                                <img alt="Profile" src="{{ Auth::user()->picture}}" class="h-full w-full object-cover profile-picture" >
                            </div>

                            <div class="flex-1 pt-2">
                                <div class="font-medium text-base ">{{ Auth::user()->lastname }}, {{ Auth::user()->firstname }} {{ Auth::user()->middlename[0] }}.</div>
                                <div class="text-gray-600 ">BSIT 3-2</div>
                            </div>

                            <input type="file" name="user_image" id="user_image" class="hidden opacity-0"/>

                            <a href="javascript:void(0)" id="change-picture-btn" class="w-9 h-9 cursor-default pointer-events-none">
                                <svg class="cursor-pointer pointer-events-auto lg:w-11 lg:h-11 w-9 h-9 transform lg:-translate-y-52 -translate-y-40 md:-translate-y-44 lg:translate-x-32 md:translate-x-15 translate-x-10 stroke-current bg-red-accent hover:bg-gray-100 text-gray-200 hover:text-red-accent p-2 rounded-full transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
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
                        <div class="w-full hidden lg:flex">
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
                        
                        <div class="lg:p-2 border-t border-gray-400 dark:border-dark-50 lg:flex hidden "></div>

                        {{-- Start Tabs --}}
                        <form  id="userInfoForm" method="POST" action="{{ route('user.updateInfo') }}">
                            @csrf
                            {{-- @csrf --}}
                            <!-- Equivalent to... -->
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                            
                            <div class="flex flex-col min-w-0 break-words bg-white dark:bg-transparent text-gray-700 dark:text-gray-50 w-full mb-6">
                                <div class="lg:px-20 px-2 py-5 flex-auto">
                                    <div class="tab-content tab-space">
                                        {{-- Personal Details Tab --}}
                                        <div class="block" id="tab-info">
                                            <h1 class="text-lg font-bold lg:ml-32 mb-3 flex">Personal Details</h1>
                                            <div class="flex flex-col lg:flex-row ">
                                                <input class="appearance-none w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500 hidden"  id="email" type="text" placeholder="email" value="{{Auth::user()->email}}" name="email" readonly >
                                            </div>
                                            <div class="flex flex-col lg:flex-row ">
                                                <label class="w-36 tracking-wide font-bold text-xs h-6 mx-2 mt-3 text-gray-500" for="lastname">Lastname :</label>
                                                <div class="block w-full">
                                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 leading-tight focus:outline-none   cursor-default @error('lastname') border-red-500 @enderror" "  id="lastname" type="text" placeholder="Lastname" value="{{Auth::user()->lastname}}" name="lastname" readonly>

                                                    @error('lastname')
                                                    <p class="text-red-500 text-xs italic mt-4">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="pt-2 flex flex-col lg:flex-row ">
                                                <label class="w-36 tracking-wide font-bold text-xs h-6 mx-2 mt-3 text-gray-500" for="firstname">Firstname :</label>
                                                <div class="block w-full">
                                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border  rounded py-3 px-4 leading-tight focus:outline-none   cursor-default @error('firstname') border-red-500 @enderror"  id="firstname" type="text" placeholder="Firstname" value="{{Auth::user()->firstname}}" name="firstname" readonly>

                                                    @error('firstname')
                                                    <p class="text-red-500 text-xs italic mt-4">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="pt-2 flex flex-col lg:flex-row ">
                                                <label class="w-36 tracking-wide font-bold text-xs h-6 mx-2 mt-3 text-gray-500" for="middlename">Middlename :</label>

                                                <div class="block w-full">
                                                    <input class="appearance-none block w-full bg-gray-100 text-gray-700 border  rounded py-3 px-4 leading-tight focus:outline-none   cursor-default @error('middlename') border-red-500 @enderror"  id="middlename" type="text" placeholder="Middlename"  name="middlename" value="{{Auth::user()->middlename}}" readonly>

                                                    @error('middlename')
                                                    <p class="text-red-500 text-xs italic mt-4">
                                                        {{ $message }}
                                                    </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-4 lg:mb-4"></div>

                                            {{--Other Personal Details --}}
                                            
                                            <div class="flex flex-col lg:flex-row"> 
                                                <div class="w-32 font-bold h-6 mx-2 lg:mt-3 mt-0 text-gray-800">
                                                </div>   
                                                <div class="w-full flex flex-col lg:flex-row">
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-gender">
                                                            Gender
                                                        </label>
                                                        <div class="relative">
                                                            <select class=" appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-gender">
                                                            <option value="0">Male</option>
                                                            <option value="1">Female</option>
                                                            </select>
                                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-civilstat">
                                                        Civil Status
                                                        </label>
                                                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-civilstat" type="text" placeholder="" name="civilstat">
                                                        <span class="text-sm text-red-accent italic error-text civilstat-error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col lg:flex-row"> 
                                                <div class="w-32 font-bold h-6 mx-2 lg:mt-3 text-gray-800">
                                                </div>   
                                                <div class="w-full flex flex-col lg:flex-row">
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-birthday">
                                                        Birthday
                                                        </label>
                                                        <input class="appearance-none cursor-pointer block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-birthday" type="date" placeholder="" name="birthday">
                                                        <span class="text-sm text-red-accent italic error-text birthday-error"></span>
                                                    </div>
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-birthplace">
                                                        Birthplace
                                                        </label>
                                                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-birthplace" type="text" placeholder="" name="birthplace">
                                                        <span class="text-sm text-red-accent italic error-text birthplace-error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col lg:flex-row"> 
                                                <div class="w-32 font-bold h-6 mx-2 lg:mt-3 text-gray-800">
                                                </div>   
                                                <div class="w-full flex flex-col lg:flex-row">
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-religion">
                                                        Religion
                                                        </label>
                                                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-religion" type="text" placeholder="" name="religion">
                                                        <span class="text-sm text-red-accent italic error-text religion-error"></span>
                                                    </div>
                                                    <div class="w-full lg:px-3 lg:mb-6 mb-0">
                                                        <label class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2" for="grid-nationality">
                                                        Nationality
                                                        </label>
                                                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-nationality" type="text" placeholder="" name="nationality">
                                                        <span class="text-sm text-red-accent italic error-text nationality-error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-4 mb-4"></div>
                                        </div>
                                        {{-- Address Tab --}}
                                        <div class="hidden" id="tab-address">
                                            <h1 class="text-lg font-bold lg:ml-32 mb-3 flex"> Full Address</h1>
                                            <address class="flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-housenum">House Number</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-housenum" type="number" placeholder="House Number" name="houseno">
                                                <span class="text-sm text-red-accent italic error-text houseno-error"></span>
                                            </address>
                                            <address class="pt-2 flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-street-name">Street Name</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-street-name" type="text" placeholder="Street Name" name="streetname">
                                                <span class="text-sm text-red-accent italic error-text streetname-error"></span>
                                            </address>
                                            <address class="pt-2 flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-barangay">Barangay</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-barangay" type="text" placeholder="Barangay / District" name="barangay">
                                                <span class="text-sm text-red-accent italic error-text barangay-error"></span>
                                            </address>

                                            <address class="pt-2 flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-city">City</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-city" type="text" placeholder="City" name="city">
                                                <span class="text-sm text-red-accent italic error-text city-error"></span>
                                            </address>
                                            <address class="pt-2 flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-province">Province</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-province" type="text" placeholder="Province" name="province">
                                                <span class="text-sm text-red-accent italic error-text province-error"></span>
                                            </address>
                                            <address class="pt-2 flex flex-col lg:flex-row ">
                                                <div class="w-36 tracking-wide font-bold h-6 mx-2 mt-3 text-gray-500" for="grid-zipcode">Zip Code</div>
                                                <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  id="grid-zipcode" type="number" placeholder="Zip Code" min="400" max="9811"  inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" name="zipcode">
                                                <span class="text-sm text-red-accent italic error-text zipcode-error"></span>
                                            </address>

                                            <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-4 mb-4"></div>


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
                                    <div class="w-full flex lg:hidden items-center text-center justify-center">
                                        <ul class="flex item-center justify-center text-center text-sm text-white flex-wrap flex-row ">
                                            <li>
                                                <div class="pointer-events-none h-8 w-8 flex items-center justify-center text-gray-800 dark:text-white">&laquo;</div>
                                            </li>
                                            <li class="px-2">
                                                <a class="cursor-pointer p-2 bg-red-accent hover:bg-red-700 rounded-full h-8 w-8 flex items-center justify-center" onclick="changeAtiveTab(event,'tab-info')">1</a>
                                            </li>
                                            <li class="px-2">
                                                <a class="cursor-pointer p-2 bg-red-accent hover:bg-red-700 rounded-full h-8 w-8 flex items-center justify-center" onclick="changeAtiveTab(event,'tab-address')">2</a>
                                            </li>
                                            <li class="px-2">
                                                <a class="cursor-pointer p-2 bg-red-accent hover:bg-red-700 rounded-full h-8 w-8 flex items-center justify-center" onclick="changeAtiveTab(event,'tab-guardian')">3</a>
                                            </li>
                                            <li class="px-2">
                                                <a class="cursor-pointer p-2 bg-red-accent hover:bg-red-700 rounded-full h-8 w-8 flex items-center justify-center" onclick="changeAtiveTab(event,'tab-educ')">4</a>
                                            </li>
                                            <li >
                                                <div class="pointer-events-none h-8 w-8 flex items-center justify-center text-gray-800 dark:text-white">&raquo;</div>
                                            </li>
                                        </ul>  
                                    </div>
                                    <button class="float-right py-2 px-4 rounded-full bg-red-accent text-gray-100 text-sm active:outline-none focus:outline-none hover:bg-red-800 transition ease" type="submit">
                                        {{ __('Update Profile') }}
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
</main>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        // Update personal Info
        $('#userInfoForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                dataType: 'json',
                type:'post',
                processData:false,
                contentType:false,
                success:function(data){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        width:500,
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
                        title: 'Profile information updated successfully.'
                    })
                },
                error:function(data){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        width:500,
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Something went wrong, Please try again.'
                    })
                },
            });
        });
    });

    flatpickr("#grid-birthday", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

    // Change profile Pic
    document.querySelector("#change-picture-btn")
        .addEventListener("click", function () {
            document.querySelector("#user_image").click();
        });

        $("#user_image").ijaboCropTool({
          preview: ".profile-picture",
          setRatio: 1,
          allowedExtensions: ["jpg", "jpeg", "png"],
          buttonsText: ["CROP & SAVE", "CANCEL"],
          buttonsColor: ["#30bf7d", "#ee5155", -15],
          processUrl: '{{ route("user.updatePicture") }}',

          onSuccess: function (message, element, status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                width:'500',
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Your profile has been updated successfully.'
            })
          },
          onError: function (message, element, status) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                width:'500',
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: 'Something went wrong, please try again later.'
            })
          },
      });

      
    // Active Navbar
    // const currentLocation = location.href;
    // const navLinks = document.querySelectorAll("a#nav-links");
    // const navLength = navLinks.length;
    // for (let i = 0; i < navLength; i++) {
    //     if (navLinks[i].href === currentLocation) {
    //         navLinks[i].className =
    //             "active lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-red-accent border-b-2 border-red-accent font-bold";
    //     }
    // }
    
    // Active Tabs
    const changeAtiveTab = (event, tabID) => {
      let element = event.target;
      while (element.nodeName !== "A") {
          element = element.parentNode;
      }
      ulElement = element.parentNode.parentNode;
      aElements = ulElement.querySelectorAll("li > a");
      tabContents = document
          .getElementById("tabs-id")
          .querySelectorAll(".tab-content > div");
      for (let i = 0; i < aElements.length; i++) {
          aElements[i].classList.remove("lg:text-gray-800");
          aElements[i].classList.remove("border-red-accent");
          aElements[i].classList.add("lg:text-gray-500");
          aElements[i].classList.add("text-gray-50");

          aElements[i].classList.remove("lg:dark:text-gray-50");
          aElements[i].classList.remove("lg:dark:border-gray-200");
          aElements[i].classList.add("lg:dark:text-gray-500");

          tabContents[i].classList.add("hidden");
          tabContents[i].classList.remove("block");
      }
      element.classList.remove("lg:text-gray-500");
      element.classList.remove("text-gray-50");
      element.classList.add("lg:text-gray-800");
      element.classList.add("border-red-accent");

      element.classList.remove("lg:dark:text-gray-500");
      element.classList.add("lg:dark:text-gray-50");

      document.getElementById(tabID).classList.remove("hidden");
      document.getElementById(tabID).classList.add("block");
  };
    changeAtiveTab();


</script>  

@if (session('status'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
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
        title: '{{ session('status') }}'
    })
</script>
@endif


@if ( Session::get('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
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
        title: '{{ Session::post('success') }}'
    })
</script>
@endif
@endsection
