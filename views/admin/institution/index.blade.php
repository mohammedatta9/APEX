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
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Institutions</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Institutions</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>

                <div class="row">
                    @foreach($mentors as $mentor)
                    <div class="col-lg-3">
                        <div class="card client-card">
                            <div class="card-body text-center">
                                @if($mentor->image != '')
                                <img src="{{asset('/storage/users/'.$mentor->image)}}" alt="user" class="rounded-circle thumb-xl">
                                    @else
                                    <img src="{{ url('/') }}/cp/assets/images/users/user-4.jpg" alt="user" class="rounded-circle thumb-xl">

                                @endif

                                    <h5 class=" client-name fw-bold">{{ $mentor->first_name." ".$mentor->last_name }}</h5>

                                <p class="text-muted text-center mb-2 fw-semibold">{{ $mentor->job_title }}</p>
                                <span class="text-muted fw-semibold me-3"><i class="la la-map-marker me-2 text-secondary"></i>{{ $mentor->email }}</span>
                                <span  class="text-muted fw-semibold"><i class="la la-phone me-2 text-secondary"></i>{{ $mentor->phone }}</span>
                                <div class="mt-2">
                                    <a href="{{ route('admin.institution.profile' , [$mentor->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ url('/') }}/coache_profile/{{ $mentor->id }}" target="_blank" class="btn btn-sm btn-de-secondary">View profile</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                   @endforeach
                </div><!--end row-->

            </div><!-- container -->



        </div>
        <!-- end page content -->
    </div>

@endsection