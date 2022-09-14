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

<section class="bg-white">
    <div class="min-container border-right">
    <form action="{{ route('quiz_result') }}" method="POST" enctype="multipart/form-data">
@csrf
    <input type="text" name="id" value="{{$quiz->id}}" style="display: none;" />
        @foreach($quiz->questions as $q)
        <div class="row" @if($quiz->type ==2) id="quiz-{{ $loop->iteration }}" @endif>
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">{{$quiz-> title }} @if($quiz->type == 1) Quiz @elseif ($quiz->type == 2) Exercise @endif/ <span class="blue-color">Question#{{ $loop->iteration }} of {{$quiz->questions->count() }}</span></h5>
                <div class="progress quiz-progress">
                 </div>
                 <br>
                <h4 class="pt-3 pb-4">{{ $q->title }}</h4>
                @if($q->image)
                <img src="{{asset('/storage/users/'.$q->image)}}" alt="quiz">
                @endif
                <!--<img src="images/placeholder-image.png" alt="image" class="w-100">-->
                <div class="quiz-selction pt-4 col-lg-12 pl-2 label-hover">
                     @foreach($q->question_options as $qq)
                     @if($qq->answer)
                    <label class="custom-radio border"><input type="radio" name="q[{{$q->id}}]" value="{{$qq->id}}"> {{ $qq->answer }} <span
                    class="checkmark"></span></label>
                    @endif
                    @endforeach
                    <input type="radio" name="q[{{$q->id}}]" value="2" checked="checked"  style="display: none;" >
                </div>
                @if($quiz->type ==2) 
                <div align="center" class="pt-4">
                @if($loop->iteration >= 2 )
                @if($loop->iteration !== $quiz->questions->count() )
                  <a href="#" class="btn-style next-btn prevoius-btn" id="prev-quiz{{$loop->iteration}}">Previous</a> 
                  @endif
                  @endif
                    @if($loop->iteration == $quiz->questions->count() )
                   <input  type="submit" name="" value="Finish" class="btn-style next-btn mt-5"  />  
                    @else
                    <a href="#" class="btn-style next-btn " id="next-quiz{{$loop->iteration + 1}}">Next</a>
                    @endif
                </div>
                @else
                <div align="center" class="pt-4">
                
                    @if($loop->iteration == $quiz->questions->count() )
                   <input  type="submit" name="" value="Finish" class="btn-style next-btn mt-5"  />  
                     
                    @endif
                </div>
                <br>
                @endif
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Notes</h6>
                    <p>{{ $q->notes }}</p>
                </div>
            </div>
        </div>
        @endforeach
</form>
        <!-- <div class="row" id="quiz-2">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#2</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <div class="pt-4 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div class="pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div class="pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">Name <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz2">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz3">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-3">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#3</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <div class="pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">True <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">False <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div class="pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">True <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">False <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div class="pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">True <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <label class="custom-radio">False <br> <input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                    </div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz3">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz4">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-4">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#4</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <div class="pt-3 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <input type="time" style="border: solid 1px #ccc;border-radius: 50px;padding: 0 15px;">
                    </div>
                </div>
                <div class="quiz-selction pt-3 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-sm-2 col-lg-2 text-center">
                        <input type="time" style="border: solid 1px #ccc;border-radius: 50px;padding: 0 15px;">
                    </div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz4">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz5">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-5">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#5</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <br><br>
                <div class="pl-2 row text-center black-white-btn position-relative">
                    <div class="col-6 pb-3 pr-0">
                        <a href="#" class="text-dark w-100 d-inline-block p-2">White</a>
                    </div>
                    <div class="col-6 pb-3 pl-0">
                        <a href="#" class="bg-dark text-white w-100 d-inline-block p-2">Black</a>
                    </div>
                    <div class="circle-middle"></div>
                </div>
                <div class="pl-2 row text-center black-white-btn position-relative">
                    <div class="col-6 pb-3 pr-0">
                        <a href="#" class="text-dark w-100 d-inline-block p-2">White</a>
                    </div>
                    <div class="col-6 pb-3 pl-0">
                        <a href="#" class="bg-dark text-white w-100 d-inline-block p-2">Black</a>
                    </div>
                    <div class="circle-middle"></div>
                </div>
                <div class="pl-2 row text-center black-white-btn position-relative">
                    <div class="col-6 pb-3 pr-0">
                        <a href="#" class="text-dark w-100 d-inline-block p-2">White</a>
                    </div>
                    <div class="col-6 pb-3 pl-0">
                        <a href="#" class="bg-dark text-white w-100 d-inline-block p-2">Black</a>
                    </div>
                    <div class="circle-middle"></div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz5">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz6">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-6">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#6</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <br><br>
                <div class="quiz-selction pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-lg-12 d-flex pb-3">
                        <label class="custom-radio mr-3 remove-hover"><input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                        Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
                        voluptates repudiandae sint et molestiae non recusandae.
                    </div>
                    <div class="col-lg-12 d-flex pb-3">
                        <label class="custom-radio mr-3 remove-hover"><input type="radio" name="radio"> <span
                                class="checkmark"></span></label>
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.
                    </div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz6">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz7">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-7">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-4">Exercise Name / <span class="blue-color">Q#7</span></h5>
                <div class="progress quiz-progress">
                    <div class="progress-bar" style="width:64%"></div>
                </div>
                <span class="font-12">Completed 64%</span>
                <br>
                <h4 class="pt-3 pb-4">The image below is a field image used for?</h4>
                <img src="images/placeholder-image.png" alt="image" class="w-100">
                <br><br>
                <div class="quiz-selction pt-1 pl-2 row verticle-input">
                    <div class="col-lg-12 pb-3">
                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                    </div>
                    <div class="col-lg-12 d-flex pb-3">
                        <div class="number-show">1.</div>
                        <div class="bg-dark pl-3 pr-3 pt-1 pb-1 text-white nbr-text">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex pb-3">
                        <div class="number-show">2.</div>
                        <div class="bg-dark pl-3 pr-3 pt-1 pb-1 text-white nbr-text">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex pb-3">
                        <div class="number-show">3.</div>
                        <div class="bg-dark pl-3 pr-3 pt-1 pb-1 text-white nbr-text">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.
                        </div>
                    </div>
                </div>
                <div align="center" class="pt-4">
                    <a href="#" class="btn-style next-btn prevoius-btn mr-3" id="prev-quiz7">Previous</a>
                    <a href="#" class="btn-style next-btn" id="next-quiz8">Next</a>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="hint-note p-3">
                    <h6 class="pb-2">Note</h6>
                    <p>Hints from coach or notes to explain the question</p>
                </div>
            </div>
        </div>
        <div class="row" id="quiz-8">
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-2">Exercise Name</h5>
                <h3 class="blue-color">Final Result </h2>
                    <br>
                    <div class="progress quiz-progress">
                        <div class="progress-bar" style="width:100%"></div>
                    </div>
                    <br>
                    <img src="images/placeholder-image.png" alt="image" class="w-100">
                    <br><br>
                    <div class="quiz-selction pt-1 pl-2 row verticle-input">
                        <div class="col-lg-12 pb-3 text-right">
                            <a href="#share-quiz" data-toggle="modal"><img src="images/share-icon.png" alt="icon"
                                    style="width: 100px;"></a>
                            <span class="border share-list-icon ml-3">
                                <a href=""><img src="images/mail-share.png" alt="icon"></a>
                                <a href=""><img src="images/fb-share.png" alt="icon"></a>
                                <a href=""><img src="images/instagram-share.png" alt="icon"></a>
                                <a href=""><img src="images/wtaspp-share.png" alt="icon"></a>
                                <a href=""><img src="images/person-share.png" alt="icon"></a>
                            </span>
                        </div>
                    </div>
            </div>
        </div> -->

    </div>
</section>

 


@endsection
@push('js')
<script>
 
</script>
@endpush