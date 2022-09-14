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
        #password-strength-meter{
            width: 47% !important;
        }
        @import url(https://fonts.googleapis.com/css?family=Signika:400,700|Courgette);
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
                <!--<nav class="navbar navbar-expand-lg navbar-light" id="header-navbar">-->
                <!--    <a class="navbar-brand m-0" href="{{ route('home') }}"><img src="{{ url('/') }}/site/images/telcca.png" alt="telcca"></a>-->
                <!--    <button class="navbar-toggler" type="button" data-toggle="collapse"-->
                <!--            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"-->
                <!--            aria-expanded="false" aria-label="Toggle navigation">-->
                <!--        <div class="h-line first-line"></div>-->
                <!--        <div class="h-line second-line"></div>-->
                <!--        <div class="h-line third-line"></div>-->
                        <!-- <span class="navbar-toggler-icon"></span> -->
                <!--    </button>-->
                <!--    <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                <!--        <ul class="navbar-nav m-auto">-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" data-toggle="none" href="mentor-search.php">Mentors </a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" data-toggle="none" href="coach-search.php">Coaches</a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" data-toggle="none" href="apply-participate.php">Apply /-->
                <!--                    Participate </a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" data-toggle="none" href="communities.php">Communities</a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link" data-toggle="none" href="quizzes.php">Quizzes</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--    <div class="login-reg">-->
                <!--        <a href="#">-->
                <!--            <i class="fa fa-search" aria-hidden="true"></i>-->

                <!--        </a>-->

                <!--        <div class="dropdown shape avater p-0 avater-menu mr-3">-->
                <!--            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"-->
                <!--               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                <i class="fa fa-bell pr-1 ml-3"></i><span>1</span>-->
                <!--            </a>-->

                <!--            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->

                <!--                <div class="text-left avatar-sub-menu">-->

                <!--                    <ul>-->
                <!--                        <li>-->
                <!--                            <p class="font-12">Your session request to <span>Moe Ali</span> has been-->
                <!--                                accepted. Start a friendly chat with him! </p>-->
                <!--                            <p class="font-12">Engineerholics session has been completed-->
                <!--                                successfully. Congrats!</p>-->
                <!--                        </li>-->
                <!--                        <li>-->
                <!--                            <p class="font-12"><span>Engineerholics</span> session has been-->
                <!--                                completed successfully. Congrats!</p>-->
                <!--                        </li>-->
                <!--                    </ul>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                        <!--   <a href="#" class="notificaton-icon"><i class="fa fa-bell mr-3 ml-3"></i><span>1</span></a> -->
                <!--        <div class="dropdown avater p-0 avater-menu">-->
                <!--            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"-->
                <!--               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                <!--                <img src="{{ url('/') }}/site/images/avatar.png" alt="avater"><span></span>-->
                <!--            </a>-->

                <!--            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
                <!--                <img src="{{ url('/') }}/site/images/avater-cover.png" alt="cover" class="avater-cover">-->
                <!--                <div class="text-center avatar-sub-menu">-->
                <!--                    <img src="{{ url('/') }}/site/images/user-3.png" alt="avater">-->
                <!--                    <h6 class="blue-color">Jont hennry</h6>-->
                <!--                    <p class="font-12">Member Mattock</p>-->
                <!--                    <ul>-->
                <!--                        <a href="user-profile.php"><i class="fa fa-user"></i> Profile</a>-->
                <!--                        <a href="messages.php"><i class="fa fa-commenting-o"></i> Messages</a>-->
                <!--                        <a href="upload-download-dashboard.php"><i class="fa fa-files-o"></i> Files-->
                <!--                            and Folders Dashboard</a>-->
                <!--                        <a href="settings.php"><i class="fa fa-cog"></i> Settings</a>-->
                <!--                        <a href="index.php"><i class="fa fa-sign-out"></i> Log out</a>-->
                <!--                    </ul>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <a href="sign-in.php" class="mr-2 ml-2 hide-element">-->
                <!--            Sign In-->
                <!--        </a>-->
                <!--        <a href="register.php" class="hide-element">Register</a>-->
                <!--        <a href="my-wallet.php" class="wallet-box">-->
                <!--            <i class="fa fa-credit-card" aria-hidden="true"></i>-->

                <!--        </a>-->
                <!--    </div>-->
                <!--</nav>-->
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
                <a href="{{ route('login') }}" class="proxmia-bold text-right w-100 d-inline-block mt-5 pr-5 position-relative" style="z-index: 999;"><span class="mr-2" style="color: #0D1B26;">Existing user?</span> Sign in</a>
                <div class="signin-method reset-password signin-learner">
                    <h3 class="m-0 pb-3">Register / {{ $type->name }}</h3>
                    @include('layouts.success')
                    @include('layouts.error')

                    <form class="mt-4" method="post" name="register" action="{{ route('register') }}">
                        <input type="hidden" name="type" value="{{ $type->id }}" >
                        @csrf
                        @if(isset($_GET['id']))
                       <input value="{{$_GET['page']}}" name="page" style="display:none">
                        @endif
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">First Name</label>
                                <input class="w-100 max-width-100" type="text" value="{{ old('first_name') }}" name="first_name" required>
                                @error('first_name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">Last Name</label>
                                <input class="w-100 max-width-100" type="text" value="{{ old('last_name') }}" name="last_name" required>
                                @error('last_name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">Password</label>
                                <input type="password" name="password" placeholder="********" required id="password">
                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100">Retype Password</label>
                                <input type="password" name="password_confirmation" placeholder="********" required>
                            </div>
                            <div class="col-sm-12 col-lg-12">
                                <meter max="4" id="password-strength-meter"></meter>
                                <p id="password-strength-text"></p>

                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label class="w-100"> Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-lg-12 mt-4">
                                <p class="w-100">
                                    <input type="checkbox" required name="accept" class="mr-1"> Creating an account means you accept our <a href="{{ route('terms') }}" target="_blank" class="remove-btn-style p-0 m-0 bg-transparent">Terms & Conditions</a> and <a href="{{ route('privacy') }}" target="_blank" class="remove-btn-style p-0 m-0 bg-transparent">Privacy Policy</a>.</p>
                               
                            </div>
                        </div>
                        <input type="submit" value="Sign ME UP" class="btn-style mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js" ></script>

<script>
    var strength = {
		0: "Worst ☹",
		1: "Bad ☹",
		2: "Weak ☹",
		3: "Good ☺",
		4: "Strong ☻"
}

var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function()
{
    var val = password.value;
    var result = zxcvbn(val);
	
    // Update the password strength meter
    meter.value = result.score;
   
    // Update the text indicator
    if(val !== "") {
        text.innerHTML = "Strength: " + "<strong>" + strength[result.score] + "</strong>" + "<span class='feedback'>" + result.feedback.warning + " " + result.feedback.suggestions + "</span>";
    }
    else {
        text.innerHTML = "";
    }
});
</script>