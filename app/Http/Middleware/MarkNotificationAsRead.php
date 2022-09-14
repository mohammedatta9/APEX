<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class MarkNotificationAsRead
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       $user_id = $request->query('user_id');
       $notify_id = $request->query('notify_id');
       if($notify_id){

         $user = User::find($user_id);
         $notification =  $user->unreadnotifications()->find($notify_id);
         if($notification){
           $notification->markAsRead();
         }
       }
        return $next($request);
    }
}
