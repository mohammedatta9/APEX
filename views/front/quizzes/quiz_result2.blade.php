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
                <h3 class="blue-color">Final Result /  </h2><h1 style="font-size: 50px;"> {{$result->title}}</h1>
                <h5 class="pb-2">{{$result->user->first_name}} {{$result->user->last_name}}</h5>

                    <br>
                     
                    <br>
                    @if( $result->image)
                    <img src=" {{ asset('storage/users/'. $result->image) }}" alt="image" class="w-100">
                    @endif
                    <br><br>
                    
            </div>
        </div>
         
 
 
    </div>
</section>

 


@endsection

@push('js')
<script>
 
</script>
@endpush