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

</style>

<!---------------- section --------------------->
<div class="breadcrumb-bar">
    <div class="container"><div class="row align-items-center"><div class="col-md-12 col-12"><nav aria-label="breadcrumb" class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/template1/" class="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quizzes</li>
            </ol></nav><h2 class="breadcrumb-title">@if($quiz->type == 1) Quiz @elseif ($quiz->type == 2) Exercise @endif view</h2>
            </div>
            </div>
            </div>
            </div>
            
<section class="bg-white">
    <div class="container">
        <div class="row">
        <div class="col-sm-2 col-lg-2">
        </div>
            <div class="col-sm-7 col-lg-7">
                <div class="col-lg-12 border p-0 h-100">
                    @if($quiz->image != "")
                    <div class="session-video">
                        <img src="{{asset('/storage/users/'.$quiz->image)}}" alt="quiz">
                    </div>
                    @endif
                    <div class="row p-4">
                        <div class="col-sm-2 col-lg-2 text-center">
                            <img src="{{asset('/storage/users/'.@$quiz->users->image)}}" alt="session person" class="session-person">
                        </div>
                        <div class="col-sm-10 col-lg-10 my-auto mob-text-center">
                            <h6>{{ $quiz->title }}</h6>
                            <p class="font-13 font-weight-bold">by {{ $quiz->users->first_name." ".$quiz->users->first_name }}</p>
                            <p class="font-13 font-weight-bold">@if( $quiz->industry){{ $quiz->industry->name }}@endif</p>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <p>{{ $quiz->description }}</p>
                        </div>
                    </div>
                    <div class="row pl-4 pr-4 pb-4 pt-1">
                        <div class="col-lg-12">
                            <h6>Targeted Skills & Knowledge</h6>
                           
                            <div class="skill-set">
                            @foreach($skills as $skill)
                                <a href="#">{{ $skill->skill->name }}</a>
                                @endforeach
                            </div>
                           
                        </div>
                    </div>
                    <!-- <hr> -->
                    <!-- <div class="row pl-4 pr-4 pb-4 pt-1">
                        <div class="col-sm-12 col-lg-6">
                            <h6 class="pb-3">Notes</h6>
                            <p>{{ $quiz->notes }}</p>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="col-lg-12 border pb-4">
                    <ul class="industry-spec pr-0">
                         
                        <li>Number of Participants <span>{{ $quiz->participants }}</span></li>
                        <li>Duration <span>@if($quiz->questions) {{ $quiz->questions->count() }} min @endif</span></li>
                        <li>Publishing Date <span>{{ $quiz->created_at->format('y-m-d') }}</span></li>
                    </ul>
                    <div class="schedule-meeting">
                        <a href="{{ route('quiz.start' , [$quiz->id]) }}" class="mt-4">Start</a>
                        <a href="{{ route('quizzes') }}">Back to Search Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection