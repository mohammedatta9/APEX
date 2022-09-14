<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                <div class="text-left avatar-sub-menu">
 
                                    <ul id="session-notification">
                                    @foreach( $notification as $aa)
                                    <li> <a href="@if($aa->data['url']) {{$aa->data['url']}}?notify_id={{$aa->id}} && user_id={{Auth()->user()->id}} @endif">
                                        <p class="font-12"> {{$aa->data['title']}}</p>
                                            <p class="font-12"> @if($aa->unread())<strong>*</strong>@endif {{$aa->data['body']}} </p>
                                            </a>
                                        </li>
                                        @endforeach
                                        
                                    </ul>
                                </div>
                            </div>