<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flex-slider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>
<body class="js">
    <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
    <div id="app">
        @include('partials.header')
        <main>
			@include('flash::message')
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- Fancybox JS -->
	<script src="{{ asset('js/facnybox.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset('js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('js/flex-slider.js') }}"></script>
    <!-- Ytplayer JS -->
	<script src="{{ asset('js/ytplayer.min.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ asset('js/active.js') }}"></script>
    @yield('extra-js', '')
</body>
</html>
