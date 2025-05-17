<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TripSummit</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/uploads/favicon.png') }}">

        <!-- All CSS -->
        <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/bootstrap-datepicker.min.css') }}">
        <!--<link rel="stylesheet" href="{{ asset('dist-front/css/jquery-ui.css') }}">-->
        <link rel="stylesheet" href="{{ asset('dist-front/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/select2-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/spacing.css') }}">
        <link rel="stylesheet" href="{{ asset('dist-front/css/style.css') }}">

        <!-- All Javascripts -->
        <script src="{{ asset('dist-front/js/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/bootstrap-datepicker.min.js') }}"></script>
        <!--<script src="dist-front/js/jquery-ui.js') }}"></script>-->
        <script src="{{ asset('dist-front/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/wow.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/select2.full.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/moment.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/counterup.min.js') }}"></script>
        <script src="{{ asset('dist-front/js/multi-countdown.js') }}"></script>
        <script src="{{ asset('dist-front/js/jquery.meanmenu.js') }}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    @if (Session::has('success') || Session::has('error'))
    @php
        $successMessage = Session::get('success');
        $errorMessage = Session::get('error');
    @endphp

    <script>
    $(document).ready(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 5000
        };

        @if ($errorMessage)
            toastr.error("{{ $errorMessage }}");
        @endif

        @if ($successMessage)
            toastr.success("{{ $successMessage }}");
        @endif
    });
    </script>
    @endif
    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            <li class="phone-text"><i class="fas fa-phone"></i> 111-222-3333</li>
                            <li class="email-text"><i class="fas fa-envelope"></i> contact@example.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            <li class="menu">
                                <a href="login.html"><i class="fas fa-sign-in-alt"></i> Login</a>
                            </li>
                            <li class="menu">
                                <a href="register.html"><i class="fas fa-user"></i> Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-area" id="stickymenu">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav">
                <a href="index.html" class="logo">
                    <img src="uploads/logo.png" alt="">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="uploads/logo.png" alt="">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a href="index.html" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="destinations.html" class="nav-link">Destinations</a>
                                </li>
                                <li class="nav-item">
                                    <a href="packages.html" class="nav-link">Packages</a>
                                </li>
                                <li class="nav-item">
                                    <a href="team-members.html" class="nav-link">Team</a>
                                </li>
                                <li class="nav-item">
                                    <a href="faq.html" class="nav-link">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
