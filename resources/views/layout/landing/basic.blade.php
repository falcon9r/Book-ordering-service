<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title')</title>

    <link href="//fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">


    @yield('before_css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/style-starter.css') }}">
    @yield('css')
</head>

<body>

@include('layout.landing.partials.header')

@yield('main')

@include('layout.landing.partials.footer')


@yield('before_script')
<script src="{{ asset('landing/assets/js/theme-change.js') }}"></script><!-- theme switch js (light and dark)-->

<script src="{{ asset('landing/assets/js/jquery-3.3.1.min.js') }}"></script><!-- default jQuery -->
<script src="{{ asset('landing/assets/js/owl.carousel.js') }}"></script>
<!-- script for tesimonials carousel slider -->
<script>
    $(document).ready(function () {
        $("#owl-demo1").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false,
                    loop: false
                }
            }
        })
    })
</script>
<!-- //script for tesimonials carousel slider -->
<!-- disable body scroll which navbar is in active -->
<script>
    $(function () {
        $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
        })
    });
</script>
<!-- disable body scroll which navbar is in active -->

<!--/MENU-JS-->
<script>
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!--//MENU-JS-->
<!-- jQuery-Photo-filter-lightbox-portfolio-plugin -->
<script src="{{ asset('landing/assets/js/jquery-1.7.2.js') }}"></script>
<script src="{{ asset('landing/assets/js/jquery.quicksand.js') }}"></script>
<script src="{{ asset('landing/assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.prettyPhoto.js') }}"></script>
<!-- //jQuery-Photo-filter-lightbox-portfolio-plugin -->
<!-- bootstrap js -->
<script src="{{ asset('landing/assets/js/bootstrap.min.js') }}"></script>
@yield('script')

</body>

</html>