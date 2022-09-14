@extends('layouts.main') @section('content')

<style type="text/css">
    header {
        background-color: #0d1b26;
        color: #fff;
        padding: 10px 0;
    }

    .hide-element {
        display: none;
    }

    .notificaton-icon,
    .avater {
        display: inline-block;
    }

    body {
        background-color: #fff;
    }
    .move-right {
        padding-left: 0;
    }
    .upload-img-user {
        border: solid 1px #cfcfcfdd;
        position: absolute;
        bottom: 24px;
        right: 0;
        color: #383636;
        padding: 7px;
        border-radius: 31px;
        background-color: #cfcfcfdd;
    }
    .user-snap {
        position: relative;
    }
    .cover-photo-change {
        position: absolute;
        bottom: 26px;
        right: 28px;
        display: flex;
        background-color: #ddd;
        padding: 8px 24px;
        border-radius: 7px;
        z-index: 2;
    }
    .icon-cover-photo {
        color: #383636;
        margin-left: 10px;
    }
    a.cover-photo-change p {
        font-size: 16px;
        color: #383636;
        font-weight: 800;
    }

    .uploader #start i.fa {
        font-size: 50px;
        margin-bottom: 1rem;
        transition: all 0.2s ease-in-out;
    }
    uploader #start {
        float: left;
        clear: both;
        width: 100%;
    }
    .uploader {
        display: block;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
        text-align: center;
    }
    .uploader input[type="file"] {
        display: none;
    }
    .uploader #response.hidden {
        display: none;
    }
    .uploader div {
        color: #5f6982;
    }
    .uploader .btn {
        display: inline-block;
        margin: 0.5rem 0.5rem 1rem 0.5rem;
        clear: both;
        font-family: inherit;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        text-transform: initial;
        border: none;
        border-top-color: currentcolor;
        border-right-color: currentcolor;
        border-bottom-color: currentcolor;
        border-left-color: currentcolor;
        border-radius: 0.2rem;
        outline: none;
        padding: 0 1rem;
        height: 36px;
        line-height: 36px;
        color: #fff;
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        background: #454cad;
        border-color: #454cad;
        cursor: pointer;
    }
    .uploader #file-image {
        display: inline;
        margin: 0 auto 0.5rem auto;
        width: auto;
        height: auto;
        max-width: 180px;
    }
    .hidden {
        display: none;
    }
    .uploader #file-image.hidden {
        display: none;
    }

    .modal-dialog {
        max-width: 650px;
    }
</style>

<!---------------- user banner section --------------------->

<div class="user-banner-section"  style=" height:250px">
    @if($user->cover != '')
    <img src="{{ asset('/storage/users/'.$user->cover) }}" id="cover" alt="banner"  style=" height:250px" />
    @else
    <img src="{{ url('/') }}/site/images/profile-3.png" id="cover" alt="banner"  style=" height:250px" />
    @endif
    <!-- 	<a href="session-plan.php" class="user-profile-setting">Settings <img src="{{ url('/') }}/site/images/setting-icon.png" alt="setting"> </a> -->
    <a href="#upload-a-cover" data-toggle="modal" class="cover-photo-change">
        <p>Change cover photo</p>
        <i class="fa fa-camera icon-cover-photo" aria-hidden="true"></i>
    </a>
</div>

<div class="user-profle-main text-center move-up">
    <div class="user-snap">
        @if($user->image != '')
        <img src="{{ asset('/storage/users/'.$user->image) }}" id="photo" alt="shadow" />
        @else
        <img src="{{ url('/') }}/site/images/avatar.png" id="photo" alt="shadow" />
        @endif
        <a href="#upload-a-photo" data-toggle="modal"> <i class="fa fa-camera upload-img-user" aria-hidden="true"></i> </a>
    </div>
</div>

<section class="bg-white pt-0 user-profle-main move-right">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-3 user-profile-sidebar">
                <div class="alert alert-success" id="success_msg" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    saved!
                </div>
                <!----------------سعر الساعه-------------------------------------->
                <div class="row">
                    <div class="col-sm-10"  id="currency_show">
                        <h4 class="green-color">{{$user->hourly_price}} {{$user->currency}} / {{$user->rate_duration}} min</h4>
                    </div>

                    <div class="col-sm-1">
                        <a href="#edit-mints1" data-toggle="modal" class="ml-2"> <i class="fa fa-pencil" style="font-size: 19px;"></i></a>
                    </div>
                </div>
                <div class="schedule-meeting">
                    <!-- <a href="#sessions-request" data-toggle="modal" >Schedule a Session</a> -->
                    <!-- <a href="#" class="mt-2">Send A MESSAGE</a> -->
                    <a href="#webinar-modal" data-toggle="modal" class="mt-2">Create Webinar</a>
                    <a href="#session-modal" data-toggle="modal" class="mt-2">Create SESSION</a>
                    <a href="#quiz-modal" data-toggle="modal" class="mt-2">Create Quiz / Exercise</a>
                    <a href="{{ route('calender')}}" class="mt-2">My Calendar</a>
                    <a href="#sessions-requests" data-toggle="modal" class="mt-2">Sessions Requests</a>
                    <a href="#sessions-accepted" data-toggle="modal" class="mt-2">Sessions accepted</a>
                    <a href="{{asset('en/messages')}}" class="mt-2">Messages</a>
                    <a href="{{ route('user.settings')}}" class="mt-2">Settings</a>
                </div>
                <!-- <div class="setup-account">
				   <div class="my-metors">
				   	<h6 class="clearfix">Similar Mentors <span>...</span></h6>
				   	<div class="my-mentor-pics mt-4">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   	<img src="{{ url('/') }}/site/images/my-mentor.png" alt="Mentor">
					   </div>
				   </div>
				</div> -->
            </div>

            <div class="col-sm-9 col-lg-9">
                <div class="row text-center">
                    <div class="col-sm-6 col-lg-8 order-one">
                        <h4 class="blue-color mt-3 mb-3 pt-2" style="margin-top: 0px !important;">{{ $user->first_name." ".$user->last_name }}</h4>
                        <div class="user-rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                        </div>
                        <h6>{{$user->reviews->count()}} Reviews</h6>

                        <div>
                            <p id="job_title_show" class="font-weight-bold mt-3 text-capitalize">{{ $user->job_title }}</p>

                            <a href="#job_title-modal" data-toggle="modal"><i class="fa fa-pencil text-dark"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-4 order-three">
                        <ul class="share-post share-profile text-left">
                            @if($user->linkedin)
                            <a href="{{$user->linkedin}}"><i class="fa fa-linkedin"></i></a>
                            @endif @if($user->facebook)
                            <a href="{{$user->facebook}}"><i class="fa fa-facebook"></i></a>
                            @endif @if($user->instagram)
                            <a href="{{$user->instagram}}"><i class="fa fa-instagram"></i></a>
                            @endif @if($user->youtube)
                            <a href="{{$user->youtube}}"><i class="fa fa-youtube"></i></a>
                            @endif
                        </ul>
                        <ul class="user-information text-left">
                            @if($user->email)
                            <a href="{{ $user->email }}"><i class="fa fa-envelope"></i> {{ $user->email }}</a>
                            @endif @if($user->phone)
                            <a href="#fa-phone"><i class="fa fa-phone"></i> {{ $user->phone }} </a>
                            @endif @if($user->language)
                            <a href="#x"><i class="fa fa-language"></i> {{ $user->language }}</a>
                            @endif @if($user->address)
                            <a href="#x"><i class="fa fa-map-marker"></i> {{ $user->address }}</a>
                            @endif
                             @if($user->timezone) 
                            <a ><i class="fa fa-clock-o"></i> {{ $user->timezone }}</a>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="newly-added mt-3">
                    @if( $user->video )
                    <div class="newly-added text-center p-0 border-0 mt-4 position-relative">
                        <video id="user_video" controls width="700">
                            <source src="{{asset('/storage/users/'.$user->video)}}" type="video/mp4" />
                        </video>
                    </div>
                    <a href="#edit-video-user" data-toggle="modal" id="add_video" style="display: none;">
                        <div class="text-center">
                            <img src="{{ url('/') }}/site/images/add-listing.png" alt="listing" />
                            <p>Add video</p>
                        </div>
                    </a>
                    <div class="text-center mb-2 pb-2 d_video">
                        <a href="#edit-video-user" data-toggle="modal" class="mr-2"><i class="fa fa-pencil text-left"></i></a>
                        <a href="#del-video-user" data-toggle="modal"><i class="fa fa-trash text-left"></i></a>
                    </div>
                    @else
                    <div class="newly-added text-center p-0 border-0 mt-4 position-relative a_video" style="display: none;">
                        <video id="user_video" controls width="700">
                            <source src="{{asset('/storage/users/'.$user->video)}}" type="video/mp4" />
                        </video>
                    </div>
                    <a href="#edit-video-user" data-toggle="modal" id="add_video">
                        <div class="text-center">
                            <img src="{{ url('/') }}/site/images/add-listing.png" alt="listing" />
                            <p>Add video</p>
                        </div>
                    </a>
                    <div class="text-center mb-2 pb-2 a_video" style="display: none;">
                        <a href="#edit-video-user" data-toggle="modal" class="mr-2"><i class="fa fa-pencil text-left"></i></a>
                        <a href="#del-video-user" data-toggle="modal"><i class="fa fa-trash text-left"></i></a>
                    </div>
                    @endif
                </div>

                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">bio</h6>
                        <a href="#bio-modal" data-toggle="modal"><i class="fa fa-pencil text-dark"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <p id="bio_show">{{ $user->bio }}</p>
                        </div>
                    </div>
                </div>

                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">About</h6>
                        <a href="#about-modal" data-toggle="modal"><i class="fa fa-pencil text-dark"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <p id="about_show">{{ $user->about }}</p>
                        </div>
                    </div>
                </div>
                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">Qualifications</h6>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12" id="table">
                            @if($qualification) @foreach ($qualification as $qualification )
                            <div class="newly-added mt-3 Rqua{{$qualification->id}}">
                                <a href="#" class="delete_qua font-12" qua_id="{{$qualification->id}}"><i class="fa fa-trash text-left"></i></a>
                                <h6 class="mb-2 font-12">{{$qualification->institute_name}} / {{$qualification->degree}} / {{$qualification->year}}</h6>
                            </div>
                            @endforeach @endif
                        </div>

                        <div class="col-lg-12 text-center mt-4">
                            <a href="#qualification-modal" data-toggle="modal" class="btn-style" style="max-width: fit-content;">Add Qualification</a>
                        </div>
                    </div>
                </div>
                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">Skills</h6>
                    </div>
                    <div>
                        <div class="row" id="add_skill">
                            @foreach ($user_skills as $skill )
                            <div class="R{{$skill->id}} col skills-col">
                                {{$skill->skill}}
                                <a href="" class="delete_skill font-12" skill_id="{{$skill->id}}">x</a>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-lg-12 text-center mt-4">
                            <a href="#skills-modal" data-toggle="modal" class="btn-style" style="max-width: fit-content;">Add Skill</a>
                        </div>
                    </div>
                </div>
                <div class="newly-added text-center mt-3">
                    <h6 class="text-left mb-4 pb-2">My Statistics</h6>
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$session}}</h5>
                            <h6>Sessions</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$sp_session_accept}}</h5>
                            <h6>Mentees</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$community}}</h5>
                            <h6>Communities</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$user->community_posts->count()}}</h5>
                            <h6>Discussions</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$quizze}}</h5>
                            <h6>Quizzes & Exercises</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$user->articles->count()}}</h5>
                            <h6>Articles</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$webinar}}</h5>
                            <h6>Webinars</h6>
                        </div>
                    </div>
                </div>
                <div class="newly-added mt-3 clearfix comment-row">
                    <h6 class="text-left mb-4 pb-2">Reviews</h6>
                   @foreach ($reviews as $r) 
                    <hr />
                    <div class="row Rev{{$r->id}}">
                        <div class="col-2 text-center">
                            @if($r->reviewer->image)
                            <img src="{{ url('/') }}/storage/users/{{$r->reviewer->image}}" alt="Comments" class="user_image comment-person" />
                            @else
                             <img src="{{ url('/') }}/site/images/avatar.png" alt="Comments" class="comment-person" />
                            @endif
                            </a>
                        </div>
                        <div class="col-10 my-auto pl-0">
                            <div class="row">
                                <div class="col col-lg-6">
                                    <h6>
                                    {{$r->reviewer->first_name}} {{$r->reviewer->last_name}}
                                         
                                    </h6>
                                    <h6 class="published-date"> {{$r->created_at->format('y/m/d')}}</h6>
                                </div>
                                
                                <div class="col col-lg-6 text-right mobile-text-center">
                                    <a href="" class="delete_review reply-client"  review_id="{{$r->id}}">delete</a>
                                </div>
                            </div>
                            <div class="comment-text mt-2">
                                 {{$r->body}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div id="success_message_location"></div>
                     
                </div>
                 <div class="single-post-container post-comment">
                <form  name="location" id="location" enctype="multipart/form-data"   action="">
                  <label>REPLY</label>
                  @csrf

                  <input type="text" name="user_id" style="display:none" value="{{$user->id}}">
                  <textarea class="col-lg-12" rows="5" name="body" placeholder="Your Reply" id="review_pc" maxlength="360"></textarea>
                  <div class="text-center mt-3">
                  <button id="location_btn" class="btn" >Send</button>
                  </div>
               </form>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal-img-user -->
<div class="modal fade" id="edit-img-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="user_img_Form" action="">
                    @csrf
                    <div class="upload-area text-center">
                        <img src="{{ url('/') }}/site/images/cloud.png" alt="cloud" />
                        <h6 class="mt-2 mb-2">Drag and drop image here</h6>
                        or
                        <input type="file" name="image" id="image" class="upload-doc d-block m-auto" />
                        <small id="imageuser_img_error" class="form-text text-danger"></small>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="store_user_img" type="button" name="" value="Save" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal-img-user -->
<div class="modal fade" id="edit-imgb-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="user_imgb_Form" action="">
                    @csrf
                    <div class="upload-area text-center">
                        <img src="{{ url('/') }}/site/images/cloud.png" alt="cloud" />
                        <h6 class="mt-2 mb-2">Drag and drop image here</h6>
                        or
                        <input type="file" name="imageb" id="imageb" class="upload-doc d-block m-auto" />
                        <small id="imagebuser_imgb_error" class="form-text text-danger"></small>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="store_user_imgb" type="button" name="" value="Save" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal-edit-video-user -->
<div class="modal fade" id="edit-video-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="user_video_Form" action="">
                    @csrf
                    <div class="upload-area text-center">
                        
                        <input type="file" name="video" id="video"   />
                        <small id="videouser_video_error" class="form-text text-danger"></small>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="store_user_video" type="button" name="" value="Save" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal-delet-video-user -->
<div class="modal fade" id="del-video-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">delete video</h5>
            </div>
            <div class="modal-body form-style">
                <form action="{{ route('user_video.del') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="video" style="display: none;" />

                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input type="submit" name="" value="Delete" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create Webinar Modal -->
<div class="modal fade" id="webinar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create A Webinar</h5>
            </div>
            <div class="modal-body form-style">
                <form id="webinarForm" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" value="webinar" style="display: none;" />
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" class="w-100 input-shadow" maxlength="60" />
                            <small id="title7_error" class="form-text text-danger"></small>
                            <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Date</label>
                            <input type="date" name="date_from" class="w-100" min="<?php echo date("Y-m-d"); ?>" required/>
                            <small id="date_from7_error" class="form-text text-danger"></small>

                        </div>
                        <div class="col-sm-6 col-lg-6" id="datetimepicker3">
                            <label class="font-weight-bold">Time</label>
                            <input type="time" name="time_to" class="w-100" required/>
                            <small id="time_to7_error" class="form-text text-danger"></small>
                        </div>
                        <div class="col-sm-6 col-lg-6 mb-0">
                            <label class="font-weight-bold">About</label>
                            <input type="text" name="about" class="w-100" maxlength="160" />
                            <small id="about7_error" class="form-text text-danger"></small>
                        </div>
                        <div class="col-sm-6 col-lg-6 mb-0 collaborate">
                            <label class="font-weight-bold">Add an Image</label>
                             
                                <input type="file" name="cover"  />
                                <small id="cover7_error" class="form-text text-danger"></small>
                            
                        </div>

                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="savewebinar" type="button" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- session-modal Modal -->
<div class="modal fade" id="session-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create session</h5>
            </div>
            <div class="modal-body form-style">
                <form id="sessionForm" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" class="w-100 input-shadow" maxlength="60"/>
                            <small id="title_error" class="form-text text-danger"></small>
                            <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                        <div class="col-sm-8 col-lg-8">
                            <div class="row m-0 mb-3">
                                <label class="font-weight-bold col-lg-12">Date & Time</label>
                                <div id="myRepeatingFields">
                                    <div class="entry input-group col-xs-3">
                                        <table class="table meeting-table class-table">
                                            <tr>
                                                <td><input type="date" name="date[]" class="w-100" min="<?php echo date("Y-m-d"); ?>" /></td>
                                                <td><input type="time" name="time_from[]" class="w-100" /></td>
                                                <td><input type="time" name="time_to[]" class="w-100" /></td>
                                                <td>
                                                    <button type="button" class="btn btn-lg btn-add">
                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        <span class="input-group-btn"> </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="savesession" type="button" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Create quiz Modal -->
<div class="modal fade" id="quiz-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Quiz / Exercise</h5>
            </div>
            <div class="modal-body form-style">
                <form id="quizform" action="" enctype="multipart/form-data">
                    @csrf 

                    <div class="row">
                        <div class="col-sm-6 col-lg-6">

                            <label class="font-weight-bold">Quiz / Exercise</label>
                            <select class="w-100 " name="type" required>
                            <option disabled selected value="2" >Exercise</option>
                            <option value="1">Quiz</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" class="w-100 input-shadow" required maxlength="60" />
                            <small id="title_qerror" class="form-text text-danger"></small>
                            <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Image</label><br />
                            <input type="file" name="image" />
                            <small id="image_qerror" class="form-text text-danger"></small>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                        
                                <label class="font-weight-bold">Category</label>
                                <select class="w-100 " name="category" id="industry" required>
                                <option disabled selected  >Choose Category</option>
                                @foreach ($industry as $industry)
                                <option value="{{$industry->id }}">{{ $industry->name }}</option>
                                @endforeach
                               
                                </select>
                                <small id="category_qerror" class="form-text text-danger"></small>
                                

                                <label class="mt-3 font-weight-bold ">Skills</label>
                                <div id="myRepeatingFieldsk">
                                    <div class="entry input-group col-xs-3">
                                        <table class="table meeting-table class-table">
                                            <tr>
                                                <td><select class="w-100 " name="skill[]" id="industry" required>
                                                <option disabled selected>Choose Skill</option>
                                                @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                                </select></td>
                                                <td>
                                                    <button type="button" class="btn btn-lg btn-addsk">
                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        <span class="input-group-btn"> </span>
                                    </div>
                                </div>
                             
                        </div>
                        <div class="col-sm-6 col-lg-6 p-0">
                      
                           
                    
                            <div class="col-lg-12 mb-0">
                                <label class="font-weight-bold">Description </label>
                                <textarea class="w-100" rows="6" name="description" maxlength="360"></textarea>
                                <small id="description_qerror" class="form-text text-danger"></small>

                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="savequiz" type="button" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sessions-requests" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
            </div>
            <div class="modal-body form-style">
                <div class="accordion" id="accordion2">
                    @foreach($applications as $a)
                    <div class="accordion-group Rapplication{{$a->id}}">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold mb-3 d-block" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$loop->iteration}}">
                            Sessions Request {{$loop->iteration}}
                            </a>
                        </div>
                        <div id="collapse{{$loop->iteration}}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">Sessions title</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        Type
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">{{$a->title}}</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                    {{$a->type}}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        @if($a->learner)
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <a href="{{ route('learner.profile', $a->learner->slug)}}">{{$a->learner->first_name}} {{$a->learner->last_name}}</a>@endif
                                    </div>
                                </div>
                                <div class="row mt-2">
                                @if($a->session_date)
                                    <div class="col-sm-4 col-lg-4">
                                        <h6 class="green-color font-13">DATE</h6>
                                        
                                        <h6 class="blue-color mt-2 font-13">{{$a->session_date}}</h6>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h6 class="green-color font-13">Time</h6>
                                        <h6 class="blue-color mt-2 font-13">{{$a->start_time }} - {{$a->end_time }}</h6>
                                    </div>
                                    @endif
                                </div>
                                <input class="stat" type="radio" st="{{$a->id}}" name="status{{$loop->iteration}}" value="1" @if($a->status == 1) checked="checked" @endif>
                                <label for="Accepted">
                                    <h6>Accept Request</h6>
                                </label>
                                <input class="stat" type="radio" st="{{$a->id}}" name="status{{$loop->iteration}}" value="2"   @if($a->status == 2 ) checked="checked" @endif>
                                <label for="Refused">
                                    <h6>Refuse Request</h6>
                                </label>

                                <p>
                                    * By clicking “Accept , this session will be added and scheduled to Sessions accepted in setting. By clicking “Refuse”, this Sessions request will be cancelled and removed from your “Sessions Requests”.
                                </p>
                            </div>
                        </div>
                    </div>@endforeach
                </div>
            </div>
        </div>
    </div>
</div>

 
<!-- Modal -->
<div class="modal fade" id="sessions-accepted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
            </div>
            <div class="modal-body form-style">
                <div class="accordion" id="accordion2">
                    @foreach($sp_sessionaa as $s)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold mb-3 d-block" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$loop->iteration}}">
                                Session Request {{$loop->iteration}}
                            </a>
                        </div>
                        <div id="collapse{{$loop->iteration}}" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">{{$s->title}}</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        @foreach($s->sp_session_goal as $g)
                                        <a href="#">{{$g->goal}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        @if($s->la)
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <a href="{{ route('learner.profile', $s->la->slug)}}">{{$s->la->first_name}} {{$s->la->last_name}}</a>@endif
                                    </div>
                                </div>
                                <div class="row mt-2"> @if($s->session_time)
                                    <div class="col-sm-4 col-lg-4">
                                        <h6 class="green-color font-13">DATE</h6>
                                       
                                        <h6 class="blue-color mt-2 font-13">{{$s->session_time->date}}</h6>
                                    </div>
                                    <div class="col-sm-4 col-lg-4">
                                        <h6 class="green-color font-13">Time</h6>
                                        <h6 class="blue-color mt-2 font-13">{{$s->session_time->time_from}} - {{$s->session_time->time_to}}</h6>
                                    </div>
                                    @endif
                                </div>
                                <form action="" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="webinar" style="display: none;" />
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6">
                                            <label class="font-weight-bold">Date</label>
                                            <input type="date" name="date_from" class="w-100" min="<?php echo date("Y-m-d"); ?>" required />
                                        </div>
                                        <div class="col-sm-6 col-lg-6" id="datetimepicker3">
                                            <label class="font-weight-bold">Time</label>
                                            <input type="time" name="time_to" class="w-100" required />
                                        </div>

                                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                                            <input type="" name="" value="Save" class="bg-white" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.error')

<!-- Modal hourly_price -->
<div class="modal fade" id="edit-mints1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 360px;">
        <div class="modal-content">
            <div class="modal-body form-style">
                <form id="Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Enter Your Hourly price </label>
                            <input type="text" maxlength="10" name="hourly_price" id="hourly_price" class="w-100 input-shadow" style="font-size: 13px;" value="{{$user->hourly_price}}" />
                            <small id="hourly_price_error" class="form-text text-danger"></small>
                        </div>
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Per minutes</label>
                            <select name="rate_duration" id="rate_duration">
                                <option value="60">60 minute</option>
                                <option value="45">45 minute</option>
                                <option value="30">30 minute</option>
                                <option value="15">15 minute</option>
                                <option value="5">5 minutes</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Enter currency</label>
                            <select name="currency" id="currency">
                                <option value="AED">AED</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="aa" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
<!-- Modal job title-->

<div class="modal fade" id="job_title-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job title</h5>
            </div>
            <div class="modal-body form-style">
                <form id="job_title_Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="job_title" id="job_title" class="w-100 input-shadow" style="font-size: 13px;" value="{{$user->job_title}}" maxlength="40" />
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="storejob_title" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal About -->

<div class="modal fade" id="about-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About</h5>
            </div>
            <div class="modal-body form-style">
                <form id="about_Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea rows="4" name="about" id="about" class="w-100 input-shadow p-3" value="" maxlength="500">{{$user->about}}</textarea>

                            <!--<input type="text" name="about" id="about" class="w-100 input-shadow " style="font-size: 13px;" value="{{$user->about}}">-->
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="storeabout" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal bio -->

<div class="modal fade" id="bio-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bio</h5>
            </div>
            <div class="modal-body form-style">
                <form id="bio_Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea rows="4" name="bio" id="bio" class="w-100 input-shadow p-3" maxlength="360">{{$user->bio}}</textarea>
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="storebio" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal qualification qualification qualification-->
<div class="modal fade" id="qualification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Qualifications</h5>
            </div>
            <div class="modal-body form-style">
                <form id="qualification_Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Institute_name </label>
                            <input type="text" name="institute_name" id="institute_name" class="w-100 input-shadow" style="font-size: 13px;" />
                            <label class="font-weight-bold">Degree</label>
                            <input type="text" name="degree" id="degree" class="w-100 input-shadow" style="font-size: 13px;" maxlength="60"/>

                            <label class="font-weight-bold">Graduation Year </label><br />

                            <select name="year" id="year">
                                <option selected></option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>

                            <!--<input type="text" name="about" id="about" class="w-100 input-shadow " style="font-size: 13px;" value="{{$user->about}}">-->
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="storequalification" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal skills skillsskills -->
<div class="modal fade" id="skills-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Skills</h5>
            </div>
            <div class="modal-body form-style">
                <form action="" id="skill_form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" maxlength="50" name="skill" id="skill" class="w-100 input-shadow" style="font-size: 13px;" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="storskill" type="button" name="" value="Save" class="bg-white" data-dismiss="modal" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload-a-cover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="file-upload-form" class="uploader" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                    <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden" />
                        <div id="start">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Select a file or drag here</div>
                            <div id="notimage" class="hidden" style="display: none;">Please select an image</div>
                            <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                        </div>
                        <div id="response" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress" value="0"> <span>0</span>% </progress>
                        </div>
                    </label>

                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="store_cover" type="button" name="" value="Save" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <div class="p-4">
                    <div class="flex items-start">
                                                    <div class="inline-flex items-center bg-green-600 p-2 text-white text-sm rounded-full flex-shrink-0">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="check w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                                                                                                                        <div class="ml-4 w-0 flex-1">
                            <p class="text-base leading-5 font-medium capitalize  text-green-600    ">
                                success
                            </p>
                            <p class="mt-1 text-sm leading-5  text-gray-500 ">
                                Signed in
                            </p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="show = false;" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div> -->

<!--                 
                <div class="notify fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end">
        <div x-data="{ show:  true  }" x-show="show" x-description="Notification panel, show/hide based on alert state." x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="max-w-sm w-full  bg-white  shadow-lg rounded-lg pointer-events-auto border-l-4  border-green-600    ">
            <div class="relative rounded-lg shadow-xs overflow-hidden">
                <div class="p-4">
                    <div class="flex items-start">
                                                    <div class="inline-flex items-center bg-green-600 p-2 text-white text-sm rounded-full flex-shrink-0">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="check w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                                                                                                                        <div class="ml-4 w-0 flex-1">
                            <p class="text-base leading-5 font-medium capitalize  text-green-600    ">
                                success
                            </p>
                            <p class="mt-1 text-sm leading-5  text-gray-500 ">
                                Signed in
                            </p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="show = false;" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   -->


<!-- Modal -->
<div class="modal fade" id="upload-a-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="file-upload-photo" class="uploader" method="post" enctype="multipart/form-data">
                    <input id="file-upload2" type="file" name="fileUpload" accept="image/*" />
                    @csrf
                    <label for="file-upload2" id="file-drag2">
                        <img id="file-image2" src="#" alt="Preview" class="hidden" />
                        <div id="start2">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <div>Select a file or drag here</div>
                            <div id="notimage2" class="hidden" style="display: none;">Please select an image</div>
                            <span id="file-upload-btn2" class="btn btn-primary">Select a file</span>
                        </div>
                        <div id="response2" class="hidden">
                            <div id="messages"></div>
                            <progress class="progress" id="file-progress2" value="0"> <span>0</span>% </progress>
                        </div>
                    </label>

                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="store_photo" type="button" name="" value="Save" class="bg-white" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    function ekUpload() {
        function Init() {
            console.log("Upload Initialised");

            var fileSelect = document.getElementById("file-upload"),
                fileDrag = document.getElementById("file-drag"),
                submitButton = document.getElementById("submit-button");

            fileSelect.addEventListener("change", fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener("dragover", fileDragHover, false);
                fileDrag.addEventListener("dragleave", fileDragHover, false);
                fileDrag.addEventListener("drop", fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById("file-drag");

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = e.type === "dragover" ? "hover" : "modal-body file-upload";
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; (f = files[i]); i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById("messages");
            m.innerHTML = msg;
        }

        function parseFile(file) {
            //console.log(file.name);
            // output(
            //   '<strong>' + encodeURI(file.name) + '</strong>'
            // );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = /\.(?=gif|jpg|png|jpeg)/gi.test(imageName);
            if (isGood) {
                document.getElementById("start").classList.add("hidden");
                document.getElementById("response").classList.remove("hidden");
                document.getElementById("notimage").classList.add("hidden");
                // Thumbnail Preview
                document.getElementById("file-image").classList.remove("hidden");
                document.getElementById("file-image").src = URL.createObjectURL(file);
            } else {
                document.getElementById("file-image").classList.add("hidden");
                document.getElementById("notimage").classList.remove("hidden");
                document.getElementById("start").classList.remove("hidden");
                document.getElementById("response").classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById("file-progress");

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById("file-progress");

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {
            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById("class-roster-file"),
                pBar = document.getElementById("file-progress"),
                fileSizeLimit = 3024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 4024 * 4024) {
                    // Progress bar
                    pBar.style.display = "inline";
                    xhr.upload.addEventListener("loadstart", setProgressMaxValue, false);
                    xhr.upload.addEventListener("progress", updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function (e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!
                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open("POST", document.getElementById("file-upload-form").action, true);
                    xhr.setRequestHeader("X-File-Name", file.name);
                    xhr.setRequestHeader("X-File-Size", file.size);
                    xhr.setRequestHeader("Content-Type", "multipart/form-data");
                    xhr.send(file);
                } else {
                    output("Please upload a smaller file (< " + fileSizeLimit + " MB).");
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById("file-drag").style.display = "none";
        }
    }
    function ekUpload2() {
        function Init() {
            console.log("Upload Initialised");

            var fileSelect = document.getElementById("file-upload2"),
                fileDrag = document.getElementById("file-drag2"),
                submitButton = document.getElementById("submit-button2");

            fileSelect.addEventListener("change", fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener("dragover", fileDragHover, false);
                fileDrag.addEventListener("dragleave", fileDragHover, false);
                fileDrag.addEventListener("drop", fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById("file-drag2");

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = e.type === "dragover" ? "hover" : "modal-body file-upload";
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; (f = files[i]); i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById("messages2");
            m.innerHTML = msg;
        }

        function parseFile(file) {
            //console.log(file.name);
            // output(
            //   '<strong>' + encodeURI(file.name) + '</strong>'
            // );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = /\.(?=gif|jpg|png|jpeg)/gi.test(imageName);
            if (isGood) {
                document.getElementById("start2").classList.add("hidden");
                document.getElementById("response2").classList.remove("hidden");
                document.getElementById("notimage2").classList.add("hidden");
                // Thumbnail Preview
                document.getElementById("file-image2").classList.remove("hidden");
                document.getElementById("file-image2").src = URL.createObjectURL(file);
            } else {
                document.getElementById("file-image2").classList.add("hidden");
                document.getElementById("notimage2").classList.remove("hidden");
                document.getElementById("start2").classList.remove("hidden");
                document.getElementById("response2").classList.add("hidden");
                document.getElementById("file-upload-photo").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById("file-progress2");

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById("file-progress2");

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {
            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById("class-roster-file2"),
                pBar = document.getElementById("file-progress2"),
                fileSizeLimit = 3024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 4024 * 4024) {
                    // Progress bar
                    pBar.style.display = "inline";
                    xhr.upload.addEventListener("loadstart", setProgressMaxValue, false);
                    xhr.upload.addEventListener("progress", updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function (e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!
                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open("POST", document.getElementById("file-upload-photo").action, true);
                    xhr.setRequestHeader("X-File-Name", file.name);
                    xhr.setRequestHeader("X-File-Size", file.size);
                    xhr.setRequestHeader("Content-Type", "multipart/form-data");
                    xhr.send(file);
                } else {
                    output("Please upload a smaller file (< " + fileSizeLimit + " MB).");
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById("file-drag2").style.display = "none";
        }
    }
    ekUpload();
    ekUpload2();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#store_cover").on("click", function (e) {
        e.preventDefault();

        var formData = new FormData($("#file-upload-form")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('user_update_cover') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data != false) {
                    $("#cover").attr("src", data);
                    jQuery.noConflict();
                    $("#upload-a-cover").modal("toggle");
                     $('.modal-backdrop').hide();
                flashBox('success');
                }
            },
            error: function (response) {
                console.log(response);
                $("#image-input-error").text(response.responseJSON.errors.file);
            },
        });
    });

    $("#store_photo").on("click", function (e) {
        e.preventDefault();

        var formData = new FormData($("#file-upload-photo")[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('user_update_photo') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data != false) {
                    $("#photo").attr("src", data);
                    jQuery.noConflict();
                    $("#upload-a-photo").modal("toggle");
                     $('.modal-backdrop').hide();
                flashBox('success');
                }
            },
            error: function (response) {
                console.log(response);
                $("#image-input-error").text(response.responseJSON.errors.file);
            },
        });
    });
</script>
<script>
    $(function () {
        $(document)
            .on("click", ".btn-add", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFields:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-add").removeClass("btn-add").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });


    $(function () {
        $(document)
            .on("click", ".btn-addsk", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFieldsk:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-addsk").removeClass("btn-addsk").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });
</script>
<!--hourly_price_error-->
<script>
    $(document).on("click", "#aa", function (e) {
        e.preventDefault();

        $("#hourly_price_error").text("");
        
  

        var formData = new FormData($("#Form")[0]);
        $.ajax({
            type: "post",
            url: "{{route('hourly_price.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) {
                    
                 $('#currency_show').html('<h4 class="green-color">' + data[0].hourly_price + ' ' + data[0].currency + '/' + data[0].rate_duration + 'min</4>');
                  
                flashBox('success');
                } // alert(data.msg)
                                               
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>
<!--store about-->

<script>
    $(document).on("click", "#storeabout", function (e) {
        e.preventDefault();

        $("#about_show").text($("textarea[name='about']").val());

        var formData = new FormData($("#about_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('about.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) {
                } // alert(data.msg)
                 
                flashBox('success');
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--store bio-->

<script>
    $(document).on("click", "#storebio", function (e) {
        e.preventDefault();

        $("#bio_show").text($("textarea[name='bio']").val());

        var formData = new FormData($("#bio_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('bio.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) {
                } // alert(data.msg)
                  
                flashBox('success');
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--Webinar-->
<script>
    $(document).on("click", "#savewebinar", function (e) {
        e.preventDefault();

        $("#title7_error").text("");
        $("#cover7_error").text("");
        $("#about7_error").text("");
        $("#file7_error").text("");

        var formData = new FormData($("#webinarForm")[0]);
        $.ajax({
            type: "post",
            url: "{{route('service.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                
                jQuery.noConflict();
                $("#webinar-modal").modal("toggle");
                 $('.modal-backdrop').hide();
                flashBox('success');
                // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "7_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--session-->
<script>
    $(document).on("click", "#savesession", function (e) {
        e.preventDefault();

        $("#title_error").text("");

        var formData = new FormData($("#sessionForm")[0]);
        $.ajax({
            type: "post",
            url: "{{route('session.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) {
                    
                    jQuery.noConflict();
                    $("#session-modal").modal("toggle");
                     $('.modal-backdrop').hide();
                flashBox('success');
                } // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--quiz-->
<script>
    $(document).on("click", "#savequiz", function (e) {
        e.preventDefault();

        $("#title_qerror").text("");
        $("#image_qerror").text("");
        $("#description_qerror").text("");
        $("#category_qerror").text("");

        var formData = new FormData($("#quizform")[0]);
        $.ajax({
            type: "post",
            url: "{{route('quizze.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                window.location = "{{ url('/') }}/quiz-create/" + data.id;
                // jQuery.noConflict();
                // $("#quiz-modal").modal("toggle");
                //  $('.modal-backdrop').hide();
                // flashBox('success');
                // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_qerror").text(val[0]);
                });
            },
        });
    });
</script>
<!--store storskill-->

<script>
    $(document).on("click", "#storskill", function (e) {
        e.preventDefault();

        var formData = new FormData($("#skill_form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('skill.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $("#add_skill").append('<div class="R' + data.id + ' col skills-col">' + data.skill + '<a href="" class="delete_skill font-12" skill_id="' + data.id + '">x</a></div>');
  
                flashBox('success');
                if (data.status == true) {
                } // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>
<script>
    $(document).on("click", ".delete_skill", function (e) {
        e.preventDefault();
        var skill_id = $(this).attr("skill_id");
        $.ajax({
            type: "post",
            url: "{{route('destroy.skill')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: skill_id,
            },
            success: function (data) {
                if (data.status == true) {
                     
                flashBox('success');
                }

                $(".R" + data.id).remove();
            },
            error: function (reject) {},
        });
    });
</script>
<!--delete_qua-->
<script>
    $(document).on("click", ".delete_qua", function (e) {
        e.preventDefault();
        var qua_id = $(this).attr("qua_id");
        $.ajax({
            type: "post",
            url: "{{route('destroy.qua')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: qua_id,
            },
            success: function (data) {
                if (data.status == true) {
                   
                flashBox('success');
                }

                $(".Rqua" + data.id).remove();
            },
            error: function (reject) {},
        });
    });
</script>

<!--store storequalification-->

<script>
    $(document).on("click", "#storequalification", function (e) {
        e.preventDefault();

        var formData = new FormData($("#qualification_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('qualification.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $("#table").append(
                    "<div class='newly-added mt-3 Rqua" +
                        data.id +
                        "' ><a href='#'  class='delete_qua font-12' qua_id='" +
                        data.id +
                        "'><i class='fa fa-trash text-left'></i></a><h6 class='mb-2 font-12' id='institute_name_show'>" +
                        data.institute_name +
                        "/" +
                        data.degree +
                        "/" +
                        data.year +
                        "</h6> </div>"
                );
 
                flashBox('success');
                if (data.status == true) {
                } // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--store_user_img-->

<script>
    $(document).on("click", "#store_user_img", function (e) {
        e.preventDefault();

        var formData = new FormData($("#user_img_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('user_img.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $(".user_image").attr("src", "/storage/users/" + data.image);
                jQuery.noConflict();
                $("#edit-img-user").modal("toggle");
                $('.modal-backdrop').hide();
                flashBox('success');
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "user_img_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--store_user_imgb-->

<script>
    $(document).on("click", "#store_user_imgb", function (e) {
        e.preventDefault();

        var formData = new FormData($("#user_imgb_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('user_imgb.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $(".user_imageb").attr("src", "/storage/users/" + data.imageb);
                jQuery.noConflict();
                $("#edit-imgb-user").modal("toggle");
                $('.modal-backdrop').hide();
                flashBox('success');
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "user_imgb_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--store_user_video-->

<script>
    $(document).on("click", "#store_user_video", function (e) {
        e.preventDefault();

        var formData = new FormData($("#user_video_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('user_video.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                $("#user_video").attr("src", "/storage/users/" + data.video);
                jQuery.noConflict();
                $("#edit-video-user").modal("toggle");
                $(".a_video").show();
                $("#add_video").remove();
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "user_video_error").text(val[0]);
                });
            },
        });
    });
</script>

<!--store job_title-->

<script>
    $(document).on("click", "#storejob_title", function (e) {
        e.preventDefault();

        $("#job_title_show").text($("input[name='job_title']").val());

        var formData = new FormData($("#job_title_Form")[0]);
        $.ajax({
            type: "post",
            url: "{{ route('job_title.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                if (data.status == true) { 
                flashBox('success');
                } // alert(data.msg)
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_error").text(val[0]);
                });
            },
        });
    });

    // $('input[type=radio][name=status]').change(function(e){
    $(document).on("click", ".stat", function (e) {
         
         //  e.preventDefault();
         var id = $(this).attr("st");
         var val = $(this).val();
  
     
     if (confirm("Are you sure?")) {
         $.ajax({
             type: "get",
             url: "{{ route('status.s.session') }}",
             data: { _token: "{{ csrf_token() }}", id: id, val: val },
             dataType: "json", // let's set the expected response format
             success: function (data) {
                flashBox('success');
                if ( val == 2) {

                    $(".Rapplication" + id).remove();
                 }
             },
             error: function (err) {
                 if (err.status == 422) {
                     // when status code is 422, it's a validation issue
                     console.log(err.responseJSON);
                     $("#success_message_notifications")
                         .fadeIn()
                         .html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message + "</div>");
                 }
             },
         });
 } else {
   
 }
         
     });
</script>
<script>
$('#location_btn').on('click' , function (e) {
            e.preventDefault();
            $(document).find('#err').remove();
            $.ajax({
                type: "post",
                url: "{{ route('review.user') }}",
                data: $("#location").serialize(),
                dataType: 'json',              // let's set the expected response format
                success: function (data) {
                    //console.log(data);
                    $('#success_message_location').append().html('<hr/> <div class="row Rev' +data[0].id + '"> <div class="col-2 text-center"><img src="/storage/users/' + data[1] + '" alt="Comments" class="user_image comment-person" /> </a>  </div> <div class="col-10 my-auto pl-0"> <div class="row"><div class="col col-lg-6"><h6>' + data[0].reviewer.first_name + ' </h6><h6 class="published-date">'+ data[2] +'</h6> </div> <div class="col col-lg-6 text-right mobile-text-center"> <a href="" class="delete_review reply-client"  review_id="'+ data[0].id +'">delete</a> </div> </div>   <div class="comment-text mt-2">' + data[0].body + '</div> </div> </div>');
 // document.body.scrollTop = document.documentElement.scrollTop = 0;
 
                flashBox('success');
                document.getElementById('review_pc').value = '';
                },
                error: function (err) {
                    if (err.status == 422) { // when status code is 422, it's a validation issue
                        console.log(err.responseJSON);
                        // $('#success_message_location').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');
                        // document.body.scrollTop = document.documentElement.scrollTop = 0;

                        // you can loop through the errors object and show it to the user
                        console.warn(err.responseJSON.errors);
                        // display errors on each form field
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            //el.nextAll().remove();
                            el.after($('<span id="err" style="color: red;">' + error[0] + '</span>'));
                        });
                    }
                }
            });

        });


        $(document).on("click", ".delete_review", function (e) {
        e.preventDefault();
        var review_id = $(this).attr("review_id");
        $.ajax({
            type: "post",
            url: "{{route('destroy.review')}}",
            data: {
                _token: "{{csrf_token()}}",
                id: review_id,
            },
            success: function (data) {
                if (data.status == true) {
                    
                flashBox('success');
                }

                $(".Rev" + data.id).remove();
            },
            error: function (reject) {},
        });
    });
</script>
@endpush
