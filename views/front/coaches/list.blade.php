@extends('layouts.main')

@section('content')


    <style type="text/css">
        header {
            background-color: #0d1b26;
            color: #fff;
            padding: 0px 0;
        }


        .hide-element {
            display: none;
        }

        .feature-mentor p{ font-size:14px;}
        .card-body {
            padding: 20px;
        }
        .card-header{
            padding: 20px;
            padding-bottom: 0;
            text-align: left;
        }

        .filter-by {
            background: #fff;
            -webkit-box-shadow: 0 10px 30px 0 rgb(24 28 33 / 5%);
            box-shadow: 0 10px 30px 0 rgb(24 28 33 / 5%);
        }
        .form-control{
            border: 1px solid #e0e0e0;
            margin-bottom: 10px;
        }
        .feature-mentor {

            padding-bottom: 10px;
        }

    </style>

    <!---------------- banner section --------------------->

    <div class="page-banner">
        <div class="mentor-searcg-wrapper">
            <span class="browse-mentor">BROWSE <br>Coach <br> </span>
            <div class="space-bewteen"></div>
            <h1>Find your Coach </h1>
            <p class="mt-3 mb-3">Coaches keep us from going in circles,<br> or even giving up on our own goals. <br> Find your
                perfect match coaches and let’s start your journey.</p>
                <form action="{{ route('coache.search')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                @csrf
                    <input type="text" maxlength="60" name="title" placeholder="Enter Keywords here..." style="color: #000;">
                    <input type="submit" name="" value="find" class="btn-style">
                </form>
                <!--
                <a href="register.php" class="btn-style col-sm-6 col-lg-6" style="line-height: 16px;font-size: 14px;">Sign
                    up for FREE
                    now to access all Quizzes!</a>
                    -->
            

        </div>
    </div>


    <section class="filter-mentor bg-white p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-9">
                    <br>
                    <br> @if(session()->has('message'))<br>
                    <div class="alert alert-success col-sm-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))<br>
                    <div class="alert alert-success col-sm-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('message') }}
                    </div>
                @endif
                    <br>
                    @foreach($coaches as $coache)
                    <div class="mentor-row border-bottom pb-4">
                        <div class="row">
                          

                            <div class="col-sm-2 col-lg-2 p-0 pr-1 text-center">
                                <a href="{{ route('coache.profile', $coache->slug)}}">
                                @if($coache->image)
                                <img src="{{asset('/storage/users/'.$coache->image)}}" alt="coache" class="mentor-pic">
                                    @else
                                <img src="{{ url('/') }}/site/images/avatar.png" class="mentor-pic">
                                    @endif</a>
                            </div>
                            <div class="col-sm-10 col-lg-10 pl-1">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-5 pl-0 mobile-left-padding">
                                        <a href="{{ route('coache.profile', $coache->slug)}}">
                                        <span class="mentor-title">{{ $coache->first_name." ".$coache->last_name }}</span></a>
                                        <p class="mentor-education mt-1">{{ $coache->job_title }}</p>
                                    </div>
                                    <div class="col-sm-8 col-lg-7 p-0 text-right my-auto check-availaibility">
                                   
                                     @if(auth()->user())
                                    @if(auth()->user()->type_id == 4)
                                    <a href="#req-session{{$coache->id}}" data-toggle="modal">Schedule Session</a>
                                @endif @endif                                </div>
                                </div>
                                <div class="row mt-2 mobile-left-padding">
                                    <div class="col-lg-12 text-dark p-0 mentor-destination">
                                    {{ $coache->bio }}
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal -->
<div class="modal fade" id="req-session{{$coache->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Schedule Session</h5>
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body form-style">
      <form action="{{ route('sp_session.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
 
                <input type="text" name="user_type" value="3" style="display: none;" />
                <input type="text" name="users" value="{{$coache->id}}" style="display: none;" />
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

                        @foreach($coache->session as $s)
                    <option value="{{$s->id}}"  >{{$s->title}}</option>
                    @endforeach
        			</select>
        		</div>
                <div class="col-lg-12">
        			<label class="font-weight-bold">Suggested available session dates & times for this mentor </label>
        			<select name="session_time" class="w-100">
                    <option value=""></option>

        			</select>
        		</div>
        		<div class="col-sm-6 col-lg-6">
        			<label class="font-weight-bold">Date</label>
        			<input type="date" name="date" min="<?php echo date("Y-m-d"); ?>"  class="w-100" required>
        		</div>
        		<div class="col-sm-6 col-lg-6" id="datetimepicker3">
        			<label class="font-weight-bold">Time</label>
                     <input type="time" name="time" class="w-100" required>
        		</div>
                <div class="col-sm-8 col-lg-8 goal-field">
                <label class="font-weight-bold"> What are your objectives from this session?</label>
                    <div id="myRepeatingFields{{$coache->id}}">
                             <div class="entry{{$coache->id}} input-group col-xs-3">
                            <table class="table meeting-table class-table">

                                <input type="text" name="goal[]" class="w-100" maxlength="60"/>
                                <button type="button" class="btn btn-sm btn-add{{$coache->id}}">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true">+ Add an objective</span>
                                </button>

                                <span class="input-group-btn"> </span></table>
                            </div>
                        </div>
                        </div> 
        		<div class="col-sm-12 col-lg-12 text-center submit-btn">
        			<input type="reset" name="" value="Cancel" class="bg-white">
        			<input type="submit" name="" value="Save" class="bg-white">
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
                    @endforeach


                    <div align="center">
                     
            {{ $coaches->links() }}

         
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3 text-center">
                    <br>
                    <br>
                    <br>


                    <div class="filter-by">
                        <div class="card-header">
                            <h5>Filter by: </h5>
                        </div>
                        <div class="card-body">


                            <form class="form-horizontal" action="{{ route('coache.filter')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                               @csrf
                                 <div class="row">
                                    <div class="col-sm-12">
                                        <select name="industry" id="industry" class="form-control">
                                            <option value="">Industry</option>
                                            @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="country" id="country" class="form-control">
                                            <option value="">Country</option>
                                            @foreach($country as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                     </div>
                                    <div class="col-sm-12">
                                        <select name="city" id="city" class="form-control">
                                            <option value="">city</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12" id="datetimepicker3">

                                        <input type="date" name="date" class="form-control" placeholder="date" min="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-sm-12">

                                        <input type="time" class="form-control" placeholder="time">
                                    </div>

                                    <div class="col-sm-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">coaching Type</option>
                                            <option value="1">Personal Plans & Goals</option>
                                            <option value="2">Career & Business</option>
                                            <option value="3">Leadership & Execution</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" maxlength="60" name="title" placeholder="Keywords">
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="form-control btn-primary btn text-white" type="submit" name="submit" value="Filter">
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="Featured-Mentors">
                        <div class="card-header">

                            <h5>Featured Coaches</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                          @foreach($featured_coaches as $featured_coache)
                                <li class="feature-mentor mt-3" >
                                    <div class="post-thumb">
                                    @if(  $featured_coache->image )
                                    <img class="avater-cover" src="{{asset('/storage/users/'.$featured_coache->image)}}"   alt="{{$featured_coache->first_name}}">
                                    @else
                                   <img src="{{ url('/') }}/site/images/avatar.png" alt="cover" class="avater-cover"  >
                                   @endif
                                    </div>
                                    <div class="clear"></div>
                                    <div class="post-info">
                                        <a href="{{ route('coache.profile', $featured_coache->slug)}}">
                                        <h6>{{$featured_coache->first_name." ".$featured_coache->last_name }}</h6></a>
                                        <p class="mentor-education mt-1">{{$featured_coache->job_title}}</p>
                                    </div>

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="sessions-request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h6 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
                </div>
                <div class="modal-body form-style">
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle font-13 green-color font-weight-bold mb-3 d-block"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
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
                                            <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing
                                            </h6>
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
                                <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
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
                                            <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing
                                            </h6>
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
                                <a class="accordion-toggle font-13 green-color font-weight-bold d-block mb-3"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
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
                                            <h6 class="font-13 blue-color">Introduction to Types of Digital Content Writing
                                            </h6>
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


    <!-- Request a Session Modal window-->
    <div class="modal fade" id="req-session" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">REQUEST A SESSION</h5>
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button> -->
                </div>
                <div class="modal-body form-style">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="font-weight-bold">Select a Topic</label>
                                <select class="w-100 input-shadow">
                                    <option></option>
                                    <option></option>
                                </select>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <label class="font-weight-bold">Your Suggestion to the Mentor/Coach</label>
                            </div>
                            <div class="col-sm-6 col-lg-3" id="datetimepicker3">
                                <label class="font-weight-bold">Time</label>
                                <input type="time" class="w-100">
                            </div>
                            <div class="col-sm-6 col-lg-3" id="datetimepicker3">
                                <label class="font-weight-bold">Duration</label>
                                <select class="w-100">
                                    <option>00:00</option>
                                    <option>5:00</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-6 mb-0">
                                <label class="font-weight-bold">Date</label>
                                <input type="date" name="" class="w-100" min="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="col-sm-12 col-lg-12 text-center submit-btn">
                                <input type="reset" name="" value="Cancel" class="bg-white">
                                <input type="submit" name="" value="Book" class="bg-white">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
 <!--get cities-->
 <script>
    $(document).ready(function () {
        $('select[name="country"]').on('change', function () {
            var country = $(this).val();
            if (country) {
                $.ajax({
                    url: "{{ URL::to('get_cities') }}/" + country,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="city"]').empty();
                        $('select[name="city"]').append('<option selected disabled >Choose city</option>');
                        $.each(data, function (key, value) {
                            $('select[name="city"]').append('<option value="' + value + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@foreach ($coache1 as $w)
<script>
    $(function () {
        $(document)
            .on("click", ".btn-add{{$w->id}}", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFields{{$w->id}}:first"),
                    currentEntry = $(this).parents(".entry{{$w->id}}:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry{{$w->id}}:not(:last) .btn-add{{$w->id}}").removeClass("btn-add{{$w->id}}").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry{{$w->id}}:first").remove();
                return false;
            });
    });

    $(document).ready(function () {
        $('select[name="session"]').on('change', function () {
            var id = $(this).val();
            if (id) {
                $.ajax({
                    url: "{{ URL::to('get_session_times') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="session_time"]').empty();
                        $('select[name="session_time"]').append('<option selected disabled >Choose</option>');
                        $.each(data, function (key, value) {
                            $('select[name="session_time"]').append('<option value="' + value.id + '">' + value.date +'/' + value.time_from + '-' + value.time_to + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@endforeach
@endpush