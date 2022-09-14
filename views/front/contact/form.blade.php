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
        .form-contact{
            max-width: 92%;
            margin: 62px auto 0;
            padding-bottom: 50px;
        }
        .col-sm-12.col-lg-12.h-100.bg-white.p-0 {
            border: solid 1px #Dddd;
            border-radius: 10px;    margin-top: 60px;
        }
        .form-contact input {
            background-color: #eef4fe;
            color: #333;
            font-family: Proxima-Nova-Bold;
            border-radius: 10px;
            padding: 10px 20px;
            border: 0;
            width: 100%;
            margin-bottom: 60 px;
            font-size: 13px;
        }
        textarea.wpcf7-form-control.wpcf7-textarea {
            width: 100%;
            background-color: #eef4fe;
            color: #333;
            font-family: Proxima-Nova-Bold;
            border-radius: 10px;
            padding: 10px 20px;
            border: none;
        }

    </style>

    <!---------------- banner section --------------------->

    <div class="bg-white d-flex align-items-center contact-col position-relative" style="min-height: auto; padding-top: 200px;padding-bottom: 67px;">
        <div class="horizental-line"></div>
        <div class="mentor-searcg-wrapper" style="margin-top: -10%;">
            <h4>Contact Us</h4>
            <h1 style="font-size:3.5rem;">We are glad to hear from you!</h1>
            <p class="mt-3 mb-3" style="font-size: 14px;">You can contact our TELCCA team for any complaints and / or suggestions.</p>
            <div class="space-between"></div>
            <div class="row">
                <div class="col-sm-4 col-lg-4">
                    <div class="info">
                        <img src="{{ url('/') }}/site/images/call-icon.png" alt="call" class="mr-3">
                        <div>
                            <h5>Phone</h5>
                            <a href="tel:+971505071606">(+971)505071606</a> <br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="info">
                        <img src="{{ url('/') }}/site/images/pin.png" alt="pin" class="mr-3 float-left">
                        <div class="float-left">
                            <h5>Address</h5>
                            Al-Khawaneej, Dubai, United Arab Emirates
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-lg-4">
                    <div class="info">
                        <img src="{{ url('/') }}/site/images/email-icon.png" alt="email" class="mr-3 float-left">
                        <div class="float-left">
                            <h5>Email</h5>
                            <a href="mailto:contact@telcca.com">contact@telcca.com</a>
                        </div>
                    </div>
                </div>
                <div class="space-between"></div>


                <div class="col-sm-12 col-lg-12 h-100 bg-white p-0">
                    <div class="form-contact">
                        <form class="mt-12">
                            <div class="row">
                                <div class="col-sm-12 col-lg-12">
                                    <label class="w-100">Name</label>
                                    <input class="w-100 max-width-100" type="text" name="" maxlength="60">
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <label class="w-100">Address</label>
                                    <input type="text" name="" placeholder="" maxlength="160">
                                </div>

                                <div class="col-sm-6 col-lg-6">
                                    <label class="w-100">Email</label>
                                    <input type="email" name="">
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <label class="w-100">Message Title</label>
                                    <input class="w-100 max-width-100" type="text" name="" maxlength="60">
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <label class="w-100">Message Details</label>
                                    <textarea cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea" placeholder=""></textarea>
                                </div>
                            </div>
                            <input type="submit" value="send" class="btn-style mt-2">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection