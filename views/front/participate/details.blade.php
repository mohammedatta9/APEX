@extends('layouts.main')

@section('content')


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

        .col-sm-12.col-lg-12.order-one.pt-5 {
            text-align: left;
        }

        h2.blue-color.mt-3.mb-3.pt-2 {
            font-size: 23px;
        }

        .col-sm-12.col-lg-12.order-one.pt-5 h3 {
            font-size: 21px;
        }

        ul.user-information.text-center {
            border: solid 1px #Ddd;
            width: 100%;
            text-align: left !important;
            padding: 26px;
            border-radius: 10px;
        }

        .border-data-user-information {
            border-bottom: solid 1px #ddd;
            margin-bottom: 13px;
        }

        span.span-data-user {
            margin-left: 25px;
        }

    </style>

    <!---------------- user banner section --------------------->

    <!--<div class="user-banner-section">-->
    <!--    <img src="{{ url('/') }}/site/images/profile-3.png" alt="banner">-->
    <!--</div>-->


    <section class="bg-white pt-0 user-profle-main move-right">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-9">
                    <div class="row text-center">

                        <div class="col-sm-12 col-lg-12 order-one pt-5">
                            <h3>By @if( $user->type_id == 2)<a href="{{ route('mentor.profile', $user->slug)}}">
                                    @elseif( $user->type_id ==3)<a href="{{ route('coache.profile', $user->slug)}}">
                                        @else <a href="{{ route('company.profile', $user->slug)}}"> @endif
                                            {{ $user->first_name." ".$user->last_name }}</a></h3>
                            <h2 class="blue-color mt-3 mb-3 pt-2">{{$service->title}}</h2>
                            <b>{{$service->name}}</b><br>
                        </div>
                        <div class="col-sm-12 col-lg-12 order-two">
                            <ul class="user-information text-center">
                                @foreach($sd_time as $sd_time)
                                    <div class="border-data-user-information">
                                        <b> meeting #{{ $loop->iteration }}</b>
                                        <span class="span-data-user">{{$sd_time->date}} </span>
                                    </div>

                                    <div class="border-data-user-information">
                                        <b>Time (UAE) :</b>
                                        <span class="span-data-user">@if($sd_time->time_from){{$sd_time->time_from}}
                                            to @endif {{$sd_time->time_to}} </span>
                                    </div>
                                @endforeach
                                @if($service->date_from)
                                    <div class="border-data-user-information">
                                        <b> meeting</b>
                                        <span class="span-data-user">  {{$service->date_from}}@if($service->date_to)
                                                to {{$service->date_to}}  @endif  </span>
                                    </div>

                                    <div class="border-data-user-information">
                                        <b>Time (UAE) :</b>
                                        <span class="span-data-user">@if($service->time_from){{$service->time_from}}
                                            to @endif {{$service->time_to}} </span>
                                    </div>
                                @endif

                                @if($service->deadline)
                                    <div class="border-data-user-information">
                                        <b>Enroll deadline</b>
                                        <span class="span-data-user"> {{$service->deadline}} </span>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="newly-added mt-3">
                        <h6 class="text-left mb-2 pb-2">About</h6>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <p>{{$service->about}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="newly-added mt-3">
                        <h6 class="text-left mb-2 pb-2">Other Notes </h6>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                {{$service->notes}}
                            </div>
                        </div>
                    </div>
                    <div class="newly-added mt-3">
                        <h6 class="text-left mb-2 pb-2">Location </h6>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 skills-col">
                                {{$service->address}}
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-sm-3 col-lg-3 user-profile-sidebar pt-5">
                    <div class="alert alert-success" id="success_msg" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        Done!
                    </div>
                    <h4 class="green-color mt-3">Fees : {{$service->ticket_fees}}</h4>
                    <div class="schedule-meeting"> 
                    @if(auth()->user())
                      @if(auth()->user()->type_id == 4 )
                        @if($user->type_id == 2 || $user->type_id == 3)
                            <a href="#participate" id='participatea' data-toggle="modal">PAY AND PARTICIPATE</a>
                        @endif
                        @if($user->type_id == 5 || $user->type_id == 6)
                        @if($service->have_link == 1)
                        <a href="#participate" id='participatea' data-toggle="modal">PAY AND PARTICIPATE</a>
                        @else
                            <a href="{{$service->link}}">Register Link</a>
                        @endif
                        @endif
                        @endif
                        @endif
                    </div>
                    <div class="Featured-Mentors">
                        <div class="card-header">
                            <h5>Other Apply / Participate</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach($other_services as $other_service)
                                    <li class="feature-mentor mt-3">
                                        <div class="post-thumb">
                                            <a href="{{ route('details.service', $other_service->id)}}">
                                                @if(  $other_service->cover )
                                                    <img class="avater-cover"
                                                         src="{{asset('/storage/services/'.$other_service->cover)}}"
                                                         class="avater-cover" alt="{{$other_service->name}}">
                                                @else
                                                    <img src="{{ url('/') }}/site/images/user.png" alt="cover"
                                                         class="avater-cover">
                                                @endif</a>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="post-info">
                                            <a href="{{ route('details.service', $other_service->id)}}">
                                                <h6>{{$other_service->title}}</h6></a>
                                            <p class="mentor-education mt-1">{{$other_service->name}}</p>
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
    <div class="modal fade" id="participate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel">Sessions Request</h5>
                </div>
                <div class="modal-body form-style">
                    <div class="accordion" id="accordion2">

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle font-20 green-color font-weight-bold mb-3 d-block "
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    Pay from wallet
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse show">
                                <div class="accordion-inner">
                                    <div class="row font-20">
                                        <div class="col-sm-8 col-lg-8 green-color font-weight-bold mb-2">
                                            @if(auth()->user())
                                                <h6 class="font-20">wallet ammont : {{auth()->user()->wallet}} AED</h6>

                                                <form id="payForm" action="">
                                                    @csrf
                                                    <input type="text" name="id" value="{{$service->id}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="session_by" value="{{$user->id}}"
                                                           style="display: none;"/>
                                                        <input type="text" name="type" value="{{$service->name}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="title" value="{{$service->title}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="about" value="{{$service->about}}"
                                                           style="display: none;"/>
                                                           @if($service->date_from)
                                                           <input type="text" name="session_date" value="{{$service->date_from}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="start_time" value="{{$service->time_from}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="end_time" value="{{$service->time_to}}"
                                                           style="display: none;"/>
                                                           @else
                                                           @foreach($sd_time as $sd_time)
                                                            <input type="text" name="session_date" value="{{$sd_time->date}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="start_time" value="{{$sd_time->time_from}}"
                                                           style="display: none;"/>
                                                           <input type="text" name="end_time" value="{{$sd_time->time_to}}"
                                                           style="display: none;"/>
                                                           @if($loop->iteration == 1) @break @endif
                                                            @endforeach
                                                           
                                                           @endif
                                                           
                                                    <div class="col-sm-12 col-lg-12  submit-btn">
                                                        @if(auth()->user()->wallet >= $service->ticket_fees)
                                                            <input id="pay_from_wallet" type="button" name=""
                                                                   value="Pay & participate" class="bg-white"/>
                                                        @else
                                                            <input id=" " type="button" name="" value=" "/>
                                                        @endif
                                                    </div>
                                                </form>
                                            @endif
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle font-20 green-color font-weight-bold mb-3 d-block"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    Pay by credet card
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

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="req-session" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Request a SESSION</h5>
                        <!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                            <div class="col-sm-6 col-lg-6">
                                <label class="font-weight-bold">Your Suggestion to the Mentor/Coach</label>
                                <input type="text" name="" class="w-100">
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
                                <input type="date" name="" class="w-100">
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
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", "#pay_from_wallet", function (e) {
            e.preventDefault();
            var formData = new FormData($("#payForm")[0]);
            $.ajax({
                type: "post",
                enctype: "multipart/form-data",
                url: "{{route('pay_participate_w')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    
                    jQuery.noConflict();
                    $("#participate").modal("toggle");
                    $('.modal-backdrop').hide();
                flashBox('success');

                },
                error: function (reject) {
                },
            });
        });
    </script>
@endpush