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

    <div class="page-banner community-bg">
        <div class="mentor-searcg-wrapper">
            <span class="browse-mentor">BROWSE <br> Community </span>
            <div class="space-bewteen"></div>
            <h1>Find a Community </h1>
            <p class="mt-3 mb-3">Whether you join or build a new community, we <br> all need some friends along the
                journey!</p>
                <form action="{{ route('community_search')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                @csrf
                    <input type="text" name="title" maxlength="60" placeholder="Enter Keywords here..." style="color: #000;">
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
                    
 @foreach($community as $c)
                    <div class="mentor-row border-bottom pb-4">
                        <div class="row">
                        <div class="col-sm-2 col-lg-2 p-0 pr-1 text-center">
                                <a href="{{ route('community.profile', $c->slug)}}" class="">
                                @if($c->image)
                                <img src="{{asset('/storage/users/'.$c->image)}}" alt="coache" class="mentor-pic">
                                    @else
                                <img src="{{ url('/') }}/site/images/stay.png" class="mentor-pic">
                                    @endif</a>
                            </div>
                            <div class="col-sm-10 col-lg-10 pl-1">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-6 mobile-left-padding">
                                    <a href="{{ route('community.profile', $c->slug)}}"><span class="mentor-title">{{$c->name}}</span></a>
                                        <p class="mentor-education mt-1">{{$c->industry->name}}</p>
                                    </div>

                                    <div class="col-sm-8 col-lg-6 text-right my-auto check-availaibility mob-text-center">
                                    <a href="{{ route('community.profile', $c->slug)}}">Details</a>
    
                                     
                                           
 
                                     </div>
                                </div>
                                <div class="row mt-2 mobile-left-padding">
                                    <div class="col-lg-12 mentor-destination">
                                        Public
                                    </div>
                                    <div class="col-sm-12 col-lg-11 mt-2">
                                        <p>{{$c->about}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach


                    <div align="center">
                        {{ $community->links() }}
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


                             <form class="form-horizontal" action="{{ route('community.filter')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                               @csrf
                                 <div class="row">
                                    <div class="col-sm-12">
                                        <select name="industry" id="industry" class="form-control">
                                            <option value="">category </option>
                                            @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     
 

                                    <div class="col-sm-12">
                                        <input class="form-control btn-primary btn text-white" type="submit" name="submit" value="Filter">
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
<div class="qw">
                    <h6 class="mb-5">Featured Communities</h6>
                    
                        @foreach($community1 as $c )                  
                  <a href="{{ route('community.profile', $c->slug)}}" class="asd">
                                @if($c->image)
                                <img src="{{asset('/storage/users/'.$c->image)}}" alt="coache"  style="max-width: 150px;" class="xcv" >
                                    @else
                                <img src="{{ url('/') }}/site/images/stay.png"  style="max-width: 150px;" class="xcv">
                                    @endif
                                    <h6 class="mt-3">{{$c->name}}</h6>                      
                    </a><br>
                 @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    

@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 
@endpush