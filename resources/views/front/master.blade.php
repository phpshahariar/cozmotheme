<!doctype HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="DigiPro - Digital Products Marketplace ">
    <meta name="keywords" content="marketplace, easy digital download, digital product, digital, html5">
    <title>Cozmo Theme</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">
    <!-- inject:css-->
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/animate.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/slick.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/trumbowyg.min.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/vendor_assets/css/venobox.css">
    <link rel="stylesheet" href="{{ asset('/frontend/') }}/style.css">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- endinject -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/frontend/') }}/img/favicon-32x32.png">
</head>

<body class="preload">
<!-- start menu-area -->
<div class="menu-area">
    @include('front.include.header')
    <!-- end  -->
</div>
<!-- end /.menu-area -->

<!-- ends: .hero-area -->
<!-- ends: .subscribe -->
@yield('content')
@include('front.include.footer')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDxflHHc5FlDVI-J71pO7hM1QJNW1dRp4U"></script>
<!-- inject:js-->
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery/jquery-1.12.4.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery/uikit.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/bootstrap/popper.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/chart.bundle.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/grid.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery-ui.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery.barrating.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery.countdown.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery.counterup.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery.easing1.3.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/owl.carousel.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/select2.full.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/slick.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/tether.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/trumbowyg.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/venobox.min.js"></script>
<script src="{{ asset('/frontend/') }}/vendor_assets/js/waypoints.min.js"></script>
<script src="{{ asset('/frontend/') }}/theme_assets/js/dashboard.js"></script>
<script src="{{ asset('/frontend/') }}/theme_assets/js/main.js"></script>
<script src="{{ asset('/frontend/') }}/theme_assets/js/map.js"></script>
<!-- endinject-->
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



</body>

</html>