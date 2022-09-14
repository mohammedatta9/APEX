@extends('layouts.main') @section('content')

    <style type="text/css">
        header .login-reg,
        header #navbarSupportedContent,
        header .navbar-light .navbar-toggler {
            display: none !important;
        }
        header .navbar-brand img {
            filter: grayscale(1) brightness(2.5);
        }
        .col-sm-12.col-lg-12.text-white.h-100.payment-declined {
            padding-top: 140px;
            padding-bottom: 60px;}
        header {
            height: 0;
        }
        .text-white {
            color: #fff!important;
            line-height: 1.9;
        }
    </style>




    <div class="signin-section text-center">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-12 col-lg-12 text-white h-100 payment-declined">
                <div class="col-sm-10 col-lg-7 m-auto">
                    <h1 class="m-0 p-0 w-100 mb-4">All Done!</h1>
                    <h1 class="m-0 p-0 w-100 mb-4">Thank you for submitting your “Let’s Collaborate!” application for us in TELCCA!</h1>
                    <p class="mt-1 mb-4 text-white">We will send you an email regarding your application in 5-7 working days.</p>
                    <p class="mt-1 mb-4 text-white">Stay tuned, and good luck!</p>
                    <div class="back-btn">
                        <a href="{{ url('/') }}" class="back-profile">Back to Home</a>
                    </div>

                    <div class="social-btn">
                        <a href="https://www.facebook.com/telcca" target="_blank" class="back-profile">Follow TELCCA on Facebook</a>
                        <a href="https://www.instagram.com/telcca" target="_blank" class="back-profile">Follow TELCCA on Instagram</a>
                        <a href="https://www.linkedin.com/company/telcca" target="_blank" class="back-profile">Follow TELCCA on LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection