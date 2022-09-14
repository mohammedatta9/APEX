@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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



        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }
        .clearfix:after,
        .textinputs:after {
            content: " ";
            display: table;
            clear: both;
        }

        .filters {
            padding: 5rem 2rem;
            background-color: #fff;
        }

        .filters .ui-slider-handle {
            width: 3rem;
            height: 3rem;
            top: -1.2rem;
            border: 0.6rem solid #fc047c;
            border-radius: 50%;
            -webkit-transform: translateX(-0.9rem);
            transform: translateX(-0.9rem);
        }

        .filters .ui-slider-handle:focus,
        .filters .ui-slider-handle:active {
            outline: none;
            background: #fff;
        }

        .controls #price-range {
            border: none;
            background: #bfbfbf;
            border-radius: 0;
        }

        .controls #price-range .ui-slider-range {
            background: #0059fc;
        }

        .textinputs {
            padding: 1.5rem 0;
        }

        .textinputs input {
            width: 4rem;
            display: block;
            float: left;
        }

        .textinputs input:last-child {
            float: right;
        }

    </style>

    <!---------------- banner section --------------------->

    <div class="page-banner">
        <div class="mentor-searcg-wrapper">
            <span class="browse-mentor">BROWSE <br>Mentor <br> </span>
            <div class="space-bewteen"></div>
            <h1>Find your Mentor </h1>
            <p class="mt-3 mb-3">
                Mentors are individuals with impressive knowledge and experience.<br> Always
                ready to provide their practical and superior help to others.
                <br/>
                Find your perfect mentor match and let’s start your success journey.
            </p>
                <form action="{{ route('mentor.search')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
                @csrf
                    <input type="text" maxlength="60" name="title" placeholder="Enter Keywords here..." style="color: #000;" >
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
                    <br>
                     @if(session()->has('message'))<br>
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
                    @foreach($mentors as $mentor)
                    <div class="mentor-row border-bottom pb-4">
                        <div class="row">
                            <div class="col-sm-2 col-lg-2 p-0 pr-1 text-center">
                                @if($mentor->slug)
                                <a href="@if(auth()->user()->id == $mentor->id ) /profile @else {{ route('mentor.profile', $mentor->slug)}} @endif">
                                    @endif
                                @if($mentor->image)
                                <img src="{{asset('/storage/users/'.$mentor->image)}}" alt="mentor" class="mentor-pic">
                                    @else
                                <img src="{{ url('/') }}/site/images/avatar.png" class="mentor-pic">
                                    @endif</a>
                            </div>
                            <div class="col-sm-10 col-lg-10 pl-1">
                                <div class="row">
                                    <div class="col-sm-4 col-lg-5 pl-0 mobile-left-padding">
                                        @if($mentor->slug)
                                        <a href="@if(auth()->user()->id == $mentor->id ) /profile @else {{ route('mentor.profile', $mentor->slug)}} @endif">
                                            @endif
                                        <span class="mentor-title">{{ $mentor->first_name." ".$mentor->last_name }}</span></a>
                                        <p class="mentor-education mt-1">{{ $mentor->job_title }}</p>
                                    </div>
                                    <div class="col-sm-8 col-lg-7 p-0 text-right my-auto check-availaibility">
                                   
                                    @if(auth()->user())
                                    @if(auth()->user()->type_id == 4)
                                    <a href="#req-session{{$mentor->id}}" data-toggle="modal">Schedule Session</a>
                                @endif @endif                                </div>
                                </div>
                                <div class="row mt-2 mobile-left-padding">
                                    <div class="col-lg-12 text-dark p-0 mentor-destination">
                                    {{ $mentor->bio }}
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
<div class="modal fade" id="req-session{{$mentor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" name="users" value="{{$mentor->id}}" style="display: none;" />
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

                        @foreach( $mentor->session as $s)
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
        			<input type="date" name="date"  min="<?php echo date("Y-m-d"); ?>" class="w-100" required>
        		</div>
        		<div class="col-sm-6 col-lg-6" id="datetimepicker3">
        			<label class="font-weight-bold">Time</label>
                     <input type="time" name="time" class="w-100" required>
        		</div> 
                <div class="col-sm-8 col-lg-8 goal-field">
                <label class="font-weight-bold"> What are your objectives from this session?</label>
                    <div id="myRepeatingFields{{$mentor->id}}">
                             <div class="entry{{$mentor->id}} input-group col-xs-3">
                            <table class="table meeting-table class-table">

                                <input type="text" name="goal[]" class="w-100" maxlength="60" />
                                <button type="button" class="btn btn-sm btn-add{{$mentor->id}}">
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
                    @endforeach


                    <div align="center">
                         {{ $mentors->links() }} 
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


                            <form class="form-horizontal" action="{{ route('mentor.filter')}}" method="GET" class="col-sm-6 col-lg-6 mr-3 mb-3" >
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
{{--                                    <div class="col-sm-12">--}}
{{--                                        <select name="country" id="country" class="form-control">--}}
{{--                                            <option value="">Country</option>--}}
{{--                                            @foreach($country as $country)--}}
{{--                                                <option value="{{ $country->name }}">{{ $country->name }}</option>--}}
{{--                                            @endforeach--}}

{{--                                        </select>--}}
{{--                                     </div>--}}
{{--                                    <div class="col-sm-12">--}}
{{--                                        <select name="city" id="city" class="form-control">--}}
{{--                                            <option value="">city</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                    <div class="col-sm-12" id="datetimepicker3">

                                        <input type="date" name="date" class="form-control" placeholder="date" min="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                    <div class="col-sm-12">

                                        <input type="time" class="form-control" placeholder="time">
                                    </div>

                                    <div class="col-sm-12">
                                        <select name="skills" id="skills" class="form-control">
                                            <option value="">Skills</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="language" id="language" class="form-control">
                                            <option value="">Language</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="rate" id="rate" class="form-control">
                                            <option value="">Review Rate</option>
                                            <option value="">5 Stars (Guru)</option>
                                            <option value="">4 Stars (Master)</option>
                                            <option value="">3 Stars (Expert)</option>
                                            <option value="">2 Stars (Leader)</option>
                                            <option value="">1 Star (Enthusiast)</option>

                                        </select>
                                    </div>
                                     <div class="col-sm-12">
                                         <select id="languages" name="languages" class="form-control">
                                             <option>Select Language</option>
                                             <option value="af">Afrikaans</option>
                                             <option value="sq">Albanian - shqip</option>
                                             <option value="am">Amharic - አማርኛ</option>
                                             <option value="ar">Arabic - العربية</option>
                                             <option value="an">Aragonese - aragonés</option>
                                             <option value="hy">Armenian - հայերեն</option>
                                             <option value="ast">Asturian - asturianu</option>
                                             <option value="az">Azerbaijani - azərbaycan dili</option>
                                             <option value="eu">Basque - euskara</option>
                                             <option value="be">Belarusian - беларуская</option>
                                             <option value="bn">Bengali - বাংলা</option>
                                             <option value="bs">Bosnian - bosanski</option>
                                             <option value="br">Breton - brezhoneg</option>
                                             <option value="bg">Bulgarian - български</option>
                                             <option value="ca">Catalan - català</option>
                                             <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                             <option value="zh">Chinese - 中文</option>
                                             <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                             <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                             <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                             <option value="co">Corsican</option>
                                             <option value="hr">Croatian - hrvatski</option>
                                             <option value="cs">Czech - čeština</option>
                                             <option value="da">Danish - dansk</option>
                                             <option value="nl">Dutch - Nederlands</option>
                                             <option value="en">English</option>
                                             <option value="en-AU">English (Australia)</option>
                                             <option value="en-CA">English (Canada)</option>
                                             <option value="en-IN">English (India)</option>
                                             <option value="en-NZ">English (New Zealand)</option>
                                             <option value="en-ZA">English (South Africa)</option>
                                             <option value="en-GB">English (United Kingdom)</option>
                                             <option value="en-US">English (United States)</option>
                                             <option value="eo">Esperanto - esperanto</option>
                                             <option value="et">Estonian - eesti</option>
                                             <option value="fo">Faroese - føroyskt</option>
                                             <option value="fil">Filipino</option>
                                             <option value="fi">Finnish - suomi</option>
                                             <option value="fr">French - français</option>
                                             <option value="fr-CA">French (Canada) - français (Canada)</option>
                                             <option value="fr-FR">French (France) - français (France)</option>
                                             <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                             <option value="gl">Galician - galego</option>
                                             <option value="ka">Georgian - ქართული</option>
                                             <option value="de">German - Deutsch</option>
                                             <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                             <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                             <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                             <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                             <option value="el">Greek - Ελληνικά</option>
                                             <option value="gn">Guarani</option>
                                             <option value="gu">Gujarati - ગુજરાતી</option>
                                             <option value="ha">Hausa</option>
                                             <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                             <option value="he">Hebrew - עברית</option>
                                             <option value="hi">Hindi - हिन्दी</option>
                                             <option value="hu">Hungarian - magyar</option>
                                             <option value="is">Icelandic - íslenska</option>
                                             <option value="id">Indonesian - Indonesia</option>
                                             <option value="ia">Interlingua</option>
                                             <option value="ga">Irish - Gaeilge</option>
                                             <option value="it">Italian - italiano</option>
                                             <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                             <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                             <option value="ja">Japanese - 日本語</option>
                                             <option value="kn">Kannada - ಕನ್ನಡ</option>
                                             <option value="kk">Kazakh - қазақ тілі</option>
                                             <option value="km">Khmer - ខ្មែរ</option>
                                             <option value="ko">Korean - 한국어</option>
                                             <option value="ku">Kurdish - Kurdî</option>
                                             <option value="ky">Kyrgyz - кыргызча</option>
                                             <option value="lo">Lao - ລາວ</option>
                                             <option value="la">Latin</option>
                                             <option value="lv">Latvian - latviešu</option>
                                             <option value="ln">Lingala - lingála</option>
                                             <option value="lt">Lithuanian - lietuvių</option>
                                             <option value="mk">Macedonian - македонски</option>
                                             <option value="ms">Malay - Bahasa Melayu</option>
                                             <option value="ml">Malayalam - മലയാളം</option>
                                             <option value="mt">Maltese - Malti</option>
                                             <option value="mr">Marathi - मराठी</option>
                                             <option value="mn">Mongolian - монгол</option>
                                             <option value="ne">Nepali - नेपाली</option>
                                             <option value="no">Norwegian - norsk</option>
                                             <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                             <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                             <option value="oc">Occitan</option>
                                             <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                             <option value="om">Oromo - Oromoo</option>
                                             <option value="ps">Pashto - پښتو</option>
                                             <option value="fa">Persian - فارسی</option>
                                             <option value="pl">Polish - polski</option>
                                             <option value="pt">Portuguese - português</option>
                                             <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                             <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                             <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                             <option value="qu">Quechua</option>
                                             <option value="ro">Romanian - română</option>
                                             <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                             <option value="rm">Romansh - rumantsch</option>
                                             <option value="ru">Russian - русский</option>
                                             <option value="gd">Scottish Gaelic</option>
                                             <option value="sr">Serbian - српски</option>
                                             <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                             <option value="sn">Shona - chiShona</option>
                                             <option value="sd">Sindhi</option>
                                             <option value="si">Sinhala - සිංහල</option>
                                             <option value="sk">Slovak - slovenčina</option>
                                             <option value="sl">Slovenian - slovenščina</option>
                                             <option value="so">Somali - Soomaali</option>
                                             <option value="st">Southern Sotho</option>
                                             <option value="es">Spanish - español</option>
                                             <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                             <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                             <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                             <option value="es-ES">Spanish (Spain) - español (España)</option>
                                             <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                             <option value="su">Sundanese</option>
                                             <option value="sw">Swahili - Kiswahili</option>
                                             <option value="sv">Swedish - svenska</option>
                                             <option value="tg">Tajik - тоҷикӣ</option>
                                             <option value="ta">Tamil - தமிழ்</option>
                                             <option value="tt">Tatar</option>
                                             <option value="te">Telugu - తెలుగు</option>
                                             <option value="th">Thai - ไทย</option>
                                             <option value="ti">Tigrinya - ትግርኛ</option>
                                             <option value="to">Tongan - lea fakatonga</option>
                                             <option value="tr">Turkish - Türkçe</option>
                                             <option value="tk">Turkmen</option>
                                             <option value="tw">Twi</option>
                                             <option value="uk">Ukrainian - українська</option>
                                             <option value="ur">Urdu - اردو</option>
                                             <option value="ug">Uyghur</option>
                                             <option value="uz">Uzbek - o‘zbek</option>
                                             <option value="vi">Vietnamese - Tiếng Việt</option>
                                             <option value="wa">Walloon - wa</option>
                                             <option value="cy">Welsh - Cymraeg</option>
                                             <option value="fy">Western Frisian</option>
                                             <option value="xh">Xhosa</option>
                                             <option value="yi">Yiddish</option>
                                             <option value="yo">Yoruba - Èdè Yorùbá</option>
                                             <option value="zu">Zulu - isiZulu</option>
                                         </select>

                                     </div>

{{--                                    <div class="col-sm-12">--}}
{{--                                        <select name="type" id="type" class="form-control">--}}
{{--                                            <option value="">coaching Type</option>--}}
{{--                                            <option value="1">Personal Plans & Goals</option>--}}
{{--                                            <option value="2">Career & Business</option>--}}
{{--                                            <option value="3">Leadership & Execution</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                    <div class="col-sm-12">


                                                            <div id="price-range"></div>
                                                            <div class="textinputs">
                                                                <input id="price-min" type="text" value="0"/>
                                                                <input id="price-max" type="text" value="1000" />
                                                            </div>

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

                            <h5>Featured Mentors</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                            @foreach($featured_mentors as $featured_mentor)
                                <li class="feature-mentor mt-3" >
                                    <div class="post-thumb">
                                    @if(  $featured_mentor->image )
                                    <img class="avater-cover" src="{{asset('/storage/users/'.$featured_mentor->image)}}"   alt="{{$featured_mentor->first_name}}">
                                    @else
                                   <img src="{{ url('/') }}/site/images/avatar.png" alt="cover" class="avater-cover"  >
                                   @endif
                                    </div>
                                    <div class="clear"></div>
                                    <div class="post-info">
                                        @if($featured_mentor->slug)
                                        <a href="@if(auth()->user()->id == $mentor->id ) /profile @else {{ route('mentor.profile', $mentor->slug)}} @endif">@endif
                                        <h6>{{$featured_mentor->first_name." ".$featured_mentor->last_name }}</h6></a>
                                        <p class="mentor-education mt-1">{{$featured_mentor->job_title}}</p>
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

    <script>
        $( function() {
            $('#price-range').slider({
                range: true,
                min: 0,
                max: 9000,
                values: [0, 9000],
                slide: function(event, ui) {
                    $('#price-min').val(ui.values[0]);
                    $('#price-max').val(ui.values[1]);
                }
            });
        });

        $('#price-min').change(function(event) {
            var minValue = $('#price-min').val();
            var maxValue = $('#price-max').val();
            if ( minValue <= maxValue) {
                $('#price-range').slider("values", 0, minValue);
            } else {
                $('#price-range').slider("values", 0, maxValue);
                $('#price-min').val(maxValue);
            }
        });
        // This isn't very DRY but it's just for demo purpose... oh well.
        $('#price-max').change(function(event) {
            var minValue = $('#price-min').val();
            var maxValue = $('#price-max').val();
            if ( maxValue >= minValue) {
                $('#price-range').slider("values", 1, maxValue);
            } else {
                $('#price-range').slider("values", 1, minValue);
                $('#price-max').val(minValue);
            }
        });


    </script>

@foreach ($mentor1 as $w)
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

    function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;

        if (r1 < x2 || x1 > r2) return false;
        return true;

    }

    // // slider call


</script>
@endforeach
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
                        $('select[name="city"]').append('<option selected disabled value="" >Choose city</option>');
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
@endpush