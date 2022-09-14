<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
                    <span>
                        <img src="{{ url('/') }}/cp/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
            <span>
                        <img src="{{ url('/') }}/cp/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{ url('/') }}/cp/assets/images/logo-dark.png" alt="logo-large"
                             class="logo-lg logo-dark">
                    </span>
        </a>
    </div>
    <div class="sidebar-user-pro media border-end">
        <div class="position-relative mx-auto">
            <img src="{{ url('/') }}/cp/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-md">
            <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
        </div>
        <div class="media-body ms-2 user-detail align-self-center">
            <h5 class="font-14 m-0 fw-bold">Mr. Michael Hill </h5>
            <p class="opacity-50 mb-0">michael.hill@exemple.com</p>
        </div>
    </div>


    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.home') }}"><i
                                    class="ti ti-brand-hipchat menu-icon"></i><span>Home</span></a>
                    </li>

                    <li class="menu-label mt-0 text-primary font-12 fw-semibold">U<span>sers</span><br><span
                                class="font-10 text-secondary fw-normal">Users management</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.requests') }}">
                            <i class="ti ti-stack menu-icon"></i>
                            <span>Join Requests <span>(4)</span></span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.mentors')  }}">
<i class="fas fa-user  menu-icon"></i>
<span>Mentors </span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.coaches')  }}">
                            <i class="far fa-user menu-icon"></i>
                            <span>Coaches</span>
                        </a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.company')  }}">
                            <i class="far fa-building menu-icon"></i>
                            <span>Companies</span>
                        </a>
                    </li><!--end nav-item-->

<li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.institution')  }}">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span>Institutions</span>
                        </a>
                    </li><!--end nav-item-->

<li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.learners')  }}">
                            <i class="fab fa-grav menu-icon"></i>
                            <span>Learners</span>
                        </a>
                    </li><!--end nav-item-->
 <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.services')  }}">
                            <i class="fas fa-clipboard menu-icon"></i>
                            <span>Services</span>
                        </a>
</li>


<li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.communities')  }}">
                            <i class="fas fa-comment-alt menu-icon"></i>
                            <span>communities</span>
                        </a>
</li>
<li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.quizzes')  }}">
                            <i class="fas fa-copy menu-icon"></i>
                            <span>Quizzes</span>
                        </a>
</li>
<li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.articles')  }}">
                            <i class="fas fa-coffee menu-icon"></i>
                            <span>Articales</span>
                        </a>
</li>
<li class="nav-item">
                        <a class="nav-link" href="{{route('settings.index')}}">
                            <i class="fas fa-cog menu-icon"></i>
                            <span>Settings</span>
                        </a>
</li>

                </ul>
            </div><!--end sidebarCollapse-->
        </div>
    </div>
</div>