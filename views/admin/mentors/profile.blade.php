@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Mentors</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Mentors</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="met-profile">
                                    <div class="row">
                                        <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                            <div class="met-profile-main">
                                                <div class="met-profile-main-pic">
                                                    @if($mentor->image != '')
                                                        <img src="{{asset('/storage/users/'.$mentor->image)}}" alt=""
                                                             height="110" class="rounded-circle">
                                                    @else
                                                        <img src="{{ url('/') }}/cp/assets/images/users/user-4.jpg"
                                                             alt="" height="110" class="rounded-circle">
                                                    @endif


                                                    <span class="met-profile_main-pic-change">
                                                        <i class="fas fa-camera"></i>
                                                    </span>
                                                </div>
                                                <div class="met-profile_user-detail">
                                                    <h5 class="met-user-name">{{ $mentor->first_name." ".$mentor->last_name }}</h5>
                                                    <p class="mb-0 met-user-name-post">{{ $mentor->job_title }}</p>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                <li class=""><i
                                                            class="las la-phone mr-2 text-secondary font-22 align-middle"></i>
                                                    <b> phone </b> : {{ $mentor->phone }}</li>
                                                <li class="mt-2"><i
                                                            class="las la-envelope text-secondary font-22 align-middle mr-2"></i>
                                                    <b> Email </b> : {{ $mentor->email }}</li>
                                                <li class="mt-2"><i
                                                            class="las la-globe text-secondary font-22 align-middle mr-2"></i>
                                                    <b> Website </b> :
                                                    <a href="{{ $mentor->website }}"
                                                       class="font-14 text-primary">{{ $mentor->website }}</a>
                                                </li>
                                            </ul>

                                        </div><!--end col-->
                                        <div class="col-lg-4 align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                <li class=""><i
                                                            class="las la-wallet mr-2 text-secondary font-22 align-middle"></i>
                                                    <b> Wallet credit </b> : 0 AED
                                                </li>

                                            </ul>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Gallery" role="tab"
                                           aria-selected="false">Financial Transactions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">Settings</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-9">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body  report-card">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col">
                                                                        <p class="text-dark mb-1 fw-semibold">Total
                                                                            Services</p>
                                                                        <h3 class="my-2 font-24 fw-bold">0</h3>
                                                                        <p class="mb-0 text-truncate text-muted"><i
                                                                                    class="ti ti-bell text-warning font-18"></i>
                                                                            <span class="text-dark fw-semibold">0</span>
                                                                            this week
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light-alt rounded-circle mx-auto">
                                                                            <i class="ti ti-eye font-30 align-self-center text-muted"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!--end card-body-->
                                                        </div> <!--end card-->
                                                    </div><!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body  report-card">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col">
                                                                        <p class="text-dark mb-1 fw-semibold">
                                                                            Earings</p>
                                                                        <h3 class="my-2 font-24 fw-bold">0 AED</h3>
                                                                        <p class="mb-0 text-truncate text-muted"><i
                                                                                    class="ti ti-thumb-up text-success font-18"></i>
                                                                            <span class="text-dark fw-semibold">0 AED</span>
                                                                            this week
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-auto align-self-center">
                                                                        <div class="d-flex justify-content-center align-items-center thumb-xl bg-light-alt rounded-circle mx-auto">
                                                                            <i class="ti ti-brand-hipchat font-30 align-self-center text-muted"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!--end card-body-->
                                                        </div> <!--end card-->
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                                <div class="card">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>Type</th>
                                                                <th>Name</th>
                                                                <th>Date from</th>
                                                                <th>Date to</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($services as $service)
                                                                <tr>
                                                                    <td>{{ $service->name }}</td>
                                                                    <td>{{ $service->title }}</td>
                                                                    <td>{{ $service->date_from }}</td>
                                                                    <td>{{ $service->date_to }}</td>
                                                                    <td>
                                                                        <span class="badge badge-soft-success">Active</span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#"><i
                                                                                    class="las la-pen text-secondary font-16"></i></a>
                                                                        <a href="#"><i
                                                                                    class="las la-trash-alt text-secondary font-16"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table><!--end /table-->
                                                    </div>
                                                </div>

                                            </div><!--end col-->
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title">Latest Posts</h4>
                                                            </div><!--end col-->

                                                        </div>  <!--end row-->
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        {{--                                                        <div class="blog-card">--}}
                                                        {{--                                                            <img src="assets/images/small/img-1.jpg" alt="" class="img-fluid rounded">--}}
                                                        {{--                                                            <span class="badge badge-purple px-3 py-2 bg-soft-primary fw-semibold mt-3">Photography</span>--}}
                                                        {{--                                                            <h4 class="my-3 font-15">--}}
                                                        {{--                                                                <a href="" class="">There are many variations of passages of Lorem</a>--}}
                                                        {{--                                                            </h4>--}}
                                                        {{--                                                            <p class="text-muted">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Cum sociis natoque penatibus et magnis.</p>--}}
                                                        {{--                                                            <hr class="hr-dashed">--}}
                                                        {{--                                                            <div class="d-flex justify-content-between">--}}
                                                        {{--                                                                <div class="meta-box">--}}
                                                        {{--                                                                    <div class="media">--}}
                                                        {{--                                                                        <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle me-2">--}}
                                                        {{--                                                                        <div class="media-body align-self-center text-truncate">--}}
                                                        {{--                                                                            <h6 class="m-0 text-dark">Donald Gardner</h6>--}}
                                                        {{--                                                                            <ul class="p-0 list-inline mb-0">--}}
                                                        {{--                                                                                <li class="list-inline-item">26 mars 2020</li>--}}
                                                        {{--                                                                                <li class="list-inline-item">by <a href="">admin</a></li>--}}
                                                        {{--                                                                            </ul>--}}
                                                        {{--                                                                        </div><!--end media-body-->--}}
                                                        {{--                                                                    </div>--}}
                                                        {{--                                                                </div><!--end meta-box-->--}}
                                                        {{--                                                                <div class="align-self-center">--}}
                                                        {{--                                                                    <a href="#" class="text-dark">Read more <i class="fas fa-long-arrow-alt-right"></i></a>--}}
                                                        {{--                                                                </div>--}}
                                                        {{--                                                            </div>--}}
                                                        {{--                                                        </div><!--end blog-card-->--}}
                                                    </div><!--end card-body-->
                                                </div><!--end card-->

                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title">Social Profile</h4>
                                                            </div><!--end col-->
                                                        </div>  <!--end row-->
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <div class="button-list btn-social-icon">
                                                            <a href="{{ $mentor->facebook }}" target="_blank"
                                                               class="btn btn-soft-primary btn-icon-circle">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>

                                                            <a href="{{ $mentor->twitter }}" target="_blank"
                                                               class="btn btn-soft-info btn-icon-circle ms-2">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>

                                                            <a href="{{ $mentor->linkedin }}" target="_blank"
                                                               class="btn btn-soft-info btn-icon-circle  ms-2">
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </a>

                                                        </div>
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                    <div class="tab-pane p-3" id="Gallery" role="tabpanel">
                                        <div class="row">

                                        </div><!--end row-->

                                    </div>
                                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title">Personal Information</h4>
                                                            </div><!--end col-->
                                                        </div>  <!--end row-->
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <form name="" method="post" action="{{ route('admin.mentor.save',[$mentor->id]) }}">
                                                            @csrf
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">First
                                                                Name</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->first_name }}" name="first_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Last
                                                                Name</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->last_name }}" name="last_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Date
                                                                of Birth</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->dob }}" name="dob">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Gender</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <select name="gender" class="form-control">
                                                                    <option value="male" @if($mentor->gender =='male') selected @endif>Male</option>
                                                                    <option value="female" @if($mentor->gender =='female') selected @endif>Female</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Industry</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="Dodson">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Bio</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->bio }}" name="bio">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Address</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->address }}" name="address">
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Contact
                                                                Phone</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="las la-phone"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $mentor->phone }}" name="phone" placeholder="Phone"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email
                                                                Address</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="las la-at"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $mentor->email }}" name="email"
                                                                           placeholder="Email"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Website
                                                                Link</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="la la-globe"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $mentor->website }}" name="website"
                                                                           placeholder="Email"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Facebook</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="la la-facebook"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $mentor->facebook }}" name="facebook"
                                                                           placeholder="Email"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Twitter</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="la la-twitter"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $mentor->twitter }}" name="twitter"
                                                                           placeholder="Email"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Linkedin</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-text"><i
                                                                                class="la la-linkedin"></i></span>
                                                                    <input type="text" class="form-control" value="{{ $mentor->linkedin }}" name="linkedin"
                                                                           placeholder="Email"
                                                                           aria-describedby="basic-addon1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Country</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="text" value="{{ $mentor->country }}" name="country">
                                                            </div>
                                                        </div>
                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">City</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    <input class="form-control" type="text" value="{{ $mentor->city }}" name="city">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Status</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    <input class="form-check-input" type="checkbox" value="1"
                                                                           id="Email_Notifications" name="status" @if($mentor->status == 1)checked @endif>
                                                                    <label class="form-check-label" for="Email_Notifications">
                                                                        active
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group mb-3 row">
                                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                                <button type="submit" class="btn btn-de-primary">
                                                                    Submit
                                                                </button>
                                                                <button type="button" class="btn btn-de-danger">Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div> <!--end col-->
                                            <div class="col-lg-6 col-xl-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Change Password</h4>
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">New
                                                                Password</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="password"
                                                                       placeholder="New Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Confirm
                                                                Password</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                <input class="form-control" type="password"
                                                                       placeholder="Re-Password">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                                <button type="submit" class="btn btn-de-primary">Change
                                                                    Password
                                                                </button>
                                                                <button type="button" class="btn btn-de-danger">Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Other Settings</h4>
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <h3>Privacy Settings</h3>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="Email_Notifications" checked>
                                                            <label class="form-check-label" for="Email_Notifications">
                                                                Show my profile on search engines
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Show my phone number
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Show my email address
                                                            </label>
                                                        </div>


                                                        <h3>Payments & Wallet</h3>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Use the same credit card and bank account information
                                                                for further payments automatically
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Stop TELCCA from using my current credit card
                                                                information
                                                            </label>
                                                        </div>
                                                        <h3>Notification Settings</h3>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive promotions & recommendations on your email
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive announcements on your email
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive SMS notifications on changes in sessions plans,
                                                                dates, times, updates from your mentors & coaches
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive email notifications on changes in sessions
                                                                plans, dates, times, updates from your mentors & coaches
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive newsletters & articles on your email
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                   id="API_Access">
                                                            <label class="form-check-label" for="API_Access">
                                                                Receive invoices & payment transactions summary on your emails
                                                            </label>
                                                        </div>


                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div> <!-- end col -->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div> <!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->


        </div>
        <!-- end page content -->
    </div>

@endsection