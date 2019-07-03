<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {!! env('APP_NAME') !!}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! asset('uploads/settings/'.$setting->site_favicon) !!}">
    <meta name="keywords" content="@yield('meta_tags')" />
    <meta name="description" content="@yield('meta_description')">
    <meta name="copyright" content="© {!! date('Y') !!} , {!! env('APP_NAME') !!}" />
    <meta name="author" content="{!! env('APP_NAME') !!}" />
    <meta name="email" content="info@dradtech.com" />
    <meta name="Distribution" content="Global" />
    <meta name="csrf-token" content="{!!  csrf_token() !!}" />

    <!--Bootstrap 4 Css-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!--Slick-->
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">

    <!--==================  Font Awesome  =====================-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--==================  Aos Animation  =====================-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    
    <!-- Font Awesome and Calenda r-->
    <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{!! asset('calendar/zabuto_calendar.min.css') !!}">

    <!--Style Css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('header_css')

</head>

<body>
    <!-- Header Section -->
    @include('layouts.frontend.header')
    <!-- End Header Section -->

    <!-- Dynamic Section -->
    <div class="tab-content">
        <!--High School-->
        @include('layouts.frontend.tab.school')

        <!--Bachelors-->
        @include('layouts.frontend.tab.bachelors')

        <!--Masters-->
        @include('layouts.frontend.tab.masters')

        <!--Kindergarten-->
        @include('layouts.frontend.tab.plus-two')
        
    </div>
    <!-- End Dynamic Section -->

    <!-- Footer Section -->
    @include('layouts.frontend.footer')
    <!-- End Footer Section -->
    
    <!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Slick JS -->
    <script src="{{ asset('js/slick.js') }}"></script>
    <!-- Aos JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!--================== Horizontal Scroll =====================-->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.min.js"></script>
    <script src="https://rawgit.com/mikejacobson/jquery-bootstrap-scrolling-tabs/master/dist/jquery.scrolling-tabs.min.js"></script> --}}
   
    <!--Gallery popup-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    
    <!-- Calendar -->
    <script type="text/javascript" src="{!! asset('calendar/zabuto_calendar.min.js') !!}"></script>
        
    @yield('footer_js')

    <!-- set defualt tab active -->
    <script>
        $(document).ready(function() {
            // on load of the page: switch to the currently selected tab
            let activeTab = localStorage.getItem('activeTab');
            if(activeTab == null || activeTab == '#school'){
                $('.nav-tabs a[href="#highschool"]').addClass('active');
            }
        });
    </script>
    <!-- set defualt tab active -->
    
    <script>
        $(document).ready(function () {
            $("#school-calendar, #bachelors-calendar, #masters-calendar, #plus-two-calendar").zabuto_calendar({
                // ajax: {
                //     url: "{{ url('calendarevents')}}",
                //     modal: true
                // },

                cell_border:true,
                today:true,
                show_days: true,
                weekstartson: 0,
                nav_icon: {
                    prev: '<i class="fa fa-angle-left"></i>',
                    next: '<i class="fa fa-angle-right"></i>'
                },
                legend: [
                ]
            });
        });
    </script>
    
    <script>
        $('.regular').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2,
                        arrows: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });

        $('.brand-list').slick({
            dots: false,
            arrows: false,
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

    </script>

    <script>
        AOS.init();
    </script>

    {{-- <script>
        //Navbar
        window.onscroll = function () { stickyNav() };

        var navbar = document.getElementById("highSchoolNav");
        var sticky = navbar.offsetTop;

        function stickyNav() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script> --}}

    <script>
        //Gallery
        $(function () {
            $('#image-list').magnificPopup({
                delegate: 'a',
                type: 'image',
                image: {
                    cursor: null,
                    titleSrc: 'title'
                },
                gallery: {
                    enabled: true,
                    preload: [0, 1], // Will preload 0 - before current, and 1 after the current image
                    navigateByImgClick: true
                }
            });
        });
    </script>
</body>
    
</html>