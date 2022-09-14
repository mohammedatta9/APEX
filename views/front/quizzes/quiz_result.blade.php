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
    <div class="row"  >
            <div class="col-sm-9 col-lg-9">
                <h5 class="pb-2">{{$result->title_quiz}}</h5>
                <h3 class="blue-color">Final Result /</h2><h1 style="font-size: 50px;"> {{$result->title}} </h1>
                    <br>
                     
                    <br>
                    @if( $result->image)
                    <img src=" {{ asset('storage/users/'. $result->image) }}" alt="image" class="w-100">
                    @endif
                    <br><br>
                    <div class="quiz-selction pt-1 pl-2 row verticle-input">
                        <div class="col-lg-12 pb-3 text-right">
                            <a  ><img src="{{ url('/') }}/site/images/share-icon.png" alt="icon"
                                    style="width: 100px;"></a>
                            <span class="border share-list-icon ml-3">
                                <a href="mailto:?subject= {{auth()->user()->email}} wants you to donate to this noble cause&body={{ url('/') }}/quiz/result/{{$result->id}} target="_blank""><img src="{{ url('/') }}/site/images/mail-share.png" alt="icon"></a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http://{{ url('/') }}/quiz/result/{{$result->id}}&display=popup" target="_blank"><img src="{{ url('/') }}/site/images/fb-share.png" alt="icon "></a>
                                <a href="https://twitter.com/intent/tweet?url={{ url('/') }}/quiz/result/{{$result->id}}" target="_blank"><img src="{{ url('/') }}/site/images/instagram-share.png" alt="icon"></a>
                                 <a href="https://api.whatsapp.com/send?text={{ url('/') }}/quiz/result/{{$result->id}}_blank" target="_blank"><img src="{{ url('/') }}/site/images/wtaspp-share.png" alt="icon"></a>
                             </span>
                             
                        </div>
                        <p>copy link : {{ url('/') }}/quiz/result/{{$result->id}}</p>
                        
                    </div>
            </div>
        </div>
         
 
 
    </div>
</section>

 


@endsection

@push('js')
<script>
 
</script>
@endpush