<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ dark: true }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title')</title>
    <base href="{{ \URL::to('/') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css')}}">
    <link href="{{ asset('plugins/materialDashboard/material-dashboard.min.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('plugins/creativeTm/creativeTm.css') }}" rel="stylesheet">

    <script>
      const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
      ];
      const d = new Date();

    </script>

</head>
<body class="bg-gray-100">
  <div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo d-flex flex-col justify-items-center align-items-center">
        <a  class="simple-text">
          {{ Auth::user()->lastname }}, {{ Auth::user()->firstname }} {{ Auth::user()->middlename[0] }}. 
        </a>
        @if(Auth::user()->role == 1)
          <figcaption class="blockquote-footer">
            Administrator
          </figcaption>
        @endif
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="#">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">person</i>
              <p>Pre-Enrolled</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    @yield('content')
  </div>
  {{-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="material-icons p-3">settings</i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
      
      </ul>
    </div> --}}
<!-- start navbar -->
{{-- <div class="md:fixed md:w-full md:top-0 md:z-20 flex flex-row flex-wrap items-center bg-white p-6 border-b border-gray-300">
    
  <!-- logo -->
  <div class="flex-none w-56 flex flex-row items-center">

    <strong class="capitalize ml-1 flex-1">PUP</strong>

    <button id="sliderBtn" class="flex-none text-right text-gray-900 hidden md:block">
      <i class="fad fa-list-ul"></i>
    </button>
  </div>
  <!-- end logo -->   
  
  <!-- navbar content toggle -->
  <button id="navbarToggle" class="hidden md:block md:fixed right-0 mr-6">
    <i class="fad fa-chevron-double-down"></i>
  </button>
  <!-- end navbar content toggle -->

  <!-- navbar content -->
  <div id="navbar" class="animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white flex-1 pl-3 flex flex-row flex-wrap justify-between items-center md:flex-col md:items-center">
    <!-- left -->
    <div class="text-gray-600 md:w-full md:flex md:flex-row md:justify-evenly md:pb-10 md:mb-10 md:border-b md:border-gray-200">
      <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-envelope-open-text"></i></a>        
      <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-comments-alt"></i></a>        
      <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-check-circle"></i></a>        
      <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="#" title="email"><i class="fad fa-calendar-exclamation"></i></a>        
    </div>
    <!-- end left -->      

    <!-- right -->
    <div class="flex flex-row-reverse items-center"> 

      <!-- user -->
      <div class="dropdown relative md:static">

        <button class="menu-btn focus:outline-none focus:shadow-outline flex flex-wrap items-center">
          <div class="w-8 h-8 overflow-hidden rounded-full">
            <img class="w-full h-full object-cover" src="img/user.svg">
          </div> 

          <div class="ml-2 capitalize flex ">
            <h1 class="text-sm text-gray-800 font-semibold m-0 p-0 leading-none">moeSaid</h1>
            <i class="fad fa-chevron-down ml-2 text-xs leading-none"></i>
          </div>                        
        </button>

        <button class="fixed top-0 left-0 z-10 w-full h-full menu-overflow hidden"></button>

        <div class="text-gray-500 menu md:mt-10 md:w-full rounded bg-white shadow-md absolute z-20 right-0 w-40 mt-5 py-2 animated faster hidden">

          <!-- item -->
          <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
            <i class="fad fa-user-edit text-xs mr-1"></i> 
            edit my profile
          </a>     
          <!-- end item -->

          <!-- item -->
          <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
            <i class="fad fa-inbox-in text-xs mr-1"></i> 
            my inbox
          </a>     
          <!-- end item -->

          <!-- item -->
          <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
            <i class="fad fa-badge-check text-xs mr-1"></i> 
            tasks
          </a>     
          <!-- end item -->

          <!-- item -->
          <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
            <i class="fad fa-comment-alt-dots text-xs mr-1"></i> 
            chats
          </a>     
          <!-- end item -->

          <hr>

          <!-- item -->
          <a class="px-4 py-2 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 hover:text-gray-900 transition-all duration-300 ease-in-out" href="#">
            <i class="fad fa-user-times text-xs mr-1"></i> 
            log out
          </a>     
          <!-- end item -->

        </div>
      </div>
      <!-- end user -->

      <!-- notifcation -->
      <div class="dropdown relative mr-5 md:static">

        <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
          <i class="fad fa-bells"></i>               
        </button>

        <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

        <div class="menu hidden rounded bg-white md:right-0 md:w-full shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
          <!-- top -->
          <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
            <h1>notifications</h1>
            <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
              <strong>5</strong>
            </div>
          </div>
          <hr>
          <!-- end top -->

          <!-- body -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
              <i class="fad fa-birthday-cake text-sm"></i>
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">poll..</h1>
                <p class="text-xs text-gray-500">text here also</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>4 min ago</p>
              </div>
            </div>

          </a>
          <hr>
          <!-- end item -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
              <i class="fad fa-user-circle text-sm"></i>
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">mohamed..</h1>
                <p class="text-xs text-gray-500">text here also</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>78 min ago</p>
              </div>
            </div>

          </a>
          <hr>
          <!-- end item -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
              <i class="fad fa-images text-sm"></i>
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">new imag..</h1>
                <p class="text-xs text-gray-500">text here also</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>65 min ago</p>
              </div>
            </div>

          </a>
          <hr>
          <!-- end item -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="px-3 py-2 rounded mr-3 bg-gray-100 border border-gray-300">
              <i class="fad fa-alarm-exclamation text-sm"></i>
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">time is up..</h1>
                <p class="text-xs text-gray-500">text here also</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>1 min ago</p>
              </div>
            </div>

          </a>
          <!-- end item -->


          <!-- end body -->

          <!-- bottom -->
          <hr>
          <div class="px-4 py-2 mt-2">
            <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
              view all
            </a>
          </div>
          <!-- end bottom -->            
        </div>
      </div>
      <!-- end notifcation -->

      <!-- messages -->
      <div class="dropdown relative mr-5 md:static">

        <button class="text-gray-500 menu-btn p-0 m-0 hover:text-gray-900 focus:text-gray-900 focus:outline-none transition-all ease-in-out duration-300">
          <i class="fad fa-comments"></i>               
        </button>

        <button class="hidden fixed top-0 left-0 z-10 w-full h-full menu-overflow"></button>

        <div class="menu hidden md:w-full md:right-0 rounded bg-white shadow-md absolute z-20 right-0 w-84 mt-5 py-2 animated faster">
          <!-- top -->
          <div class="px-4 py-2 flex flex-row justify-between items-center capitalize font-semibold text-sm">
            <h1>messages</h1>
            <div class="bg-teal-100 border border-teal-200 text-teal-500 text-xs rounded px-1">
              <strong>3</strong>
            </div>
          </div>
          <hr>
          <!-- end top -->

          <!-- body -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
              <img class="w-full h-full object-cover" src="img/user1.jpg" alt="">
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">mohamed said</h1>
                <p class="text-xs text-gray-500">yeah i know</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>4 min ago</p>
              </div>
            </div>

          </a>
          <hr>
          <!-- end item --> 

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
              <img class="w-full h-full object-cover" src="img/user2.jpg" alt="">
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">sull goldmen</h1>
                <p class="text-xs text-gray-500">for sure</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>1 day ago</p>
              </div>
            </div>

          </a>
          <hr>
          <!-- end item -->

          <!-- item -->
          <a class="flex flex-row items-center justify-start px-4 py-4 block capitalize font-medium text-sm tracking-wide bg-white hover:bg-gray-200 transition-all duration-300 ease-in-out" href="#">

            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 bg-gray-100 border border-gray-300">
              <img class="w-full h-full object-cover" src="img/user3.jpg" alt="">
            </div>

            <div class="flex-1 flex flex-rowbg-green-100">
              <div class="flex-1">
                <h1 class="text-sm font-semibold">mick</h1>
                <p class="text-xs text-gray-500">is typing ....</p>
              </div>
              <div class="text-right text-xs text-gray-500">
                <p>31 feb</p>
              </div>
            </div>

          </a>
          <!-- end item -->


          <!-- end body -->

          <!-- bottom -->
          <hr>
          <div class="px-4 py-2 mt-2">
            <a href="#" class="border border-gray-300 block text-center text-xs uppercase rounded p-1 hover:text-teal-500 transition-all ease-in-out duration-500">
              view all
            </a>
          </div>
          <!-- end bottom -->            
        </div>
      </div>
      <!-- end messages -->               


    </div>
    <!-- end right -->
  </div>
  <!-- end navbar content -->

</div> --}}
{{-- Core js --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('plugins/materialDesign/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('plugins/perfectScrollbar/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="plugins/creativeTm/creativeTm.js"></script>
<!-- end script -->

{{-- custom script --}}
<script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });

      $('.wrapper').perfectScrollbar();
    });
  </script>


</body>
</html>
