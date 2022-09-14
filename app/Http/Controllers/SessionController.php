<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Session_plan;
use App\Models\User; 
use App\Models\User_skill;
use App\Models\Industry;
use App\Models\Sp_session;
use App\Notifications\RefuserRequest;
use App\Models\Sp_session_goal;
use App\Models\Student_session;
use App\Notifications\NewSession;
use Illuminate\Support\Facades\Notification;

use App\Models\Session_time;

class SessionController extends Controller
{
    public function session_store(Request $request)
    {
          
    $request->validate([
        'title' => 'required',
                         
      ]);

           $session = new Session();

           $session->title =  $request->title;
           $session->user_id = auth()->user()->id;
         
           $session->save();
          
           $date = $request->date;
           $time_from = $request->time_from;
           $time_to = $request->time_to;

           for($i = 0; $i < count($date); $i++){
               
            $session_time =new Session_time();
            $session_time->session_id = $session->id;
            $session_time->date = date("Y-m-d H:i:s" , strtotime($date[$i])) ;
            $session_time->time_from = date("H:i:s" , strtotime($time_from[$i]));
            $session_time->time_to =  date("H:i:s" , strtotime($time_to[$i])) ;

            $session_time->save();

        }


        if ($session){
        notify()->success('');

        return response()->json([
            'status' => true,
            'msg' => 'successfully',
        ]);
    }
    else{
        notify()->error('');
        return response()->json([
            'status' => false,
            'msg' => 'error',
        ]);   
    }


 }

 public function session_edit(Request $request)
 {

     $request->validate([
         'title' => 'required',
       ]);

        $session = Session::find($request->id);

        $session->title =  $request->title;
        
       $session->save();

         $date = $request->date;
         $time_from = $request->time_from;
         $time_to = $request->time_to;

         for($i = 0; $i < count($date); $i++){
             
          $s_time =new Session_time();
          $s_time->session_id = $request->id;
          $s_time->date = date("Y-m-d H:i:s" , strtotime($date[$i])) ;
          $s_time->time_from = date("H:i:s" , strtotime($time_from[$i]));
          $s_time->time_to =  date("H:i:s" , strtotime($time_to[$i])) ;

          $s_time->save();
         }
    
        
         if ($session){
            notify()->success('');
            return response()->json([
                'status' => true,
                'msg' => 'successfully',
            ]);
         }
        

     else{
        notify()->error('');
        return response()->json([
            'status' => false,
            'msg' => 'error',
        ]);  
     }
  
    }


                    

public function session_delete(Request $request)
{
 
    $session = Session::findOrFail($request->id);
 
      if ($session){
        $session->delete();
        notify()->success('');
        return response()->json([
            'status' => true,
            'msg' => 'successfully',
        ]);
     }
    

 else{
    notify()->error('');
    return response()->json([
        'status' => false,
        'msg' => 'error',
    ]);  
 }

}  
                   
  
public function session_time_delete(Request $request)
{
 
     $date = Session_time::findOrFail($request->id);

      $date->delete();
    
      if ($date){
        notify()->success('');
        return response()->json([
            'status' => true,
            'msg' => 'successfully',
        ]);
     }
    

 else{
    notify()->error('');
    return response()->json([
        'status' => false,
        'msg' => 'error',
    ]);  
 }

}

public function session_plan_store(Request $request)
    { 
                  try {
                    $request->validate([
                        'title' => 'required',
                    ]);
                     $session_plan = new Session_plan(); 

                         $session_plan->title = $request->title;
                         $session_plan->user_id = auth()->user()->id;
                         $session_plan->industry = $request->industry;
                         $session_plan->save();                         
                  
                         $id = $session_plan->id;       
                     if($session_plan) {
                        notify()->success('');
                        return redirect('sp_profile/'.$id);
                    } else  {
                        notify()->error('There is an error in your data');
                        return redirect()->back();
                    }
    
          }
           catch (\Exception $e){                       
                notify()->error(' Something wrong, please try again');
                return redirect()->back();
              }
          }

 public function sp_profile($id)
    {
      $session_plan = Session_plan::find($id); 
      $industry = Industry::get();   
      $sp_session = Sp_session::where('session_plan_id', $id)->with('sp_session_goal')->latest()->get();   
      $sp_session1 = Sp_session::where('session_plan_id', $id)->latest()->get();   
      return view('front.user.session_plan', ['session_plan' => $session_plan , 'industry' => $industry ,  'sp_session' => $sp_session , 'sp_session1' => $sp_session1]);
    }

    public function session_plan_edit(Request $request)
    {
                  
                    $request->validate([
                        'title' => 'required',
                    ]);

                    $session_plan = Session_plan::find($request->id);
                      $session_plan->title =   $request->title;
                      $session_plan->industry = $request->industry;
                      $session_plan->save();
                        
                     if($session_plan) {
                        notify()->success('');
                        return redirect()->back() ;
                    } else  {
                        notify()->error('There is an error in your data');
                        return redirect()->back();
                    }
    
          
          }

          public function session_plan_delete(Request $request)
                {
                  $session_plan = Session_plan::find($request->id);
                  $session_plan->delete();
                                    
                   if($session_plan) {
                    notify()->success('deleted');
                     return redirect('/settings');
                  } else  {
                    notify()->error('There is an error in your data');
                      return redirect()->back();
                 }
                
                      
             }

             public function get_users($id)
             {
         
                $users = User::where('type_id' , $id)->latest()->get();
                return $users; 
             }

             public function get_sessions($id)
             {
         
                $session = User_skill::where('user_id' , $id)->pluck("skill", "id");
                return $session; 
             }

             public function get_session_times($id)
             {
         
                $session_time = Session_time::where('session_id' , $id)->latest()->get();
              
                return $session_time;    
            
            }

           public function sp_session_store(Request $request)
             {
                  
                $request->validate([
                    'title' => 'required', 
                  ]);
                  if($request->session_plan_id){
                    $session_plan_id = $request->session_plan_id;
                  }else{
                      $id = auth()->user()->id;
                      $s = Session_plan::where('user_id', $id)->latest()->first();
                      if($s){
                          $session_plan_id = $s->id;
                    }else{
                        $sp = new Session_plan(); 

                        $sp->title = $request->title;
                        $sp->user_id = auth()->user()->id;
                        $sp->save();
                          if($sp){
                              $session_plan_id = $sp->id;
                        }else{
                            notify()->error('There is an error in your data');
                            return redirect()->back();
                        }
                  }
                    
                  }
                  if($request->sp_session_id){

                  $sp_session_id = $request->sp_session_id;

                  $sp_session = Sp_session::find($sp_session_id);
              
        
                $sp_session->title =  $request->title;
                $sp_session->session_plan_id =  $session_plan_id;
                $sp_session->mentor_type =  $request->user_type;
                $sp_session->mentor_id =  $request->users;
                $sp_session->session_id =  $request->session;
                $sp_session->session_time_id =  $request->session_time;
                $sp_session->date =  $request->date;
                $sp_session->time =  $request->time;
                $sp_session->user_id =auth()->user()->id ;
               
                $sp_session->save();

                $learner = auth()->user();                     
                $sp_session->user->notify(new NewSession($sp_session, $learner));

                  $goal = $request->goal;
                  for($i = 0; $i < count($goal); $i++)
                  {
                   $sp_session_goal =new Sp_session_goal();
                   $sp_session_goal->sp_session_id = $sp_session->id;
                   if($goal[$i] ==! null){
                    $sp_session_goal->goal = $goal[$i] ;     
                    $sp_session_goal->save();
                   }
                   
                  }
                  $student_session = Student_session::where('course_id', $sp_session_id)->first();
                     if($student_session){
                      $student_session->course_id =  $sp_session->id;
                      $student_session->student_id =  auth()->user()->id;
                      $student_session->session_by =  $request->users;
                      $student_session->session_date =  $request->date;
                      $student_session->start_time =   $request->time;
                      $student_session->title =  $request->title;
                   
                      $student_session->save();

                      $learner = auth()->user();                    
                      $admin = User::where('id' , 1)->first();
                     
                    $sp_session->user->notify(new NewSession($sp_session, $learner));
                      Notification::send($admin,new NewSession($sp_session, $learner));
                     }
                   
                  if($sp_session) {
                   
                    smilify('success','The request has been sent successfully');
                    return redirect()->back();
                 } else  {
                     notify()->error('There is an error in your data');
                     return redirect();
                }                  }
                 else{
                  $sp_session =new Sp_session();
        
                  $sp_session->title =  $request->title;
                  $sp_session->session_plan_id =  $session_plan_id;
                  $sp_session->mentor_type =  $request->user_type;
                  $sp_session->mentor_id =  $request->users;
                  $sp_session->session_id =  $request->session;
                  $sp_session->session_time_id =  $request->session_time;
                  $sp_session->date =  $request->date;
                  $sp_session->time =  $request->time;
                  $sp_session->user_id =auth()->user()->id ;
                 
                  $sp_session->save();
 
                    $goal = $request->goal;
                    for($i = 0; $i < count($goal); $i++)
                    {
                     $sp_session_goal =new Sp_session_goal();
                     $sp_session_goal->sp_session_id = $sp_session->id;
                     if($goal[$i] ==! null){
                     $sp_session_goal->goal = $goal[$i] ;
                     $sp_session_goal->save();
                    }     
                     
                    }

                    $student_session = new Student_session();

                    $student_session->course_id =  $sp_session->id;
                    $student_session->student_id =  auth()->user()->id;
                    $student_session->session_by =  $request->users;
                    $student_session->session_date =  $request->date;
                    $student_session->start_time =   $request->time;
                    $student_session->end_time =  $request->end_time;
                    $student_session->type = 'session';
                    $student_session->title =  $request->title;
                 
                    $student_session->save();

                    $learner = auth()->user();                    
                    $admin = User::where('id' , 1)->first();
                   
                   $sp_session->user->notify(new NewSession($sp_session, $learner));  
                   Notification::send($admin,new NewSession($sp_session, $learner));
                    
                    // Notification::route('mail' ,'drb2014.m@gmail.com')->notify(new NewSession($sp_session, $learner));
                    if($sp_session) {
                        smilify('success','The request has been sent successfully');

                        return redirect()->back();
                     } else  {   
                        notify()->error('There is an error in your data');
                         return redirect()->back() ;
                    }    
                
                }
          }


          public function sp_session_delete(Request $request)
                {
                  $sp_session = Sp_session::find($request->sp_session_id);
                
                                    
                   if($sp_session) {  
                    $sp = Student_session::where('course_id' , $sp_session->id )->first();
                    if($sp){
                      $mentor= auth()->user(); 
                      $sp->user->notify(new RefuserRequest($sp, $mentor));
                      $sp_session->delete();
                    }
                    
                       notify()->success('deleted');
                      return redirect()->back() ;
                  } else  {   
                    notify()->error('There is an error in your data');
                      return redirect()->back() ;
                 }
                
                      
             }

             public function goal_done(Request $request)
             {
               $goal = Sp_session_goal::find($request->id);
                      
                if($goal->status == 1) {
                 $goal->status = 0 ;
                 $goal->save();} 
                 else {
                     $goal->status = 1 ;
                     $goal->save();
              }
                
          }
          
          public function goal_delet(Request $request)
             {
               $goal = Sp_session_goal::find($request->id);
               $goal->delete();
                                 
               return response()->json([
                 'status' => true,
                 'id' => $request->id,
             ]);
             
                   
          }

          public function status_sp(Request $request)
          {
            $sp = Sp_session::find($request->id);
            $sp->status = $request->val;
            $sp->save();         
            return response()->json([
              'status' => true,
              'id' => $request->id,
          ]);
          
                
       }
       
       public function session_profile($id)
    {
        $sp_session = Sp_session::where('id' , $id)->first();
       if($sp_session){
    
      return view('front.user.session')->with(['sp_session' => $sp_session ]);
    }
      else{
          return redirect()->back();
      }
        
     
    }

    public function ss_profile($id)
    {
        $sp_session = Student_session::where('id' , $id)->first();
       if($sp_session){
    
      return view('front.user.s_session')->with(['sp_session' => $sp_session ]);
    }
      else{
          return redirect()->back();
      }
        
     
    }
          
}
