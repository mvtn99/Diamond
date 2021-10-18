<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>
<body class="js">
    <section class="error-page">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <!-- Error Inner -->
                            <div class="error-inner">
                                <h2>404</h2>
                                <h5>This page cannot be founded</h5>
                                <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                                <div class="button">
                                    <a href="{{ route('home') }}" class="btn">Go Homepage</a>
                                </div>
                            </div>
                            <!--/ End Error Inner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>