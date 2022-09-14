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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.requests') }}">Join
                                            requests</a></li>
                                    <li class="breadcrumb-item active">Preview</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Join Request</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
            @include('layouts.error')
            @include('layouts.success')
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
                                                    <img src="{{asset('/storage/Join_request/'.$request->personal_photo)}}"
                                                         alt="" height="110" class="rounded-circle">

                                                </div>
                                                <div class="met-profile_user-detail">
                                                    <h5 class="met-user-name">{{ $request->first_name." ".$request->middle_name." ".$request->last_name }}</h5>
                                                    <p class="mb-0 met-user-name-post">{{ $request->type }}</p>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-3 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                <li class=""><i
                                                            class="las la-phone mr-2 text-secondary font-22 align-middle"></i>
                                                    <b> phone </b> : {{ $request->Phone }}</li>
                                                <li class="mt-2"><i
                                                            class="las la-envelope text-secondary font-22 align-middle mr-2"></i>
                                                    <b> Email </b> : {{ $request->Email }}</li>
                                                <li class="mt-2"><i
                                                            class="las la-globe text-secondary font-22 align-middle mr-2"></i>
                                                    <b> Website </b> :
                                                    <a href="{{ $request->Website }}" target="_blank"
                                                       class="font-14 text-primary">{{ $request->Website }}</a>
                                                </li>
                                            </ul>

                                        </div><!--end col-->
                                        <div class="col-lg-3 ms-auto align-self-center">
                                            <ul class="list-unstyled personal-detail mb-0">
                                                <li class=""><i
                                                            class=" fas fa-flag  mr-2 text-secondary font-22 align-middle"></i>
                                                    <b> Nationality </b> : {{ $request->Nationality }}</li>
                                                <li class="mt-2"><i
                                                            class="fas fa-globe text-secondary font-22 align-middle mr-2"></i>
                                                    <b> Visa status </b>
                                                    : {{ $request->visa_status == 1 ? "Active" : 'Not Active' }}</li>
                                                <li class="mt-2"><i
                                                            class=" fas fa-calendar-alt  text-secondary font-22 align-middle mr-2"></i>
                                                    <b> visa Ex date </b> :{{ $request->visa_ex_date }}</li>
                                            </ul>

                                        </div><!--end col-->
                                        <div class="col-lg-2 align-self-center">
                                            <div class="row">
                                                <div class="col-auto text-end border-end">
                                                    <a href="{{ $request->Facebook_link }}" target="_blank"
                                                       class="btn btn-soft-primary btn-icon-circle btn-icon-circle-sm mb-2">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                    <p class="mb-0 fw-semibold">Facebook</p>

                                                </div><!--end col-->
                                                <div class="col-auto">
                                                    <a href="{{ $request->Linkedin }}" target="_blank" type="button"
                                                       class="btn btn-soft-info btn-icon-circle btn-icon-circle-sm mb-2">
                                                        <i class="fab fa-linkedin"></i>
                                                    </a>
                                                    <p class="mb-0 fw-semibold">Linkedin</p>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->
                            <div class="card-body p-0">
                                <!-- Nav tabs -->


                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Settings" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h4 class="card-title">Experiences</h4>
                                                            </div><!--end col-->
                                                        </div>  <!--end row-->
                                                    </div><!--end card-header-->
                                                    <div class="card-body">
                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Languages</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->languages }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Academic
                                                                Qualifications</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->academic_qualifications }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current
                                                                Job Title</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->current_Job_Title }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Current
                                                                Work Type</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->current_work_type }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Number
                                                                of years of relevant experience</label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->years_experience }}
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">The
                                                                Industry/Field to indulge in
                                                            </label>
                                                            <div class="col-lg-9 col-xl-8">
                                                                {{ $request->field }}
                                                            </div>
                                                        </div>
                                                        @if($request->cv_link !="")

                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">CV
                                                                    Link</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    {{ $request->cv_link }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if($request->cv_file !="")

                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">CV
                                                                    File</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    <a href="{{asset('/storage/Join_request/'.$request->personal_photo)}}"
                                                                       target="_blank">Download</a>
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if($request->portfolio_link !="")

                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">portfolio
                                                                    Link</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    {{ $request->portfolio_link }}
                                                                </div>
                                                            </div>
                                                        @endif

                                                        @if($request->portfolio_file !="")

                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">portfolio
                                                                    File</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    <a href="{{asset('/storage/Join_request/'.$request->portfolio_file)}}"
                                                                       target="_blank">Download</a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($request->video !="")

                                                            <div class="form-group mb-3 row">
                                                                <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Video</label>
                                                                <div class="col-lg-9 col-xl-8">
                                                                    <a href="{{asset('/storage/Join_request/'.$request->video)}}"
                                                                       target="_blank">Download</a>
                                                                </div>
                                                            </div>
                                                        @endif


                                                        <div class="form-group mb-3 row">
                                                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                                <form method="post" action="{{ route('admin.save_request') }}">
                                                                    @csrf
                                                                <input type="hidden" name="id" value="{{ $request->id }}">
                                                                    <button type="submit" class="btn btn-de-primary">
                                                                    Convert to users
                                                                </button>

                                                                </form>
{{--                                                                <button type="button" class="btn btn-de-danger">Cancel--}}
{{--                                                                </button>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!--end col-->


                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div> <!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
@endsection