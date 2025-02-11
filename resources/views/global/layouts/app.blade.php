<!DOCTYPE html>
<html lang="en" class="">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Meta -->
    <title>Edulogy</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="{{ asset('global/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/assets/css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('global/assets/css/animate.css') }}">

    <link href="{{ asset('global/assets/style.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="{{ asset('global/assets/images/loader.gif') }}" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">

        @include('global.components.header')

        @yield('content')

        @include('global.components.footer')

    </div>

    <!-- Arrow Up Button -->
    <a href="#" id="scrollToTop" class="scroll-to-top">
        &#8679;
    </a>

    <!-- jQuery Files -->
    <script src="{{ asset('global/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('global/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('global/assets/js/carousel.js') }}"></script>
    <script src="{{ asset('global/assets/js/animate.js') }}"></script>
    <script src="{{ asset('global/assets/js/custom.js') }}"></script>

    <script>
        // Show or hide the button
        window.onscroll = function() {
            var scrollToTopButton = document.getElementById('scrollToTop');
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopButton.style.display = 'block';
            } else {
                scrollToTopButton.style.display = 'none';
            }
        };

        // Scroll to top when the button is clicked
        document.getElementById('scrollToTop').onclick = function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };
    </script>

    @stack('scripts')

</body>

</html>
