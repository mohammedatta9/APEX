<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Telcca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('/') }}/site/images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/calender-style.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/calender-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/custom-style.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/custom-style2.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/modal-custom.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/responsive.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/notify.css?<?=time()?>">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        header .login-reg,
        header #navbarSupportedContent,
        header .navbar-light .navbar-toggler {
            display: none !important;
        }
        header .navbar-brand img {
            filter: grayscale(1) brightness(2.5);
        }
        .navbar-light .navbar-brand {

            position: relative;
            top: 0px;
        }
        .signin-bg h3 {
            max-width: 100%;

            margin-left: 10%;
        }
        .container.login {
            max-width: 100%;
            padding-left: 4%;
        }
        header {
            z-index: 99;
            position: relative;
            padding: 18px 0 !important;
            height: 0;
        }
        @media screen and (max-width: 991px) {
header {
    z-index: 99;
    position: relative;
    padding: 18px 0 !important;
    height: auto !important;
}
.signin-bg {
    min-height: auto !important;
    padding-top: 93px !important;
    padding-bottom: 66px !important;
}
.signin-bg h3 {

    font-size: 24px !important;
    line-height: 35px !important;
        margin-left: 0 !important;

}

}
    </style>
{{--    @notifyCss--}}
</head>

<body>
<header>
    <div class="container login">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light" id="header-navbar">
                    <a class="navbar-brand m-0" href="{{ route('home') }}"><img src="{{ url('/') }}/site/images/telcca.png" alt="telcca"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <div class="h-line first-line"></div>
                        <div class="h-line second-line"></div>
                        <div class="h-line third-line"></div>
                        <!-- <span class="navbar-toggler-icon"></span> -->
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="mentor-search.php">Mentors </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="coach-search.php">Coaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="apply-participate.php">Apply /
                                    Participate </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="communities.php">Communities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="quizzes.php">Quizzes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="login-reg">
                        <a href="#">
                            <i class="fa fa-search" aria-hidden="true"></i>

                        </a>

                        <div class="dropdown shape avater p-0 avater-menu mr-3">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell pr-1 ml-3"></i><span>1</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <div class="text-left avatar-sub-menu">

                                    <ul>
                                        <li>
                                            <p class="font-12">Your session request to <span>Moe Ali</span> has been
                                                accepted. Start a friendly chat with him! </p>
                                            <p class="font-12">Engineerholics session has been completed
                                                successfully. Congrats!</p>
                                        </li>
                                        <li>
                                            <p class="font-12"><span>Engineerholics</span> session has been
                                                completed successfully. Congrats!</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--   <a href="#" class="notificaton-icon"><i class="fa fa-bell mr-3 ml-3"></i><span>1</span></a> -->
                        <div class="dropdown avater p-0 avater-menu">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('/') }}/site/images/avatar.png" alt="avater"><span></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <img src="{{ url('/') }}/site/images/avater-cover.png" alt="cover" class="avater-cover">
                                <div class="text-center avatar-sub-menu">
                                    <img src="{{ url('/') }}/site/images/user-3.png" alt="avater">
                                    <h6 class="blue-color">Jont hennry</h6>
                                    <p class="font-12">Member Mattock</p>
                                    <ul>
                                        <a href="user-profile.php"><i class="fa fa-user"></i> Profile</a>
                                        <a href="messages.php"><i class="fa fa-commenting-o"></i> Messages</a>
                                        <a href="upload-download-dashboard.php"><i class="fa fa-files-o"></i> Files
                                            and Folders Dashboard</a>
                                        <a href="settings.php"><i class="fa fa-cog"></i> Settings</a>
                                        <a href="index.php"><i class="fa fa-sign-out"></i> Log out</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="sign-in.php" class="mr-2 ml-2 hide-element">
                            Sign In
                        </a>
                        <a href="register.php" class="hide-element">Register</a>
                        <a href="my-wallet.php" class="wallet-box">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>

                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="signin-section learner-section">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-5 col-lg-5 text-white h-100 signin-bg">
                <h3>Designed to be the ultimate toolkit in which all what needed to achieve greatness is found.</h3>
            </div>
            <div class="col-sm-7 col-lg-7 h-100 bg-white p-0">
                <div class="text-right-sign-in">
                    <span class="mr-2" style="color: #0D1B26; font-size:14px; ">New user?</span>
                    <a href="#company-institution-modal" data-toggle="modal" class="proxmia-bold text-right  d-inline-block mt-5 pr-5 position-relative" style="z-index: 999; font-size:14px; ">  Register </a>
                </div>
                <div class="signin-method reset-password signin-learner">
                    <h3 class="mb-2 pb-2">Sign in </h3>
                    @include('layouts.success')
                    @include('layouts.error')


                    <div class="alternative-signin">
                        <a href="{{ route('login.google') }}" class="btn-style">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="15" height="15"viewBox="0 0 172 172"style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M89.42656,165.12c-43.63156,0 -79.13344,-35.48844 -79.13344,-79.12c0,-43.63156 35.50187,-79.12 79.13344,-79.12c19.76656,0 38.68656,7.32344 53.29312,20.62656l2.66063,2.43219l-26.09563,26.09563l-2.41875,-2.06938c-7.65937,-6.5575 -17.40156,-10.17219 -27.43937,-10.17219c-23.27375,0 -42.22063,18.93344 -42.22063,42.20719c0,23.27375 18.94688,42.20719 42.22063,42.20719c16.78344,0 30.04625,-8.57312 36.29469,-23.17969h-39.73469v-35.62281l77.57469,0.1075l0.57781,2.72781c4.04469,19.20219 0.80625,47.44781 -15.5875,67.65781c-13.57188,16.72969 -33.45938,25.22219 -59.125,25.22219z"></path></g></g></svg>
                            Sign in with Google</a>
                        <a href="#" class="btn-style">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"width="15" height="15"viewBox="0 0 172 172"style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M141.04,13.76h-110.08c-9.4944,0 -17.2,7.7056 -17.2,17.2v110.08c0,9.4944 7.7056,17.2 17.2,17.2h110.08c9.4944,0 17.2,-7.7056 17.2,-17.2v-110.08c0,-9.4944 -7.7056,-17.2 -17.2,-17.2zM127.28,65.36h-6.88c-7.3616,0 -10.32,1.72 -10.32,6.88v10.32h17.2l-3.44,17.2h-13.76v51.6h-17.2v-51.6h-13.76v-17.2h13.76v-10.32c0,-13.76 6.88,-24.08 20.64,-24.08c9.976,0 13.76,3.44 13.76,3.44z"></path></g></g></svg>
                            Sign in with Facebook</a>
                    </div>
                    <hr class="m-0 pb-2" style="    border-top: 2px solid #ccc; width: 25px;">
                    <p>Or sign in using your email address</p>

                    <form class="mt-4" method="post" name="login" action="{{ route('dologin') }}">

                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">Your Email</label>
                                <input type="email" name="email" placeholder="telcca@gmail.com" value="{{ old('email') }}" required>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">Password</label>
                                <input type="password" name="password" placeholder="" required>
                            </div>
                            <div class="col">
                                <p>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="mr-1"> Remember me</p>
                            </div>
                            <div class="col">
                                <a href="reset-password.php" class="p-0 m-0 bg-transparent forget-password">Forgot password?</a>
                            </div>
                        </div>
                        <input type="submit" value="sign in" class="btn-style">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')