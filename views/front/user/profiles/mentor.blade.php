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

</style>

<!---------------- user banner section --------------------->

<div class="user-banner-section"  style=" height:250px">
     @if(  $user->cover )
      <img  class="avater-cover user_imageb" src="{{asset('/storage/users/'.$user->cover)}}" alt="{{$user->first_name}}"  style=" height:250px">
      @else
      <img class ="user_imageb" src="{{ url('/') }}/site/images/profile-3.png" alt="banner"  style=" height:250px" />
      @endif
    <!-- 	<a href="session-plan.php" class="user-profile-setting">Settings <img src="{{ url('/') }}/site/images/setting-icon.png" alt="setting"> </a> -->
  
        
     </a>
</div>

<div class="user-profle-main text-center move-up">
    <div class="user-snap">
    @if(  $user->image )
      <img  class="avater-cover user_image" src="{{asset('/storage/users/'.$user->image)}}" alt="{{$user->first_name}}">
      @else
     <img class="user_image" src="{{ url('/') }}/site/images/avatar.png" alt="cover">
      @endif
   
    </div>
</div>

<section class="bg-white pt-0 user-profle-main move-right">
    <div class="container">
        <div class="row">
        <div class="col-sm-3 col-lg-3 user-profile-sidebar">
        
                     @if(session()->has('message'))<br>
                    <div class="alert alert-success col-sm-10">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))<br>
                    <div class="alert alert-success col-sm-10">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('message') }}
                    </div>
                @endif
                    

               @if($user->currency)
                <h4 class="green-color">{{$user->hourly_price}} {{$user->currency}} / {{$user->rate_duration}} min</h4>
                @else<br><br><br> @endif
                <div class="schedule-meeting">
                     <a href="{{ url('/') }}/en/messages/{{$user->id}}"  class="mt-2">Send A MESSAGE</a>
                     @if(auth()->user())
                      @if(auth()->user()->type_id == 4)
                        <a href="#req-session{{$user->id}}" data-toggle="modal">Schedule Session</a>
                    @endif @endif                                
                 </div>
                 <br><br> 
                <div class="setup-account">
                    <div class="my-metors">
                        <h6 class="clearfix">Similar @if($user->type_id == 2) Mentors @else coaches @endif</h6>
                        <div class="my-mentor-pics mt-4">
                            
                        @foreach($similar_mentors as $similar_mentor)
                        <a href="{{ route('mentor.profile', $similar_mentor->slug)}}"  data-toggle="tooltip" data-placement="top" title="test-name">
                         @if(  $similar_mentor->image )
                             <img class="avater-cover" src="{{asset('/storage/users/'.$similar_mentor->image)}}" style="width:32px; height:32px; border-radius: 50%;" alt="{{$similar_mentor->first_name}}">
                                @else
                            <img src="{{ url('/') }}/site/images/avatar.png" alt="cover" class="avater-cover" style="width:32px; height:32px; border-radius: 50%;">
                                @endif
                            </a>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 col-lg-9">
                <div class="row text-center">
                    
                    <div class="col-sm-6 col-lg-8 order-one">
                        <h4 class="blue-color mt-3 mb-3 pt-2" style="margin-top:0px !important;">{{ $user->first_name." ".$user->last_name }}</h4>
                        <div class="user-rating">
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                              
                        </div>
                        <h6>@if($user->reviews){{$user->reviews->count()}}@else 0 @endif Reviews</h6>
                        
                        <div> 
                         <p id="job_title_show" class="font-weight-bold mt-3 text-capitalize">{{ $user->job_title }} </p>
                        </div>
                         
                    </div>
                    <div class="col-sm-4 col-lg-4 order-three">
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
                    </div>
                </div>
                @if( $user->video )
                <div class="newly-added mt-3">
                
               
                <div class="newly-added text-center p-0 border-0 mt-4 position-relative">
                 <video id="user_video" controls  width="700">
                 <source src="{{asset('/storage/users/'.$user->video)}}" type="video/mp4">
                  </video> 
                </div>
                </div>
                   
                 @endif
                 
                 @if( $user->bio )
                 <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">bio</h6>
                     </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <p id="bio_show">{{ $user->bio }}</p>
                        </div>
                    </div>
                </div>@endif
                
                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">About</h6>
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
                        @if($qualification != '')
                        @foreach ($qualification as $qualification )
                        <div class="newly-added mt-3 Rqua{{$qualification->id}}" >
                             <h6 class="mb-2 font-12" >{{$qualification->institute_name}} / {{$qualification->degree}} / {{$qualification->year}}</h6>
                        
                         </div>
                         @endforeach
                         @endif
                        </div>
                    </div>
                </div>
                <div class="newly-added mt-3">
                    <div class="d-flex" style="justify-content: space-between;">
                        <h6 class="text-left mb-2 pb-2">Skills</h6>
                    </div>
                    <div>
                        <div class="row" id="add_skill">
                        @foreach ($skills as $skill )
                        <div class="R{{$skill->id}} col skills-col">
                            <h5 class="bac">
                            {{$skill->skill}}
                            </h5>
                         </div>
                        @endforeach
                        </div>
                        
                    </div>
                </div>
                <div class="newly-added text-center mt-3">
                    <h6 class="text-left mb-4 pb-2">My Statistics</h6>
                    <div class="row">
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{ $session ?? '' }}</h5>
                            <h6>Sessions</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$sp_session_accept}}</h5>
                            <h6>Mentees </h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$community}}</h5>
                            <h6>Communities</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$user->community_posts->count()}}</h5>
                            <h6>Total discussions</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$quizze}}</h5>
                            <h6>Quizzes & Exercises</h6>
                        </div>
                        <div class="col-sm-3 col-lg-3 my-stattistics">
                            <h5>{{$user->articles->count()}}</h5>
                            <h6> Articles</h6>
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
                                 @if(Auth::user())
                                @if($r->reviewer_id == Auth::user()->id)
                                <div class="col col-lg-6 text-right mobile-text-center">
                                    <a href="" class="delete_review reply-client"  review_id="{{$r->id}}">delete</a>
                                </div>@endif @endif
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
                      @if(Auth::user())
                <form  name="location" id="location" enctype="multipart/form-data"   action="">
                  <label>REPLY</label>
                  @csrf

                  <input type="text" name="user_id" style="display:none" value="{{$user->id}}">
                  <textarea class="col-lg-12" rows="5" name="body" placeholder="Your Reply" id="review_pc" maxlength="360"></textarea>
                  <div class="text-center mt-3">
                  <button id="location_btn" class="btn" >Send</button>
                  </div>
               </form>@endif
            </div>
            </div>
        </div>
    </div>
</section>

        <!-- Modal -->
<div class="modal fade" id="req-session{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Schedule Session</h6>
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body form-style">
      <form action="{{ route('sp_session.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
 
                <input type="text" name="user_type" value="2" style="display: none;" />
                <input type="text" name="users" value="{{$user->id}}" style="display: none;" />
        	<div class="row">
        		<div class="col-lg-12">
        			<label class="font-weight-bold">Give your new session a title</label>
        			<input type="text" name="title" class="w-100 input-shadow" maxlength="60" required>
        			<small class="w-100 font-weight-bols text-right d-block">60 remaining characters</small>
        		</div>
        		
                
                <div class="col-lg-12">
                    
        			<label class="font-weight-bold">Choose a topic</label>
        			<select name="session" class="w-100">
                    <option value=""  >choose</option>

                        @foreach( $user->session as $s)
                    <option value="{{$s->id}}"  >{{$s->title}}</option>
                    @endforeach
        			</select>
        		</div>
                <div class="col-lg-12">
        			<label class="font-weight-bold">Suggested available session dates & times for this mentor</label>
        			<select name="session_time" class="w-100">
                    <option value=""></option>

        			</select>
        		</div>
        		<div class="col-sm-6 col-lg-6">
        			<label class="font-weight-bold">Date</label>
        			<input type="date" name="date"  min="<?php echo date("Y-m-d"); ?>" class="w-100">
        		</div>
        		<div class="col-sm-6 col-lg-6" id="datetimepicker3">
        			<label class="font-weight-bold">Time</label>
                     <input type="time" name="time" class="w-100">
        		</div>
                <div class="col-sm-8 col-lg-8 goal-field">
                <label class="font-weight-bold"> What are your objectives from this session?</label>
                    <div id="myRepeatingFields{{$user->id}}">
                             <div class="entry{{$user->id}} input-group col-xs-3">
                            <table class="table meeting-table class-table">

                                <input type="text" name="goal[]" class="w-100" />
                                <button type="button" class="btn btn-sm btn-add{{$user->id}}">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true">+ Add objective</span>
                                </button>

                                <span class="input-group-btn"> </span></table>
                            </div>
                        </div>
                        </div> 
        		<div class="col-sm-12 col-lg-12 text-center submit-btn">
        			<input type="reset" name="" value="Cancel" class="bg-white">
        			<input type="submit" name="" value="Send" class="bg-white">
        		</div>

                <div class="col-sm-12 col-lg-12 ">
        			<span style="font-size: 10px; text-align: justify;">* By clicking “Send”, you will send a “Session Request” to this mentor. You will get a notification on your TELCCA profile once the mentor “Accepts” your session, or once the mentor “Refuses” your session request. If accepted, this session will be automatically added to your “Calendar”, and the price of the session specified on the mentor’s profile will be deducted from your credit card/bank account only after you have attended the session with the mentor (after the end of your session).
</span>
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


@endsection @push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
                    $('#success_message_location').fadeIn().html('<hr/> <div class="row Rev' +data[0].id + '"> <div class="col-2 text-center"><img src="/storage/users/' + data[1] + '" alt="Comments" class="user_image comment-person" /> </a>  </div> <div class="col-10 my-auto pl-0"> <div class="row"><div class="col col-lg-6"><h6>' + data[0].reviewer.first_name + ' </h6><h6 class="published-date">'+ data[2] +'</h6> </div> <div class="col col-lg-6 text-right mobile-text-center"> <a href="" class="delete_review reply-client"  review_id="'+ data[0].id +'">delete</a> </div> </div>   <div class="comment-text mt-2">' + data[0].body + '</div> </div> </div>');
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
                    $("#success_msg").show();
                }

                $(".Rev" + data.id).remove();
            },
            error: function (reject) {},
        });
    });
</script>
@endpush
