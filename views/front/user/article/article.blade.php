@extends('layouts.main') @section('content')

<style type="text/css">
   header{
   background-color: #0d1b26;
   color: #fff;
   padding: 10px 0;
   }
   .hide-element{
   display: none;
   }
   .notificaton-icon, .avater {
   display: inline-block;
   }

</style>
<!---------------- banner section --------------------->
 
@if(session()->has('message'))
      <div class="alert alert-success col-sm-2">
      <button type="button" class="close" data-dismiss="alert">×</button>    
          {{ session()->get('message') }}
      </div>
  @endif
  @if(session()->has('msg'))
      <div class="alert alert-warning col-sm-4">
      <button type="button" class="close" data-dismiss="alert">×</button>    
          {{ session()->get('msg') }}
      </div>
  @endif
  @if(session()->has('error'))
      <div class="alert alert-danger col-sm-4">
      <button type="button" class="close" data-dismiss="alert">×</button>    
          {{ session()->get('error') }}
      </div>
  @endif
<section class="bg-white">
    <div class="container">
   <div class="single-post-container text-center">
      <h1 class="mb-2 mb-5 font-reg">{{$post->title}}</h1>
      <p>{{$post->sub_title}}</p>
      <div class="avater-row">
         <div class="row">
            <div class="col-sm-7 col-lg-7 text-left d-flex align-items-center">
            @if($post->user->image )
            <img src="{{asset('/storage/users/'.$post->user->image)}}"   alt="{{$post->user->first_name }}"  class="avater-pic mr-3">
              @else
            <img src="{{ url('/') }}/site/images/user.png" alt="cover"  class="avater-pic mr-3" >
            @endif 
                <div>
                  <h6 class="avater-name">{{$post->user->first_name}} {{$post->user->last_name}}</h6>
                  <h6 class="published-date">Published   {{$post->created_at->diffForHumans()}}</h6>
               </div>
            </div>
             
         </div>
      </div>
      <div >
         <p>{{$post->text}}</p>
      </div>
   </div>
   <div  class="mt-3 mb-3 p-3">
   @if($post->image)
      <img src="{{asset('/storage/users/'.$post->image)}}" alt="{{$post->title}}">
      @else
      <img src="{{ url('/') }}/site/images/post-inner-pic.png" alt="post">
      @endif
   </div>
   <br>

   <hr>
   <br>

   <div class="single-post-container">
      <div class="comment-row border-bottom pb-3 mb-3">
         <div class="row">
            <div class="col-2 text-center pr-0">
               <img src="{{ url('/') }}/site/images/comment-person.png" alt="Comments" class="comment-person">
            </div>
            <div class="col-10 my-auto">
               <div class="row">
                  <div class="col col-lg-6">
                     <h6>Hans Down</h6>
                     <h6 class="published-date">09 APR 2018</h6>
                  </div>
                  <div class="col col-lg-6 text-right mobile-text-center">
                     <a href="#" class="reply-client">Reply</a>
                  </div>
               </div>
               <div class="comment-text mt-2">
                  Praesent ut fringilla ligula. Vivamus et lacus nec risus malesuada vestibulum. Phasellus lobortis viverra lobortis. Donec iaculis, erat eu bibendum faucibus.
               </div>
            </div>
         </div>
      </div>
      <div class="comment-row border-bottom pb-3 mb-3">
         <div class="row">
            <div class="col-2 text-center pr-0">
               <img src="{{ url('/') }}/site/images/comment-person.png" alt="Comments" class="comment-person">
            </div>
            <div class="col-10 my-auto">
               <div class="row">
                  <div class="col col-lg-6">
                     <h6>Hans Down</h6>
                     <h6 class="published-date">09 APR 2018</h6>
                  </div>
                  <div class="col col-lg-6 text-right mobile-text-center">
                     <a href="#" class="reply-client">Reply</a>
                  </div>
               </div>
               <div class="comment-text mt-2">
                  Praesent ut fringilla ligula. Vivamus et lacus nec risus malesuada vestibulum. Phasellus lobortis viverra lobortis. Donec iaculis, erat eu bibendum faucibus.
               </div>
            </div>
         </div>
         <div class="comment-row pl-4 mt-4 pb-3">
            <div class="row">
               <div class="col-2 text-center pr-0">
                  <img src="{{ url('/') }}/site/images/comment-person.png" alt="Comments" class="comment-person">
               </div>
               <div class="col-10 my-auto">
                  <div class="row">
                     <div class="col col-lg-6">
                        <h6>Hans Down</h6>
                        <h6 class="published-date">09 APR 2018</h6>
                     </div>
                     <div class="col col-lg-6 text-right mobile-text-center">
                        <a href="#" class="reply-client">Reply</a>
                     </div>
                  </div>
                  <div class="comment-text mt-2">
                     Praesent ut fringilla ligula. Vivamus et lacus nec risus malesuada vestibulum. Phasellus lobortis viverra lobortis. Donec iaculis, erat eu bibendum faucibus.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="comment-row border-bottom pb-3 mb-3">
         <div class="row">
            <div class="col-2 text-center pr-0">
               <img src="{{ url('/') }}/site/images/comment-person.png" alt="Comments" class="comment-person">
            </div>
            <div class="col-10 my-auto">
               <div class="row">
                  <div class="col col-lg-6">
                     <h6>Hans Down</h6>
                     <h6 class="published-date">09 APR 2018</h6>
                  </div>
                  <div class="col col-lg-6 text-right mobile-text-center">
                     <a href="#" class="reply-client">Reply</a>
                  </div>
               </div>
               <div class="comment-text mt-2">
                  Praesent ut fringilla ligula. Vivamus et lacus nec risus malesuada vestibulum. Phasellus lobortis viverra lobortis. Donec iaculis, erat eu bibendum faucibus.
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="single-post-container post-comment">
      <h4>Post a Comment</h4>
      <form class="mt-4">
         
         <label>Comment</label>
         <textarea class="col-lg-12" rows="5" placeholder="Your comment"></textarea>
         <div class="text-center mt-3">
            <input type="submit" name="" value="Submit">
         </div>
      </form>
   </div>
   </div>
</section>



@endsection
@push('js')

@endpush
