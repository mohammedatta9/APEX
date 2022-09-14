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
    .upload-img-user{border: solid 1px #cfcfcfdd;
    position: absolute;
    bottom: 24px;
    right: 0;
    color: #383636;
    padding: 7px;
    border-radius: 31px;
    background-color: #cfcfcfdd;}
    .user-snap{position: relative;}
    .cover-photo-change {
    position: absolute;
    bottom: 26px;
    right: 28px;
    display: flex;
    background-color: #ddd;
    padding: 8px 24px;
    border-radius: 7px;z-index: 2;}
    .icon-cover-photo{color: #383636;
    margin-left: 10px;}
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
 
</style>

<!---------------- user banner section --------------------->

<div class="user-banner-section" style=" height:250px">
    @if($user->cover != '')
    <img src="{{ asset('/storage/users/'.$user->cover) }}" alt="banner" style=" height:250px"/>
    @else
    <img src="{{ url('/') }}/site/images/profile-3.png" id="cover" alt="banner" style=" height:250px" />
    @endif
    <!-- 	<a href="session-plan.php" class="user-profile-setting">Settings <img src="{{ url('/') }}/site/images/setting-icon.png" alt="setting"> </a> -->
    <a href="#upload-a-cover" data-toggle="modal" class="cover-photo-change">
                        <p> Change cover photo </p>
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
                <!----------------سعر الساعه-------------------------------------->
                <!---->
                <div class="schedule-meeting">
                    <!-- <a href="#sessions-request" data-toggle="modal" >Schedule a Session</a> -->
                    <!-- <a href="#" class="mt-2">Send A MESSAGE</a> -->
                    <a href="{{ route('calender')}}" class="mt-2">My Calendar</a>
                    <a href="{{ route('user.files') }}" class="mt-2">Files & Folders Dashboard</a>
                    <a href="#sesion_plan" data-toggle="modal" class="mt-2">Start Session plan</a>
                    <a href="#pd_planm" data-toggle="modal" class="mt-2">Start Personal Development plan</a>
                    <a href="#add-community" data-toggle="modal" class="mt-2">Create a Community</a>
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
                        <h4 class="blue-color mt-3 mb-3 pt-2" style="margin-top:0px !important;">{{ $user->first_name." ".$user->last_name }}</h4>


                        <div>
                         <p id="job_title_show" class="font-weight-bold mt-3 text-capitalize">{{ $user->job_title }} </p>

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
                            <a><i class="fa fa-phone"></i> {{ $user->phone }} </a>
                            @endif @if($user->language)
                            <a><i class="fa fa-language"></i> {{ $user->language }}</a>
                            @endif @if($user->address)
                            <a><i class="fa fa-map-marker"></i> {{ $user->address }}</a>
                            @endif
                             @if($user->timezone)
                            <a ><i class="fa fa-clock-o"></i> {{ $user->timezone }}</a>
                            @endif
                        </ul>
                    </div>
                </div>


               <div class="newly-added text-center">
					<h5 class="text-left mb-4 pb-2">Newly Added</h5>
					<!-- <img src="{{ url('/') }}/site/images/left-arrow.png" alt="arrow" class="newly-left-arrow">
					<img src="{{ url('/') }}/site/images/right-arrow.png" alt="arrow" class="newly-right-arrow"> -->
					<div class="owl-carousel user-profile-slider">
						<div class="item">
							<img src="{{ url('/') }}/site/images/session-plan.png" alt="plan">
							<h6>Session plan</h6>
							<div class="circle-append">
								@if($last_session_plan) {{$last_session_plan->title}} @else None workshop yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/goal.png" alt="goal">
							<h6>Goal</h6>
							<div class="circle-append">
								@if($last_goal) {{$last_goal->gool}} @else None goals yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/sub-goal.png" alt="sub-goal">
							<h6>Sub Goal</h6>
							<div class="circle-append">
								@if($last_subgoal) {{$last_subgoal->subgool}} @else None Subgoal yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/p.d-plan.png" alt="plan">
							<h6>P.D Plan</h6>
							<div class="circle-append">
								@if($last_pd_plan) {{$last_pd_plan->name}} @else None P.D plan yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/session-plan.png" alt="plan">
							<h6>Session plan</h6>
							<div class="circle-append">
								@if($last_workshop) {{$last_workshop->title}} @else None workshop yet @endif
							</div>
						</div>
					</div>
				</div>
				<div class="newly-added text-center mt-3">
					<h5 class="text-left pb-2">Newly Done</h5>
<!-- 					<img src="{{ url('/') }}/site/images/left-arrow.png" alt="arrow" class="newly-left-arrow">
					<img src="{{ url('/') }}/site/images/right-arrow.png" alt="arrow" class="newly-right-arrow"> -->
					<div class="owl-carousel user-profile-slider">
						<div class="item">
							<img src="{{ url('/') }}/site/images/course.png" alt="course">
							<h6>course</h6>
							<div class="circle-append">
								@if($last_course) {{$last_course->title}} <br> Date {{$last_course->session_date}}  @else None course yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/session-plan.png" alt="session">
							<h6>Session</h6>
							<div class="circle-append">
								@if($last_session) {{$last_session->title}} <br> Date {{$last_session->session_date}} @else None session yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/p.d-plan.png" alt="p.d plan">
							<h6>P.D plan</h6>
							<div class="circle-append">
                            @if($last_pd_plan) {{$last_pd_plan->name}} @else None P.D plan yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/project.png" alt="project">
							<h6>Project</h6>
							<div class="circle-append">
								@if($last_project) {{$last_project->title}} <br> Date {{$last_project->session_date}} @else None project yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/course.png" alt="course">
							<h6>course</h6>
							<div class="circle-append">
								@if($last_course) {{$last_course->title}} <br> Date {{$last_course->session_date}} @else None course yet @endif
							</div>
						</div>
					</div>
				</div>
				<div class="newly-added text-center mt-3">
					<h5 class="text-left pb-2">Newly Joined</h5>
					<!-- <img src="{{ url('/') }}/site/images/left-arrow.png" alt="arrow" class="newly-left-arrow">
					<img src="{{ url('/') }}/site/images/right-arrow.png" alt="arrow" class="newly-right-arrow"> -->
					<div class="owl-carousel user-profile-slider">

						<div class="item">
							<img src="{{ url('/') }}/site/images/dicussion.png" alt="Discussion">
							<h6>Discussion</h6>
							<div class="circle-append">
                            @if($last_community_post) {{$last_community_post->title}} @else None Discussion yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/communities.png" alt="Community">
							<h6>Community</h6>
							<div class="circle-append">
								@if($last_community) {{$last_community->name}} @else None Community yet @endif
							</div>
						</div>


						<div class="item">
							<img src="{{ url('/') }}/site/images/internship.png" alt="internship">
							<h6>Internship</h6>
							<div class="circle-append">
								@if($last_intership) {{$last_intership->title}} <br> Date {{$last_intership->session_date}} @else None internship yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/workshop.png" alt="workshops">
							<h6>Workshops</h6>
							<div class="circle-append">
                           @if($last_workshop) {{$last_workshop->title}} <br> Date {{$last_session->session_date}} @else None workshop yet @endif
							</div>
						</div>
                        <div class="item">
							<img src="{{ url('/') }}/site/images/dicussion.png" alt="Discussion">
							<h6>Discussion</h6>
							<div class="circle-append">
                            @if($last_community_post) {{$last_community_post->title}} @else None Discussion yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/dicussion.png" alt="Discussion">
							<h6>Webinar</h6>
							<div class="circle-append">
                            @if($last_webinar) {{$last_webinar->title}} @else None Webinar yet @endif
							</div>
						</div>
                        <div class="item">
							<img src="{{ url('/') }}/site/images/internship.png" alt="internship">
							<h6>Event</h6>
							<div class="circle-append">
								@if($last_event) {{$last_event->title}} <br> Date {{$last_event->session_date}} @else None Event yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/workshop.png" alt="workshops">
							<h6>Workshops</h6>
							<div class="circle-append">
                           @if($last_workshop) {{$last_workshop->title}} <br> Date {{$last_session->session_date}} @else None workshop yet @endif
							</div>
						</div>
						<div class="item">
							<img src="{{ url('/') }}/site/images/dicussion.png" alt="Discussion">
							<h6>Seminar</h6>
							<div class="circle-append">
                            @if($last_seminar) {{$last_seminar->title}} @else None Seminar yet @endif
							</div>
						</div>
					</div>
				</div>
				<div class="newly-added text-center mt-3">
					<h5 class="text-left pb-2">My Statistics</h5>
					<div class="row">
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$sessions_learner}}</h5>
							<h6>Sessions</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$sessionplan_learner}}</h5>
							<h6>Sessions Plan</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$pd_plan}}</h5>
							<h6>P.D. Plan</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$goals}}</h5>
							<h6>Goals</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$subgoals}}</h5>
							<h6>Sub Goals</h6>
						</div>
                      
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$workshops}}</h5>
							<h6>Workshops</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$user->community_posts->count()}}</h5>
							<h6>Discussions</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$community}}</h5>
							<h6>Communities</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$courses}}</h5>
							<h6>Courses</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$internships}}</h5>
							<h6>Internships</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$programs}}</h5>
							<h6>Programs</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$projects}}</h5>
							<h6>Projects</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$events}}</h5>
							<h6>Events</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$seminars}}</h5>
							<h6>Seminars</h6>
						</div>
						<div class="col-sm-3 col-lg-4 my-stattistics">
							<h5>{{$webinars}}</h5>
							<h6>Webinars</h6>
						</div>
					</div>
				</div>





            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="sesion_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                               <h6 class="modal-title" id="exampleModalLabel">New Sessions Plan</h6>
                              
                          </div>
                           <div class="modal-body form-style">
                               
                    <form  action="{{ route('session_plan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
        		<div class="col-lg-12">
        			<label class="font-weight-bold">Title</label>
        			<input type="text" name="title" class="w-100 input-shadow" maxlength="60" required>
        		</div>
        		<div class="col-lg-12">
        			<label class="font-weight-bold">Field/Industry/Area</label>
        			<select class="w-100" name="industry">
                    <option disabled selected>Choose industry</option>
                        @foreach($industry as $a)
        				<option>{{$a->name}}</option>
        				@endforeach
        			</select>
        		</div>
        		<div class="col-sm-12 col-lg-12 text-center submit-btn">
                <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input type="submit" name="" value="Save" class="bg-white" />
        		</div>
</div>
                    </form>
                
                
                           </div>
                       </div>
                       
                      
                   </div>
               </div>

<!-- Create community Modal -->
<div class="modal fade" id="add-community" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Community</h5>
            </div>
            <div class="modal-body form-style">
            <form  action="{{ route('community.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" maxlength="60" name="name" class="w-100 input-shadow" required/>
                         </div>
                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Community Field</label>
                            <select name="category_id" class="w-100">
                            @foreach ($industry as $industry)
                                <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                              @endforeach
                            </select>
                        </div>
                          
                        <div class="col-sm-6 col-lg-6 mb-0 collaborate">
                            <label class="font-weight-bold">Add an Image</label>
                             
                                <input type="file" name="image"  />
                            
                        </div>
                         
                        <div class="col-lg-12">
                            <label class="font-weight-bold">About</label>
                            <input type="text" maxlength="60" name="about" class="w-100 input-shadow" required/>
                         </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input type="submit" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


                               <!--pd_plan-->
                               <div class="modal fade" id="pd_planm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 855px;">
                      <div class="modal-content">
                          <div class="modal-header">
                               <h6 class="modal-title" id="exampleModalLabel">New personal development plan</h6>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                               </button>
                          </div>
                           <div class="modal-body form-style">
                     <h6>Let’s Start with understanding more about what to do with this personal development Plan.</h6>
                    <form class="row mt-4" action="{{ route('pd_plan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 mb-4 pl-0">
                            <label>My end goal of this personal development Plan is to </label>
                            <input type="text" maxlength="60" name="gool" class="col-sm-8 col-lg-8">
                        </div>
                        <div class="col-lg-12 mb-4 pl-0">
                            <label>My deadline to achieve my final goal is </label>
                            <input type="date" name="deadline" min="<?php echo date("Y-m-d"); ?>" class="col-sm-2 col-lg-2">
                        </div>
                        <div class="col-lg-12 mb-4 pl-0">
                            <label>The title of this personal development Plan is </label>
                            <input type="text" maxlength="60" name="name" class="col-sm-8 col-lg-8" required>
                        </div>
                        <div class="col-lg-12 mb-4 pl-0">
                            <label>This quote is to give me some motivation throughout this journey: </label>
                            <input type="text" maxlength="60" name="notes" class="col-sm-12 col-lg-12 w-100 mb-0">
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="seve" class="bg-white"  />
                        </div>
                    </form>
                
                
                           </div>
                       </div>
                   </div>
               </div>

<!-- Modal-edit-video-user -->
<div class="modal fade" id="edit-video-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
            <form id="user_video_Form" action="">
                    @csrf
                <div class="upload-area text-center">

                    <input type="file" name="video" id="video"/>
                    <small id="videouser_video_error" class="form-text text-danger"></small>

                </div>
                <div class="col-sm-12 col-lg-12 text-center submit-btn">
                 <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                 <input id="store_user_video" type="button" name="" value="Save" class="bg-white"/>
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
                     <input name="video" style="display: none;"  />

                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Delete" class="bg-white"  />
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
                            <input type="text" maxlength="60" name="title" class="w-100 input-shadow" />
                            <small id="title7_error" class="form-text text-danger"></small>
                            <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Date</label>
                            <input type="date" name="date_from" min="<?php echo date("Y-m-d"); ?>" class="w-100" />
                        </div>
                        <div class="col-sm-6 col-lg-6" id="datetimepicker3">
                            <label class="font-weight-bold">Time</label>
                            <input type="time" name="time_to" class="w-100" />
                        </div>
                        <div class="col-sm-6 col-lg-6 mb-0">
                            <label class="font-weight-bold">About</label>
                            <input type="text" maxlength="160" name="about" class="w-100" />
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

<!-- Modal -->
<div class="modal fade" id="sessions-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
            </div>
            <div class="modal-body form-style">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold mb-3 d-block" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Session Request 1
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse show">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                Session Request 2
                            </a>
                        </div>
                        <div id="collapse2" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                Session Request 3
                            </a>
                        </div>
                        <div id="collapse3" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.error')


<!-- sessions requests Modal window-->
<div class="modal fade" id="sessions-requests" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
            </div>
            <div class="modal-body form-style">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold mb-3 d-block" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Session Request 1
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse show">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                Session Request 2
                            </a>
                        </div>
                        <div id="collapse2" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                Session Request 3
                            </a>
                        </div>
                        <div id="collapse3" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row font-12">
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold mb-2">
                                        <h6 class="font-13">NAME</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        OBJECTIVES
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold">
                                        <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing</h6>
                                    </div>
                                    <div class="col-sm-6 col-lg-6 green-color font-weight-bold digital-types">
                                        <a href="#">UI/UX Design</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Mobile App Design</a>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color text-uppercase font-13">Learner Name</h6>
                                        <h6 class="blue-color mt-2 font-13">Mr. Ali Ahmed Mustafa</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">DATE & TIME</h6>
                                        <h6 class="blue-color mt-2 font-13">4th March 00:00 AM</h6>
                                    </div>
                                    <div class="col-sm-3 col-lg-4">
                                        <h6 class="green-color font-13">TIME ZONE</h6>
                                        <h6 class="blue-color mt-2 font-13">Berlin, Germany</h6>
                                    </div>
                                </div>
                                <div align="center" class="mt-4 pt-2 font-13 accept-refuse">
                                    <a href="#">Accept Request</a>
                                    <a href="#">Refuse Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal job title-->

<div class="modal fade" id="job_title-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Title</h5>
            </div>
            <div class="modal-body form-style">
                <form id="job_title_Form" action="">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                        <input type="text" name="job_title" id="job_title" class="w-100 input-shadow" style="font-size: 13px;" value="{{$user->job_title}}"  maxlength="40">

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
                            <textarea rows="4" name="about" id="about" class="w-100 input-shadow p-3" value=""  maxlength="360">{{$user->about}}</textarea>

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
                            <label class="font-weight-bold">Institute name </label>
                            <input type="text" maxlength="60" name="institute_name" id="institute_name" class="w-100 input-shadow" style="font-size: 13px;" />
                            <label class="font-weight-bold">Degree</label>
                            <input type="text" name="degree" maxlength="60" id="degree" class="w-100 input-shadow" style="font-size: 13px;"  />

                            <label class="font-weight-bold">Graduation Year </label><br />

                            <select name="year" id="year">
                                {{-- $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name --}}
                                <option></option>
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
                            <input type="text" maxlength="60" name="skill" id="skill" class="w-100 input-shadow" style="font-size: 13px;" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 text-center submit-btn">
                        <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                        <input id="storskill" type="button" name="" value="Save" class="bg-white" data-dismiss="modal"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="upload-a-cover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="file-upload-form" class="uploader" method="post" enctype="multipart/form-data">
                @csrf
                 <input id="file-upload" type="file" name="fileUpload" accept="image/*" />

                      <label for="file-upload" id="file-drag">
                        <img id="file-image" src="#" alt="Preview" class="hidden" >
                        <div id="start">
                          <i class="fa fa-download" aria-hidden="true"></i>
                          <div>Select a image </div>
                          <div id="notimage" class="hidden" style="display:none;">Please select an image</div>
                          <span id="file-upload-btn" class="btn btn-primary">Select a image</span>
                        </div>
                        <div id="response" class="hidden">
                          <div id="messages"></div>
                         
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
<!-- Modal -->
<div class="modal fade" id="upload-a-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
                <form id="file-upload-photo" class="uploader" method="post" enctype="multipart/form-data">
                @csrf
                <input id="file-upload2" type="file" name="fileUpload" accept="image/*" />

                      <label for="file-upload2" id="file-drag2">
                        <img id="file-image2" src="#" alt="Preview" class="hidden" >
                        <div id="start2">
                          <i class="fa fa-download" aria-hidden="true"></i>
                          <div>Select a file or drag here</div>
                          <div id="notimage2" class="hidden" style="display:none;">Please select an image</div>
                          <span id="file-upload-btn2" class="btn btn-primary">Select a file</span>
                        </div>
                        <div id="response2" class="hidden">
                          <div id="messages"></div>
                          
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

<script>

    var objowlcarousel = $(".user-profile-slider");
if (objowlcarousel.length > 0) {
  objowlcarousel.owlCarousel({
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      768: {
        items: 3,
      },
      1024: {
        items: 2,
      },
    },
    loop: true,
    dots: false,
    autoPlay: false,
    navigation: true,
    stopOnHover: true,
    nav: true,
    items: 4,
    navigationText: [
      "<img src='http://telcca.tek-line.com/site/images/left-arrow.png'>",
      "<img src='http://telcca.tek-line.com/site/images/right-arrow.png'>",
    ],
  });
}


</script>

<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>

function ekUpload(){
  function Init() {

    console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload'),
        fileDrag      = document.getElementById('file-drag'),
        submitButton  = document.getElementById('submit-button');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages');
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

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start').classList.add("hidden");
      document.getElementById('response').classList.remove("hidden");
      document.getElementById('notimage').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image').classList.remove("hidden");
      document.getElementById('file-image').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image').classList.add("hidden");
      document.getElementById('notimage').classList.remove("hidden");
      document.getElementById('start').classList.remove("hidden");
      document.getElementById('response').classList.add("hidden");
      document.getElementById("file-upload-form").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file'),
      pBar = document.getElementById('file-progress'),
      fileSizeLimit = 3024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 4024 * 4024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
          if (xhr.readyState == 4) {
            // Everything is good!

            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-form').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag').style.display = 'none';
  }
}
function ekUpload2(){
  function Init() {

    console.log("Upload Initialised");

    var fileSelect    = document.getElementById('file-upload2'),
        fileDrag      = document.getElementById('file-drag2'),
        submitButton  = document.getElementById('submit-button2');

    fileSelect.addEventListener('change', fileSelectHandler, false);

    // Is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {
      // File Drop
      fileDrag.addEventListener('dragover', fileDragHover, false);
      fileDrag.addEventListener('dragleave', fileDragHover, false);
      fileDrag.addEventListener('drop', fileSelectHandler, false);
    }
  }

  function fileDragHover(e) {
    var fileDrag = document.getElementById('file-drag2');

    e.stopPropagation();
    e.preventDefault();

    fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
  }

  function fileSelectHandler(e) {
    // Fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // Cancel event and hover styling
    fileDragHover(e);

    // Process all File objects
    for (var i = 0, f; f = files[i]; i++) {
      parseFile(f);
      uploadFile(f);
    }
  }

  // Output
  function output(msg) {
    // Response
    var m = document.getElementById('messages2');
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

    var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
    if (isGood) {
      document.getElementById('start2').classList.add("hidden");
      document.getElementById('response2').classList.remove("hidden");
      document.getElementById('notimage2').classList.add("hidden");
      // Thumbnail Preview
      document.getElementById('file-image2').classList.remove("hidden");
      document.getElementById('file-image2').src = URL.createObjectURL(file);
    }
    else {
      document.getElementById('file-image2').classList.add("hidden");
      document.getElementById('notimage2').classList.remove("hidden");
      document.getElementById('start2').classList.remove("hidden");
      document.getElementById('response2').classList.add("hidden");
      document.getElementById("file-upload-photo").reset();
    }
  }

  function setProgressMaxValue(e) {
    var pBar = document.getElementById('file-progress2');

    if (e.lengthComputable) {
      pBar.max = e.total;
    }
  }

  function updateFileProgress(e) {
    var pBar = document.getElementById('file-progress2');

    if (e.lengthComputable) {
      pBar.value = e.loaded;
    }
  }

  function uploadFile(file) {

    var xhr = new XMLHttpRequest(),
      fileInput = document.getElementById('class-roster-file2'),
      pBar = document.getElementById('file-progress2'),
      fileSizeLimit = 3024; // In MB
    if (xhr.upload) {
      // Check if file is less than x MB
      if (file.size <= fileSizeLimit * 4024 * 4024) {
        // Progress bar
        pBar.style.display = 'inline';
        xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
        xhr.upload.addEventListener('progress', updateFileProgress, false);

        // File received / failed
        xhr.onreadystatechange = function(e) {
          if (xhr.readyState == 4) {
            // Everything is good!

            // progress.className = (xhr.status == 200 ? "success" : "failure");
            // document.location.reload(true);
          }
        };

        // Start upload
        xhr.open('POST', document.getElementById('file-upload-photo').action, true);
        xhr.setRequestHeader('X-File-Name', file.name);
        xhr.setRequestHeader('X-File-Size', file.size);
        xhr.setRequestHeader('Content-Type', 'multipart/form-data');
        xhr.send(file);
      } else {
        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
      }
    }
  }

  // Check for the various File API support.
  if (window.File && window.FileList && window.FileReader) {
    Init();
  } else {
    document.getElementById('file-drag2').style.display = 'none';
  }
}
ekUpload();
ekUpload2();

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$('#store_cover').on('click' , function(e) {
       e.preventDefault();

var formData = new FormData($("#file-upload-form")[0]);
       $.ajax({
          type:'POST',
          url: "{{ route('user_update_cover') }}",
           data: formData,
           contentType: false,
           processData: false,
           success: function (data) {
                if (data != false) {
                    $("#cover").attr("src",data);
                    jQuery.noConflict();
                    $('#upload-a-cover').modal('toggle');
                    $('.modal-backdrop').remove();
                    flashBox('success');

                }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });

  $('#store_photo').on('click' , function(e) {
       e.preventDefault();

var formData = new FormData($("#file-upload-photo")[0]);
       $.ajax({
          type:'POST',
          url: "{{ route('user_update_photo') }}",
           data: formData,
           contentType: false,
           processData: false,
           success: function (data) {
                if (data != false) {
                    $("#photo").attr("src",data);
                    jQuery.noConflict();
                    $('#upload-a-photo').modal('toggle');
                    $('.modal-backdrop').remove();
                    flashBox('success');

                }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
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
                if (data.status == true) {
                    
                    jQuery.noConflict();
                    $('#webinar-modal').modal('toggle');
                    $('.modal-backdrop').remove();
                    flashBox('success');
                } // alert(data.msg)
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
                $('#add_skill').append('<div class="R'+data.id+' col skills-col">'+data.skill+'<a href="" class="delete_skill font-12" skill_id="'+data.id+'">x</a></div>');
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
                $('#table').append("<div class='newly-added mt-3 Rqua" + data.id +"' ><a href='#'  class='delete_qua font-12' qua_id='" + data.id +"'><i class='fa fa-trash text-left'></i></a><h6 class='mb-2 font-12' id='institute_name_show'>" + data.institute_name +"/" + data.degree +"/" + data.year +"</h6> </div>");
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
                $(".user_image").attr('src',"/storage/users/"+ data.image);
                jQuery.noConflict();
                $('#edit-img-user').modal('hide');
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
                $(".user_imageb").attr('src',"/storage/users/"+ data.imageb);
                jQuery.noConflict();
                $('#edit-imgb-user').modal('hide');
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
                $("#user_video").attr('src',"/storage/users/"+data.video);
                jQuery.noConflict();
                $('#edit-video-user').modal('hide');
                $('.modal-backdrop').hide();
                $(".a_video").show();
                $("#add_video").remove();
                flashBox('success');

                
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


@endpush
