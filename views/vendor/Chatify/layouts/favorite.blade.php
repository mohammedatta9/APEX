<div class="favorite-list-item">
    <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m">
        @if(  $user->image )
      <img  class="avater-cover user_image" src="{{asset('/storage/users/'.$user->image)}}" alt="{{$user->first_name}}">
      @else
     <img class="user_image" src="{{ url('/') }}/site/images/avatar.png" alt="cover">
      @endif
    </div>
    <p>{{ strlen($user->first_name) > 5 ? substr($user->first_name,0,6).'..' : $user->first_name }}</p>
</div>
