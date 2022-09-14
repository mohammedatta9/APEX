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
        .btn-circle {
        border-radius: 50px;
        text-align: center;
        border: none;
        color: #000;
        font-size: 12px;
        padding: 6px 7px;
        display: inline-block;
        margin: 0;
        overflow: hidden;
    }
    i.fa.fa-users {
    font-size: 13px;
    margin-right: 5px;
    color: #6e6a6add;
    }
    i.fa.fa-user {
    font-size: 13px;
    margin-right: 5px;
    color: #6e6a6add;
    }
        i.fa.fa-clock-o {
    font-size: 13px;
    margin-right: 5px;
    color: #6e6a6add;
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

    <div class="page-banner search-quiz">
        <div class="mentor-searcg-wrapper">
            <span class="browse-mentor">BROWSE <br> Quizzes</span>
            <div class="space-bewteen"></div>
            <h1>Test Your Abilities</h1>
            <p class="mt-3 mb-3">Check out our FREE Arabic & English collection of <br> quick and fun self-estimation
                tests, career and <br> personality quizzes, and online exercises designed by experts.</p>
                <form action="{{ route('quiz.search')}}" method="get" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                @csrf
                    <input type="text" name="title" placeholder="Enter Keywords here..." style="color: #000;">
                    <input type="submit" name="" value="find" class="btn-style">
                </form>

        </div>
    </div>


    <section class="filter-mentor bg-white">
        <div class="container">
            <div class="row">

                <div class="col-sm-9 col-lg-9">

                    @foreach($quizzes as $quiz)
                    <div class="mentor-row border-bottom pb-4">
                        <div class="row">
                            <div class="col-sm-2 col-lg-2 p-0 pr-1 text-center">
                                @if($quiz->image)
                                <img src="{{asset('/storage/users/'.$quiz->image)}}" alt="Quiz" class="mentor-pic">
                           @else
                           <img src="{{ url('/') }}/site/images/oppurtunity.png" alt="quizzes" class="mentor-pic">
                           @endif
                            </div>
                            <div class="col-sm-10 col-lg-10 pl-1">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-4 pl-0 mobile-left-padding">
                                        <span class="mentor-title"><a href="{{ route('quiz.view' , [$quiz->id]) }}">{{ $quiz->title }}</a></span>
                                        <p class="mentor-education mt-1">@if( $quiz->industry){{ $quiz->industry->name }} @endif</p>
                                    </div>
                                    <div class="col-sm-8 col-lg-8 p-0 text-center my-auto check-availaibility last-space">
                                        <span class="btn-circle"> <i class="fa fa-users" aria-hidden="true"></i>{{ $quiz->participants }} Participants </span>
                                        <span class="btn-circle"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $quiz->questions->count() }} min </span>
                                        <span class="btn-circle"> <i class="fa fa-user" aria-hidden="true"></i> By {{ $quiz->users->first_name }} </span>
                                        <a href="{{ route('quiz.view' , [$quiz->id]) }}">Start @if($quiz->type == 1) Quiz @elseif ($quiz->type == 2) Exercise @endif </a>
                                    </div>
                                </div>
                                <div class="row mt-2 mobile-left-padding">
                                   
                                    <div class="col-sm-12 col-lg-10 p-0 mt-2">
                                        <p>{{ $quiz->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div align="center">
                        {{ $quizzes->links() }}
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3 text-center">
                    <!-- <div class="schedule-meeting mb-5">
                        <a href="#sessions-request" data-toggle="modal">Schedule a Session</a>
                    </div> -->
                                        <div class="filter-by">
                        <div class="card-header">
                            <h5>Filter by: </h5>
                        </div>
                        <div class="card-body">


                        <form class="form-horizontal" action="{{ route('quizze.filter')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                               @csrf
                                 <div class="row">
                                 <div class="col-sm-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Quiz/Exercise</option>
                                            <option value="1">Quiz</option>
                                            <option value="2">Exercise</option>
                                           
                                        </select>
                                    </div>
                                 <div class="col-sm-12">
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Category</option>
                                            @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="skills" id="industry" class="form-control">
                                            <option value="">Skills</option>
                                            @foreach($skills as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
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
<div class="qw">
                    <h6 class="mb-5">Featured Quizzes</h6>
                    
                    @foreach($quizzes1 as $quiz)
                                <li class="feature-mentor mt-3" >
                                    <div class="post-thumb">
                                    <a href="{{ route('quiz.view' , [$quiz->id]) }}">
                                    @if(  $quiz->image )
                                    <img class="avater-cover" src="{{asset('/storage/users/'.$quiz->image)}}" class="avater-cover"  alt="{{$quiz->title}}">
                                    @else
                                   <img src="{{ url('/') }}/site/images/oppurtunity.png" alt="cover" class="avater-cover"  >
                                   @endif</a>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="post-info">
                                        <a href="{{ route('quiz.view' , [$quiz->id]) }}">
                                        <h6>{{$quiz->title}}</h6></a>
                                        <p class="mentor-education mt-1">{{ $quiz->participants }} Participants</p>
                                    </div>

                                </li>
                                @endforeach
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


@endsection