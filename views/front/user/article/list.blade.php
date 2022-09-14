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

<div class="bg-white d-flex align-items-center contact-col about-col position-relative articles-col">
	<div class="horizental-line"></div>
	<div class="mentor-searcg-wrapper">
		<h4>Articles</h4>
		<h1 style="font-size:3.5rem;">Telcca’s world of professionalism </h1>
		<form action="{{ route('article_search')}}" method="GET"   >
      @csrf
         <input type="text" name="title" placeholder="Enter your subject of interest here" maxlength="60" required>
         <input type="submit" name="" value="find" class="btn-style">
      </form>
	</div>
</div>

<section class="pt-0 bg-white blog-post">
	<div class="container">
		<div class="row">
         @foreach($posts as $post)
			<div class="col-sm-6 col-lg-6">
				<div class="col-lg-12 p-0">
					<div class="post-thunmbnail">
               @if($post->image)
                  <img src="{{asset('/storage/users/'.$post->image)}}" alt="{{$post->title}}">
                  @else
                  <img src="{{ url('/') }}/site/images/post-inner-pic.png" alt="post">
                  @endif
				     
				     <div class="post-date">{{$post->created_at->diffForHumans()}}</div>
				    </div>
				    <div class="post-exceprt text-center p-3">
					    <h6 class="mb-2">{{$post->title}}</h6>
					    <p>{{$post->sub_title}}</p>
					    <a  href="{{ route('article_profile', $post->slug)}}" class="read-more">Read More</a>
					</div>
				</div>
			</div>
		   @endforeach
</section>
@endsection
@push('js')

@endpush
