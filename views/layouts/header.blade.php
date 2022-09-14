<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light" id="header-navbar" style=" height:90px;" >
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
                                <a class="nav-link" data-toggle="none" href="{{ route('mentors') }}">Mentors </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="{{ route('coaches') }}">Coaches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="{{ route('participate') }}">Apply &
                                    Participate </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="{{ route('communities') }}">Communities</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="none" href="{{ route('quizzes') }}">Quizzes</a>
                            </li>
                        </ul>
                    </div>
                    <div class="login-reg">
                        <!-- <a href="#search-modal" data-toggle="modal" >
                            <i class="fa fa-search" aria-hidden="true"></i>

                        </a> -->
                        @auth
                        <div class="dropdown shape avater p-0 avater-menu mr-3">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell pr-1 ml-3"></i><span id="counnotification">0</span>
                            </a>

                            <x-notification-menu />
                        </div>

                        <!--   <a href="#" class="notificaton-icon"><i class="fa fa-bell mr-3 ml-3"></i><span>1</span></a> -->
                        <div class="dropdown avater p-0 avater-menu">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(auth()->user()->image)
                                    <img class="avater-cover user_image" src="{{asset('/storage/users/'.auth()->user()->image)}}" style="width:32px; height:32px; border-radius: 50%;" >
                                @else
                                    <img src="{{ url('/') }}/site/images/avatar.png" alt="cover" class="avater-cover user_image" style="width:32px; height:32px; border-radius: 50%;">
                                @endif

                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <img src="{{ url('/') }}/site/images/avater-cover.png" alt="cover" class="avater-cover">
                                <div class="text-center avatar-sub-menu">
                                    @if(auth()->user()->image)
                                        <img class="avater-cover" src="{{asset('/storage/users/'.auth()->user()->image)}}" style="width:50px; height:60px;" >
                                    @else
                                        <img src="{{ url('/') }}/site/images/avatar.png" alt="cover" class="avater-cover" style="width:50px; height:60px;">
                                    @endif
{{--                                    <h6 class="blue-color">{{ auth()->user()->first_name.' '.auth()->user()->last_name }}</h6>--}}
{{--                                    <p class="font-12">{{ auth()->user()->type->name }}</p>--}}
                                    <ul>
                                        <a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profile</a>
                                        <a href="{{ url('/') }}/en/messages/"><i class="fa fa-commenting-o"></i> Messages</a>
                                         @if(auth()->user()->type_id > 3)
                                        <a href="{{ route('user.files') }}"><i class="fa fa-files-o"></i> Files
                                            and Folders Dashboard</a>@endif
                                        <a href="{{ route('user.settings') }}"><i class="fa fa-cog"></i> Settings</a>
                                        
                                        <a href="{{ route('subscription.index') }}"><i class="fa fa-credit-card"></i> Subscription plan</a>
                                        <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Log out</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @else

                        <a href="{{ route('login') }}" class="mr-2 ml-2 ">
                            Sign In
                        </a>
                        <a  href="#company-institution-modal" data-toggle="modal" class="">Register</a>

{{--                        <a href="" class="wallet-box">--}}
{{--                            <i class="fa fa-credit-card" aria-hidden="true"></i>--}}

{{--                        </a>--}}
                            @endauth
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Create search Modal -->
<!-- <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search</h5>
            </div>
            <div class="modal-body form-style">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input class="input-search" type="text" placeholder="Type any keywords here..">

                        </div>

                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input type="submit" name="" value="Search" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<style> @media screen and (max-width: 991px) {
    .login-reg {
    padding-top: 9px !important;
}
}
</style>
