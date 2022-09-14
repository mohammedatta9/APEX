<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_Setting;
use Carbon\Carbon;
use App\Models\User_skill;
use App\Models\User_qualification;
use App\Models\Service_detail;
use App\Models\Sd_time;
use App\Models\Industry;
use App\Models\Skill; 
use App\Models\Pd_plan;
use App\Models\Pd_gool;
use App\Models\Session_plan;
use App\Models\Quiz_Result;
use App\Models\Event;
use App\Models\Pd_subgool;
use App\Models\Country;
use App\Models\City;
use App\Models\Quizze;
use App\Models\Quiz_question;
use App\Models\Community_post;
use App\Models\Session;
use App\Models\User_participate;
use App\Models\Sp_session;
use App\Models\Review;
use App\Models\Student_session;
use App\Models\Community;
use App\Models\Quiz_Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        $webinars = Service_detail::where('name' , 'webinar')->where('user_id', $user)->latest()->get();
        $seminars = Service_detail::where('name' , 'seminar')->where('user_id', $user)->latest()->get();
        $events = Service_detail::where('name' , 'event')->where('user_id', $user)->latest()->get();
        $internships = Service_detail::where('name' , 'internship')->where('user_id', $user)->latest()->get();
        $programs = Service_detail::where('name' , 'programe')->where('user_id', $user)->latest()->get();
        $projects = Service_detail::where('name' , 'project')->where('user_id', $user)->latest()->get();
        $workshops = Service_detail::where('name' , 'workshop')->where('user_id', $user)->with('sd_times')->latest()->get();
        $courses = Service_detail::where('name' , 'course')->where('user_id', $user)->with('sd_times')->latest()->get();
        $industry = Industry::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();

        $quizzes = Quizze::where('user_id' , $user)->latest()->get();
        $country = Country::get();
        $city = City::get();
        $session = Session::where('user_id', $user)->with('session_times')->latest()->get();
        $session1 = Session::where('user_id', $user)->with('session_times')->latest()->get();
        $pd_plan1 = Pd_plan::where('user_id', $user)->latest()->get();
        $pd_plan = Pd_plan::where('user_id', $user)->latest()->get();
        $community = Community::where('user_id', $user)->latest()->get();
        $session_plan = Session_plan::where('user_id', $user)->latest()->get();
        $participates = Student_session::where('student_id', $user)->where('type', 'not like', "session")->latest()->get();
        if ($data) {
            $settings = User_Setting::where('user_id', $data->id)->first();
            if (!$settings) {
                $settings = new User_Setting();
                $settings->user_id = $data->id;
                $settings->save();
            }
            if($data->type_id == 2 || $data->type_id == 3 ){
                return view('front.user.settings.mentor_coache', ['quizzes' => $quizzes])->with('user', $data)->with('settings', $settings)->with('industry', $industry)->with('industry2', $industry)->with('skills', $skills)->with('industry1', $industry)->with('country', $country)->with('city', $city)->with('webinars', $webinars)->with('session', $session)->with('session1', $session1)->with('community', $community) ;
            }
            else if($data->type_id == 5 || $data->type_id == 6){
              return view('front.user.settings.company_Institution')->with('user', $data)->with('settings', $settings)->with('webinars', $webinars)->with('seminars', $seminars)->with('events', $events)->with('internships', $internships)->with('programs', $programs)->with('projects', $projects)->with('workshops', $workshops)->with('courses', $courses)->with('community', $community)->with('industry', $industry)->with('country', $country)->with('city', $city);

            }
            else{
                return view('front.user.settings.learner')->with('user', $data)->with('settings', $settings)->with('pd_plan1', $pd_plan1)->with('pd_plan', $pd_plan)->with('session_plan', $session_plan)->with('industry', $industry)->with('industry1', $industry)->with('community', $community)->with('country', $country)->with('city', $city)->with('participates', $participates);
            }

        } else {
            return redirect()->route('login')->with('error', 'Your session expired');
        }
    }

    public function account_settings()
    {
        //
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            return view('front.user.account_settings')->with('user', $data);
        } else {
            notify()->error('There is an error in your data');
            return redirect()->route('login');
        }
    }

   public function profile()
    {
        //
        
        $userid = \auth()->user()->id;
        $user = User::where('id' , $userid)->first();
        $user_skills = User_skill::where('user_id' , $userid)->get();
        $qualification = User_qualification::where('user_id' , $userid)->orderBy('year','desc')->get();
        $sp_session = Sp_session::where('mentor_id',$userid)->with('sp_session_goal')->with('session_time')->paginate(20);
        $sp_sessionaa = Sp_session::where('mentor_id',$userid)->with('sp_session_goal')->with('session_time')->where('status' , 'Accepted')->get();
        $industry = Industry::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        //statistics mentor
        $session = Session::where('user_id', $userid)->count();
        $sp_session_accept = Sp_session::where('mentor_id',$userid)->where('status','Accepted')->count();
        $community = Community::where('user_id', $userid)->count();
        $quizze = Quizze::where('user_id', $userid)->count();
        $webinar = Service_detail::where('name' , 'webinar')->where('user_id', $userid)->count();
        // 
        $pd_plan = Pd_plan::where('user_id', $userid)->count();
        $sessions_learner = Sp_session::where('user_id',$userid)->count();
        $sessionplan_learner = Session_plan::where('user_id',$userid)->count();
        $webinars = User_participate::where('user_id',$userid)->where('name','webinar')->count();
        $reviews = Review::where('user_id', $userid)->latest()->limit(10)->get();  
        $applications = Student_session::where('session_by',$userid)->when(1 , function ($query) {
            return $query->where('status','not like' ,2);
        })->latest()->limit(15)->get();

        ///comm
        $workshopss = Service_detail::where('user_id',$userid)->where('name','webinar')->count();
        $coursess = Service_detail::where('user_id',$userid)->where('name','course')->count();
        $internshipss = Service_detail::where('user_id',$userid)->where('name','internship')->count();
        $programss = Service_detail::where('user_id',$userid)->where('name','program')->count();
        $projectss = Service_detail::where('user_id',$userid)->where('name','project')->count();
        $eventss = Service_detail::where('user_id',$userid)->where('name','event')->count();
        $seminarss = Service_detail::where('user_id',$userid)->where('name','seminar')->count();

//learner
        $workshops = Student_session::where('student_id',$userid)->where('type','workshop')->count();
        $courses = Student_session::where('student_id',$userid)->where('type','course')->count();
        $internships = Student_session::where('student_id',$userid)->where('type','internship')->count();
        $programs = Student_session::where('student_id',$userid)->where('type','program')->count();
        $projects = Student_session::where('student_id',$userid)->where('type','project')->count();
        $events= Student_session::where('student_id',$userid)->where('type','event')->count();
        $seminars = Student_session::where('student_id',$userid)->where('type','seminar')->count();
        $webinars = Student_session::where('student_id',$userid)->where('type','webinar')->count();

        $last_workshop = Student_session::where('student_id',$userid)->where('type','workshop')->latest()->first();
        $last_session = Student_session::where('student_id',$userid)->where('type','session')->latest()->first();
        $last_intership = Student_session::where('student_id',$userid)->where('type','internship')->latest()->first();
        $last_course = Student_session::where('student_id',$userid)->where('type','course')->latest()->first();
        $last_project = Student_session::where('student_id',$userid)->where('type','project')->latest()->first();
        $last_seminar = Student_session::where('student_id',$userid)->where('type','seminar')->latest()->first();
        $last_event = Student_session::where('student_id',$userid)->where('type','event')->latest()->first();
        $last_webinar = Student_session::where('student_id',$userid)->where('type','webinar')->latest()->first();

        $last_session_plan = Session_plan::where('user_id',$userid)->latest()->first();
        $last_pd_plan = Pd_plan::where('user_id',$userid)->latest()->first();
        if($last_pd_plan){
         $last_goal = Pd_gool::where('pd_plan_id',$last_pd_plan->id)->latest()->first();
         $goals = Pd_gool::where('pd_plan_id',$last_pd_plan->id)->count();
        }else{
            $last_goal='';
            $goals = 0 ;
        }
        if($last_goal){
            $last_subgoal = Pd_subgool::where('pd_gool_id',$last_goal->id)->latest()->first();
            $subgoals = Pd_subgool::where('pd_gool_id',$last_goal->id)->count();

        }else{
            $last_subgoal = '';
            $subgoals =0 ;
        }
        $last_community = Community::where('user_id', $userid)->latest()->first();
        $last_community_post = Community_post::where('user_id', $userid)->latest()->first();

        
        $type_id= $user->type_id;

        if($user) {
        if($type_id == 3) {
            return view('front.user.profiles.coachs_profile', compact('user','user_skills','qualification','sp_session' ,'industry','session','sp_session_accept','community','quizze','webinar','sp_sessionaa','reviews','applications','skills'));
        }
        elseif($type_id == 2) {
            return view('front.user.profiles.coachs_profile', compact('user','user_skills','qualification','sp_session','industry','session','sp_session_accept','community','quizze','webinar' ,'sp_sessionaa','reviews','applications','skills'));
        }
        elseif($type_id == 4){

         return view('front.user.profiles.learners_profile', compact('user','skills','qualification','sessions_learner','sessionplan_learner','community','pd_plan','webinars','seminars','events','programs','projects','internships','courses','workshops','last_workshop','last_session','last_intership','last_course','last_project','last_session_plan','last_pd_plan','last_goal','last_subgoal','last_community','last_community_post','subgoals','goals','industry','last_webinar','last_seminar','last_event'));

        }
        elseif($type_id ==6)
        {
            return view('front.user.profiles.companie_lnstitutions_profile', compact('user','reviews','webinar','seminarss','eventss','programss','projectss','internshipss','coursess','workshopss','applications'));

        }
        elseif($type_id ==5)
        {
            return view('front.user.profiles.companie_lnstitutions_profile', compact('user','reviews','webinar','seminarss','eventss','programss','projectss','internshipss','coursess','workshopss','applications'));

        }
        else{
            return view('front.user.profiles.companie_lnstitutions_profile', compact('user'));

        }


        }
        else{
            notify()->error('Your session expired');
            return redirect()->route('login');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            // try {
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                
                 'country' => 'required',
                 
            ]);

            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->dob = $request->dob;
            $data->gender = $request->gender;
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->country = $request->country;
            $data->city = $request->city;
            $data->timezone = $request->timezone;
            $data->facebook = $request->facebook;
            $data->linkedin = $request->linkedin;
            $data->instagram = $request->instagram;
            $data->youtube = $request->youtube;
            $data->industry = $request->industry;
             $data->type_company = $request->type_company;
            $data->bio = $request->bio;
            if (request()->image != null) {
                $data->image = $this->uploadImage('users', $request->file('image'));
            }

            $data->save();


            return response()->json([
                'message' => "Your personal information updated successfuly"
            ]);
//            }
//            catch (\Exception $e){
//                return redirect()->back()->with('error', 'Something wrong, please try again');
//            }
        } else {
            notify()->error('Your session expired');
            return redirect()->route('login');
        }

    }
public function update_cover(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            // try {
            $this->validate($request, [
                'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            ]);

            
            if (request()->fileUpload != null) {
                $data->cover = $this->uploadImage('users', $request->file('fileUpload'));
            }

            $data->save();


            return asset('/storage/users/'.$data->cover);
        } else {
            return false;
        }

    }
    
   
  public function update_photo(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            // try {
            $this->validate($request, [
                'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            ]);

            
            if (request()->fileUpload != null) {
                $data->image = $this->uploadImage('users', $request->file('fileUpload'));
            }

            $data->save();


            return asset('/storage/users/'.$data->image);
        } else {
            return false;
        }

    }
    public function security_settings(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            // try {

            if (isset($request->email) && $request->email != $data->email) {
                $this->validate($request, [
                    'email' => 'unique:users'
                ]);
                $data->email = $request->email;
            }

            if (isset($request->old_password)) {
                $this->validate($request, [
                    'new_password' => [
                        'required',
                        'string',
                        'min:8',             // must be at least 10 characters in length
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',      // must contain at least one digit
                        'regex:/[@$!%*#?&]/', // must contain a special character
                    ],
                    'password_confirmation' => 'required|same:new_password'
                ]);


                if (!Hash::check($request->old_password, $data->password)) {
                    return response()->json([
                        'message' => "Old password doesn't match your current password"
                    ], 422);
                }
                $data->password = Hash::make($request->new_password);
            }

            if (isset($request->status))
                $data->status = $request->status;
            if (isset($request->deleteme)) {
                $data->deleted_at = Carbon::now();
            } else {
                $data->deleted_at = null;
            }

            $data->save();


            return response()->json([
                'message' => "Your personal information updated successfuly"
            ]);

        } else {
            notify()->error('Your session expired');
            return redirect()->route('login');
        }

    }

    public function privacy_settings(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            $settings = User_Setting::where('user_id', $data->id)->first();
            if (isset($request->show_profile))
                $settings->show_profile = $request->show_profile;
            if (isset($request->show_phone))
                $settings->show_phone = $request->show_phone;
            if (isset($request->show_email))
                $settings->show_email = $request->show_email;


            $settings->save();


            return response()->json([
                'message' => "Your Privacy settings updated successfuly"
            ]);

        } else {
            notify()->error('Your session expired');
            return redirect()->route('login');
        }

    }

    public function payments_settings(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            $settings = User_Setting::where('user_id', $data->id)->first();
            if (isset($request->use_card_for_future))
                $settings->use_card_for_future = $request->use_card_for_future;
            if (isset($request->pause_card))
                $settings->pause_card = $request->pause_card;


            $settings->save();


            return response()->json([
                'message' => "Your Payment settings updated successfuly"
            ]);

        } else {
            notify()->error('Your session expired');
            return redirect()->route('login');
        }

    }

    public function notification_settings(Request $request)
    {
        $user = \auth()->user()->id;
        $data = User::where('id', $user)->first();
        if ($data) {
            $settings = User_Setting::where('user_id', $data->id)->first();
            if (isset($request->receive_promotions))
                $settings->receive_promotions = $request->receive_promotions;

            if (isset($request->receive_announcements))
                $settings->receive_announcements = $request->receive_announcements;

            if (isset($request->receive_sms))
                $settings->receive_sms = $request->receive_sms;

            if (isset($request->receive_sp_notifications))
                $settings->receive_sp_notifications = $request->receive_sp_notifications;

            if (isset($request->receive_newsletters))
                $settings->receive_newsletters = $request->receive_newsletters;

            if (isset($request->receive_invoices))
                $settings->receive_invoices = $request->receive_invoices;


            $settings->save();


            return response()->json([
                'message' => "Your notification settings updated successfuly"
            ]);

        } else {
            notify()->error('Your session expired');
            return redirect()->route('login');
        }

    }


    public function destroy(User $user)
    {
        //
    }
     public function logout()
    {
        //
        Auth::logout();
        return redirect()->route('login');
    }






/////hourly_price_store
    public function hourly_price_store(Request $request)
    {
        

        $request->validate([
            'hourly_price' => 'required',
            'rate_duration' => 'required',
            'currency' => 'required',
        ]);

      
        $user = \auth()->user()->id;
        $data = User::find($user);
        if($data) {
            try {
                $data->hourly_price = $request->hourly_price;
                $data->rate_duration = $request->rate_duration;
                $data->currency = $request->currency;
              
                $data->save();


                return response()->json([                    
                    'status' => true,
                    'msg' => 'Data saved successfully',
                    $data,
                ]);
            }
            catch (\Exception $e){
                notify()->error('Something wrong, please try again');
                return redirect()->back();
            }
        }
   
     }

//// user_imgs_store
public function user_img_store(Request $request)
{

    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
    ]);
               
        // try {
            if (request()->image != null) {
                $image = $this->uploadImage('users', $request->file('image'));
               }
             
         $user = \auth()->user()->id;
         $data = User::find($user);

         if($data) {
              try {
          $data->image = $image;
         
          $data->save();

          return response ()->json ($data );


      }
       catch (\Exception $e){
        notify()->error('Something wrong, please try again');
              return redirect()->back();
          }
      }
   }

   public function user_imgb_store(Request $request)
{

    $request->validate([
        'imageb' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
    ]);
               
        // try {
            if (request()->imageb != null) {
                $imageb = $this->uploadImage('users', $request->file('imageb'));
               }
             
         $user = \auth()->user()->id;
         $data = User::find($user);

         if($data) {
              try {
          $data->imageb = $imageb;
         
          $data->save();

          return response ()->json ($data );


      }
       catch (\Exception $e){
        notify()->error('Something wrong, please try again');
              return redirect()->back();
          }
      }
   }

// user_video_store
   public function user_video_store(Request $request)
{

    $request->validate([
        'video' => 'required|max:9048',        
    ]);
               
        // try {
            if (request()->video != null) {
                $video = $this->uploadImage('users', $request->file('video'));
               }else{
                $video = $request->video;
               }
               
             
         $user = \auth()->user()->id;
         $data = User::find($user);

         if($data) {
              try {
          $data->video = $video;
         
          $data->save();

          return response ()->json ($data );


      }
       catch (\Exception $e){
        notify()->error('Something wrong, please try again');
              return redirect()->back();
          }
      }
   }

   // user_video_store
   public function user_video_del(Request $request)
{
      
         $user = \auth()->user()->id;
         $data = User::find($user);

         if($data) {
              try {
          $data->video = $request->video;
         
          $data->save();
          notify()->success('');
          return redirect()->back();


      }
       catch (\Exception $e){
        notify()->error('Something wrong, please try again');

              return redirect()->back();
          }
      }
   }

    //// about_store
     public function about_store(Request $request)
     {
     $user = \auth()->user()->id;
     $data = User::find($user);
     if($data) {
        try {
               $data->about = $request->about;
              
               $data->save();

           }
            catch (\Exception $e){
                notify()->error('Something wrong, please try again');

                   return redirect()->back();
               }
           }
        }

        //// bio_store
     public function bio_store(Request $request)
     {
     $user = \auth()->user()->id;
     $data = User::find($user);
     if($data) {
        try {
               $data->bio = $request->bio;
              
               $data->save();

           }
            catch (\Exception $e){
                notify()->error('Something wrong, please try again');
                   return redirect()->back();
               }
           }
        }


         //// job_title_store
     public function job_title_store(Request $request)
     {
     $user = \auth()->user()->id;
     $data = User::find($user);
     if($data) {
        try {
               $data->job_title = $request->job_title;
              
               $data->save();

           }
            catch (\Exception $e){
                notify()->error('Something wrong, please try again');
                   return redirect()->back();
               }
           }
        }

         
///////skill_store
     public function skill_store(Request $request)
    {

        try {
            $data = new User_skill();
            $data->skill = $request->skill;
            $data->user_id = auth()->user()->id;
                           
                    $data->save ();
              if($data) {
                
                return response ()->json ( $data );
            
             
               }
          }
              catch (\Exception $e){
                notify()->error('Something wrong, please try again');
                  return redirect()->back();
              }
          }


         ////// skill_destroy
          public function skill_destroy(Request $request){

           $skill = User_skill::find($request->id);   // Offer::where('id','$offer_id') -> first();
         
        if (!$skill){
            notify()->error('Something wrong, please try again');
            return redirect()->back();

        }
         
        $skill->delete();
         
        return response()->json([
            'status' => true,
            'msg' => 'تم الحذف بنجاح',
            'id' =>  $request -> id
        ]);
         
    }


    ////// qualification_destroy
    public function qualification_destroy(Request $request){

        $qualification = User_qualification::find($request->id);   // Offer::where('id','$offer_id') -> first();
      
     if (!$qualification){
        notify()->error('Something wrong, please try again');

        return redirect()->back();
     }
         
      
     $qualification->delete();
      
     return response()->json([
         'status' => true,
         'msg' => 'تم الحذف بنجاح',
         'id' =>  $request -> id
     ]);
      
 }


    public function qualification_store(Request $request)
        {  

                    $data = new User_qualification();
                    $data->institute_name = $request->institute_name;
                    $data->degree = $request->degree;
                    $data->year = $request->year;
                    $data->user_id = auth()->user()->id;
                           
                    $data->save ();
                        
 
                           if ($data)
                           return response ()->json ( $data );
                       else
                           return response()->json([
                               'status' => false,
                               'msg' => 'error',
                           ]); 
                        
 
            }
                

   //////service_store
   public function service_store(Request $request)
     {
       if($request->name == 'event' || $request->name == 'webinar' || $request->name == 'seminar') {
        $request->validate([
            'title' => 'required|unique:service_details',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required',
            'file' => 'max:2048',
            'date_from' => 'required',
            'time_to'  =>   'required',
            
        ]);
       }else{
        $request->validate([
            'title' => 'required|unique:service_details',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required',
            'file' => 'max:2048',
            
        ]);

       }
    
               
        // try {
            if (request()->cover != null) {
                $cover = $this->uploadImage('services', $request->file('cover'));
               }
              else  {
                $cover =0;
                 }


            if (request()->file != null) {
                $file = $this->uploadImage('services', $request->file('file'));
               }
              else  {
                $file =0;
                 }
            $service= Service_detail::create([
                'name' => $request->name,
                'title' =>   $request->title,
                'slug'=> Str::slug($request->title),
                'user_id' => auth()->user()->id,
                'cover' =>  $cover,
                'date_from' => $request->date_from,
                'date_to' =>   $request->date_to,
                'about' =>  $request->about,
                'notes' => $request->notes,
                'time_from' =>   $request->time_from,
                'time_to' =>  $request->time_to,
                'address' => $request->address,
                'have_link' => $request->have_link,
                'location_link' => $request->location_link,
                'ticket_fees' =>   $request->ticket_fees,
                'link' =>   $request->link,
                'file' =>  $file,
                'deadline' => $request->deadline, 
                'duration' => $request->duration,
                'monthly_salary' => $request->monthly_salary,
                'qualifcation' => $request->qualifcation,

                            
            ]);
                    
                if ($service)
                    return response()->json([
                         'status' => true,
                           'msg' => 'successfully',
                       ]);
                    
                else
                    return response()->json([
                        'status' => false,
                        'msg' => 'error',
                    ]);   
                  }
        
        
   public function servicbstore(Request $request)
        {
              
        $request->validate([
            'title' => 'required|unique:service_details',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about' => 'required',
            'file' => 'max:2048',
                        
          ]);

              if (request()->cover != null) {
                  $cover = $this->uploadImage('services', $request->file('cover'));
                  }
                else  {
              $cover =0;
             }
        
        
             if (request()->file != null) {
                $file = $this->uploadImage('services', $request->file('file'));
              }
             else  {
              $file =0;
               }

               $service = new Service_detail();

               $service->name = $request->name;
               $service->title =  $request->title;
               $service->slug = Str::slug($request->title);
               $service->user_id = auth()->user()->id;
               $service->cover = $cover;
               $service->about = $request->about;
               $service->notes = $request->notes;
               $service->link = $request->link;
               $service->address = $request->address;
               $service->ticket_fees = $request->ticket_fees;
               $service->file =  $file;
               $service->save();
              
               $date = $request->date;
               $time_from = $request->time_from;
               $time_to = $request->time_to;

               for($i = 0; $i < count($date); $i++){
                   
                $sd_time =new Sd_time();
                $sd_time->service_id = $service->id;
                $sd_time->date = date("Y-m-d H:i:s" , strtotime($date[$i])) ;
                $sd_time->time_from = date("H:i:s" , strtotime($time_from[$i]));
                $sd_time->time_to =  date("H:i:s" , strtotime($time_to[$i])) ;

                $sd_time->save();

            }


            if ($service)
            return response()->json([
                'status' => true,
                'msg' => 'successfully',
            ]);

        else
            return response()->json([
                'status' => false,
                'msg' => 'error',
            ]);   
        


     }
                              
                  


        public function service_edit(Request $request)
        {

            $request->validate([
                'title' => 'required',
                'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'about' => 'required',
                'file' => 'max:2048',
                            
              ]);

               $service = Service_detail::findOrFail($request->id);
    
               $service->title =  $request->title;
               $service->slug = Str::slug($request->title);
               if (request()->cover != null) {
                $cover = $this->uploadImage('services', $request->file('cover'));
                $service->cover = $cover;
                }
               $service->about = $request->about;
               $service->notes = $request->notes;
               $service->address = $request->address;
               $service->ticket_fees = $request->ticket_fees;
               if (request()->file != null) {
                $file = $this->uploadImage('services', $request->file('file'));
                $service->file =  $file;
              }
              $service->date_from =  $request->date_from;
              $service->date_to =  $request->date_to;
              $service->time_from =  $request->time_from;
              $service->time_to =  $request->time_to;
              $service->link =  $request->link;
              $service->monthly_salary =  $request->monthly_salary;
              $service->qualifcation =  $request->qualifcation;
              $service->deadline =  $request->deadline;
               

                $service->save();
              
           
               
                if ($service)
                return response()->json([
                    'status' => true,
                    'msg' => 'successfully',
                ]);
    
            else
                return response()->json([
                    'status' => false,
                    'msg' => 'error',
                ]);   


             
           }


           public function service_edit2(Request $request)
           {
   
               $request->validate([
                   'title' => 'required',
                   'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                   'about' => 'required',
                   'file' => 'max:2048',
                               
                 ]);
   
                  $service = Service_detail::find($request->id);
       
                  $service->title =  $request->title;
                  $service->slug = Str::slug($request->title);
                  if (request()->cover != null) {
                   $cover = $this->uploadImage('services', $request->file('cover'));
                   $service->cover = $cover;
                   }
                  $service->about = $request->about;
                  $service->notes = $request->notes;
                  $service->address = $request->address;
                  $service->link = $request->link;
                  $service->ticket_fees = $request->ticket_fees;
                  if (request()->file != null) {
                   $file = $this->uploadImage('services', $request->file('file'));
                   $service->file =  $file;
                 }
                 $service->save();

                   $date = $request->date;
                   $time_from = $request->time_from;
                   $time_to = $request->time_to;
    
                   for($i = 0; $i < count($date); $i++){
                       
                    $sd_time =new Sd_time();
                    $sd_time->service_id = $request->id;
                    $sd_time->date = date("Y-m-d H:i:s" , strtotime($date[$i])) ;
                    $sd_time->time_from = date("H:i:s" , strtotime($time_from[$i]));
                    $sd_time->time_to =  date("H:i:s" , strtotime($time_to[$i])) ;
    
                    $sd_time->save();
                   }
              
                  
                   if ($service)
                   return response()->json([
                       'status' => true,
                       'img' => $service->cover,
                       'msg' => 'successfully',
                   ]);
       
               else
                   return response()->json([
                       'status' => false,
                       'msg' => 'error',
                   ]);   
   
   
                
              }
   
       
                              
  
        public function service_delete(Request $request)
        {
           
               $service = Service_detail::findOrFail($request->id);

             
                $service->delete();
              
                if ($service)
                return response()->json([
                    'status' => true,
                    'msg' => 'successfully',
                ]);
    
                else
               return response()->json([
                    'status' => false,
                   'msg' => 'error',
                ]);   

         }  
                             
            
         public function date_delete(Request $request)
        {
           
               $date = Sd_time::findOrFail($request->id);
 
                $date->delete();
              
                if ($date)
                return response()->json([
                    'status' => true,
                    'msg' => 'successfully',
                ]);
    
                else
               return response()->json([
                    'status' => false,
                   'msg' => 'error',
                ]);   

         }  

    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }

    public function quiz_create($id)
    { 
        $q= Quizze::find($id);
       $skills_q =  Quiz_Skill::where('quiz_id', $q->id)->get();

       $results =  Quiz_Result::where('quiz_id', $q->id)->get();

        $questions = Quiz_question::where('quiz_id', $id)->with('question_options')->get();
        $industry = Industry::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        return view('front.user.quizzes.quiz')->with('q', $q)->with('questions', $questions)->with('industry', $industry)->with('skills', $skills)->with('skills_q', $skills_q)->with('result', $results);

    }

    public function exercise_create()
    {
        return view('front.user.exercises.exercise');

    }
public function calender()
    {
        $user = \auth()->user()->id;
        $u = User::find($user);
        $pd_plan = Pd_plan::where('user_id', $user)->with('pd_gool')->get();
        $event = Event::where('user_id', $user)->get();
        $sp_session1 = Sp_session::where('user_id', $user)->where('status', 'Accepted')->get();
        $sp_session2 = Sp_session::where('mentor_id', $user)->where('status', 'Accepted')->get();
        $student_session = Student_session::where('student_id', $user)->get();
        $user_session = Student_session::when(1 , function ($query) use($user){
                                            return $query->where('session_by' , $user);
                                        })
                                        ->when(1 , function ($query)  {
                                            return $query->where('status', 3)->orWhere('status', 1);
                                        })->get();

        if ($user) {
           
            if($u->type_id == 2 || $u->type_id == 3 ){
                return view('front.user.calender.mentor_coache')->with('user_session', $user_session)->with('sp_session2', $sp_session2);
            }
            else if($u->type_id == 5 ||$u->type_id == 6){
              return view('front.user.calender.company_Institution')->with('user_session', $user_session);

            }
            else{
                return view('front.user.calender.learner')->with('pd_plan', $pd_plan)->with('student_session', $student_session)->with('sp_session1', $sp_session1);
            }

        } else {
            return redirect()->route('login')->with('error', 'Your session expired');
        }
    }
    public function pd_plan_store(Request $request)
    {
                  try {
                    $request->validate([
                        'name' => 'required',
                    ]);
                     $pd_plan = Pd_plan::create([
                         'user_id' => auth()->user()->id,
                         'name' =>   $request->name,
                         'deadline' => $request->deadline,
                         'gool' =>   $request->gool,
                         'notes' =>   $request->notes,
                         
                     ]);
                                
                     if($pd_plan) {
                        return redirect('dp_profile/'.$pd_plan->id);
                    } else  {
                        notify()->error('There is an error in your data');
                        return redirect()->back();
                    }
    
          }
           catch (\Exception $e){
            notify()->error('Something wrong, please try again');
                  return redirect()->back();
              }
          }
      
          public function pd_plan_edit(Request $request)
          {
                        
                          $request->validate([
                              'name' => 'required',
                          ]);

                          $pd_plan = Pd_plan::find($request->id);
                            $pd_plan->name =   $request->name;
                            $pd_plan->deadline = $request->deadline;
                            $pd_plan->gool =  $request->gool;
                            $pd_plan->notes =  $request->notes;
                            $pd_plan->save();
                              
                           if($pd_plan) {
                              return redirect('dp_profile/'.$pd_plan->id);
                          } else  {
                            notify()->error('There is an error in your data');
                              return redirect()->back();
                          }
          
                
                }


                public function pd_plan_delete(Request $request)
                {
                  $pd_plan = Pd_plan::find($request->id);
                  $pd_plan->delete();
                                    
                   if($pd_plan) {
                    notify()->success('');
                     return redirect()->back();
                  } else  {
                    notify()->error('There is an error in your data');
                      return redirect()->back();
                 }
                
                      
             }

             public function pd_gools_store(Request $request)
             {
                  
                $request->validate([
                    'gool' => 'required',            
                  ]);

                 if($request->gool_id){

                    $gool_id = $request->gool_id;

                    $pd_gool =Pd_gool::find($gool_id);
        
                    $pd_gool->gool =  $request->gool;
                    $pd_gool->pd_plan_id =  $request->pd_plan_id;
                   
                     $pd_gool->save();
   
                      $subgool = $request->subgool;
                      for($i = 0; $i < count($subgool); $i++)
                      {
                       $pd_subgool =new Pd_subgool();
                       $pd_subgool->pd_gool_id = $pd_gool->id;
                       if($subgool[$i] ==! null){
                       $pd_subgool->subgool = $subgool[$i] ;     
                       $pd_subgool->save();}
                      }
                      notify()->success('');
                      return redirect()->back();
                 }
                 else{}
                  $pd_gool =new Pd_gool();
        
                  $pd_gool->gool =  $request->gool;
                  $pd_gool->pd_plan_id =  $request->pd_plan_id;
                 
                  $pd_gool->save();
 
                    $subgool = $request->subgool;
                    for($i = 0; $i < count($subgool); $i++)
                    {
                     $pd_subgool =new Pd_subgool();
                     $pd_subgool->pd_gool_id = $pd_gool->id;
                     if($subgool[$i] ==! null){
                     $pd_subgool->subgool = $subgool[$i] ;     
                     $pd_subgool->save();
                     }
                    }
                    notify()->success('');
                    return redirect()->back();

                   
          }


          public function pd_gools_delete(Request $request)
                {
                  $pd_gool = Pd_gool::find($request->gool_id);
                  $pd_gool->delete();
                                    
                   if($pd_gool) {
                    notify()->success('Deleted');
                     return redirect()->back();
                  } else  {
                    notify()->error('There is an error in your data');
                      return redirect()->back();
                 }
                
                      
             }


             public function gool_done(Request $request)
                {
                  $pd_subgool = Pd_subgool::find($request->id);
                         
                   if($pd_subgool->status == 1) {
                    $pd_subgool->status = 0 ;
                    $pd_subgool->save();} 
                    else {
                        $pd_subgool->status = 1 ;
                        $pd_subgool->save();
                 }
                 
                 $pd_gool = Pd_gool::find($pd_subgool->pd_gool_id);
                 $count_subgool= $pd_gool->pd_subgool->count();
                 $count_subgooldone = Pd_subgool::where('status', 1)->where('pd_gool_id', $pd_gool->id)->count();
                 $gool_id = $pd_subgool->pd_gool_id;
                 $rate = (int)($count_subgooldone/$count_subgool*100);
                 $pd_gool->rate=$rate;
                 $pd_gool->save();

                 return response()->json([
                    'status' => true,
                    'rate' =>  $rate,
                    'gool_id' => $gool_id,
                ]);

                      
             }
             
             public function subgool_delet(Request $request)
                {
                  $pd_subgool = Pd_subgool::find($request->id);
                  $pd_subgool->delete();
                                    
                  return response()->json([
                    'status' => true,
                    'id' => $request->id,
                ]);
                
                      
             }

             public function event_store(Request $request)
             {
                  
                $request->validate([
                    'name' => 'required',            
                    'date' => 'required',            
                  ]);

                 
                  $event =new Event();
        
                  $event->name =  $request->name;
                  $event->date =  $request->date;
                  $event->description =  $request->description;
                  $event->color =  $request->color;
                  $event->icon =  $request->icon;
                  $event->user_id = auth()->user()->id;

                 
                  $event->save();
                
                  return redirect()->back();

                   
          }

          public function event_delete(Request $request)
          {
            $e = Event::find($request->event_id);
            $e->delete();
                              
             if($e) {
                notify()->success('');
               return redirect()->back();
            } else  {
                notify()->error('There is an error in your data');
                return redirect()->back();
           }
          
                
       }
   
}
