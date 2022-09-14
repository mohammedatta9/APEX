
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

    <div class="page-banner search-coach apply-participate">
        <div class="mentor-searcg-wrapper">
            <span class="browse-mentor">Apply <br> Participate </span>
            <div class="space-bewteen"></div>
            <h1>Apply & Participate </h1>
            <p class="mt-3 mb-3">Enrich Your Resume & Turn Your Theoretical Knowledge into Real Experience<br>by applying to courses, projects, internships, and participating in seminars,<br>webinars, events, and workshops.</p>
                <form action="{{ route('service.search')}}" method="get" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                @csrf
                    <input type="text" name="title" placeholder="Enter keywords here..." style="color: #000;">
                    <input type="submit" name="" value="find" class="btn-style">
                </form>

        </div>
    </div>


    <section class="filter-mentor bg-white p-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-lg-9">
                    <br>
                    <br>
                    <br>
                    @foreach($services as $service)
                    <div class="mentor-row border-bottom pb-4">
                        <div class="row">
                            <div class="col-sm-2 col-lg-2 p-0 pr-1 text-center">
                            <a href="{{ route('details.service', $service->slug)}}">
                                @if($service->cover)
                                <img src="{{asset('/storage/services/'.$service->cover)}}" alt="service" class="mentor-pic">
                                    @else
                                <img src="{{ url('/') }}/site/images/stay.png" class="mentor-pic">
                                    @endif</a>      
                              </div>
                            <div class="col-sm-10 col-lg-10 pl-1">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-6 mobile-left-padding">
                                    <a href="{{ route('details.service', $service->slug)}}">
                                        <span class="mentor-title">{{$service->title}}</span></a>
                                        <p class="mentor-education mt-1">{{$service->name}}</p>
                                    </div>
                                    <div class="col-sm-8 col-lg-6 text-right my-auto check-availaibility mob-text-center">
                                        <a href="{{route('details.service', $service->slug)}}">Details</a>
                                    </div>
                                </div>
                                <div class="row mt-2 mobile-left-padding">
                                    <div class="col-lg-12 text-dark mentor-destination">
                                    {{$service->date_from}}
                                    </div>
                                    <div class="col-sm-10 col-lg-10 mt-2">
                                        <p>{{$service->about}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div align="center">
                       {{ $services->links() }}
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


                            <form class="form-horizontal" action="{{ route('service.filter')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                               @csrf
                                 <div class="row">
                                 <div class="col-sm-12">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Companies/Institutions</option>
                                            <option value="5">Companies</option>
                                            <option value="6">Institutions</option>
                                            <option value="">All</option>
                                        </select>
                                    </div>
                                 <div class="col-sm-12">
                                        <select name="industry" id="industry" class="form-control">
                                            <option value="">Industry</option>
                                            @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12">
                                        <select name="name" id="name" class="form-control">
                                            <option value="">Opportunity Type </option>

                                            <option value="internship">internship</option> 
                                            <option value="programe">programe</option>
                                            <option value="project">project</option>
                                            <option value="workshop">workshop</option>
                                            <option value="course">course</option>
                                            <option value="seminar">seminar </option>
                                            <option value="event">event</option>
                                            <option value="webinar">webinar</option>
                                         
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="date" id="date" class="form-control">
                                            <option value=""> Posting Time</option>
                                            <option value="1">New</option>
                                            <option value="2">This Week</option>
                                            <option value="3">This Month</option>
                                            <option value="">Older than Month</option>
 
                                        </select>
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
                    <h5>Featured Opportunities</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                          @foreach($featured_service as $featured_service)
                                <li class="feature-mentor mt-3" >
                                    <div class="post-thumb">
                                    <a href="{{ route('details.service', $featured_service->slug)}}">
                                    @if(  $featured_service->cover )
                                    <img class="avater-cover" src="{{asset('/storage/services/'.$featured_service->cover)}}" class="avater-cover"  alt="{{$featured_service->name}}">
                                    @else
                                   <img src="{{ url('/') }}/site/images/user.png" alt="cover" class="avater-cover"  >
                                   @endif</a>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="post-info">
                                        <a href="{{ route('details.service', $featured_service->slug)}}">
                                        <h6>{{$featured_service->title}}</h6></a>
                                        <p class="mentor-education mt-1">{{$featured_service->name}}</p>
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


@endsection