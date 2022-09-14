@extends('layouts.main')
@section('content')

    <style type="text/css">
        header{
            background-color: #0d1b26;
            color: #fff;
            padding: 10px 0;
        }
        .hide-element{
            display: none;
        }
        .notificaton-icon, .avater {
            display: inline-block;
        }


    </style>

    <!---------------- banner section --------------------->

    <div class="bg-white align-items-center padding-top contact-col about-col position-relative terms-col support-col">
        <div class="horizental-line"></div>
        <div class="mentor-searcg-wrapper">
            <h6>Help and Support </h6>
            <h1>Welcome! We are here to help!</h1>
            <p class="mt-3">Dear TELCCA user,</p>
            <p> Kindly, make sure you have already checked out our “FAQs” page before submitting any questions or inquiries. If you could not find what you need on our “FAQs” page, then you are highly encouraged to write for us on our email:</p>
            <a href="mailto:support@telcca.com">support@telcca.com</a>
            <br><br>
            <p>We might take about 7 working days before we can reply to your email. However, we will always try to answer you as soon as possible.</p>
        </div>
    </div>

    <section class="about-text bg-white pb-0">
        <div class="text-center empowered contact-empowered">
            <div class="container">
                For complaints and / or suggestions, you can instead email us through the “Contact Us” page. Looking forward to helping you out!
            </div>
        </div>
    </section>


@endsection