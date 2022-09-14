<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\User_skill;
use App\Models\Sd_time;
use App\Models\Pd_plan;
use App\Models\Pd_gool;
use App\Models\Pd_subgool;
use App\Models\Service_detail;
use App\Models\Quizze;
use App\Models\Session;
use App\Models\Sp_session;
use App\Models\Community;
use App\Models\User_qualification;
use App\Models\Industry;
use App\Models\Setting;
use Carbon\Carbon;
use App\Models\Review;

use App\Models\User_specialization;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        $data = Setting::pluck("value", "key")->toArray();
        return view('front.landing')->with('setting' , $data);
    }

    public function mentor_profile($slug)
    {
      $mentor = User::where('slug',$slug)->where('type_id' , 2)->first();
      if($mentor){
         $id= $mentor->id;
         $session = Session::where('user_id', $id)->count();
        $sp_session_accept = Sp_session::where('mentor_id',$id)->where('status','Accepted')->count();
        $community = Community::where('user_id', $id)->count();
        $quizze = Quizze::where('user_id', $id)->count();
        $webinar = Service_detail::where('name' , 'webinar')->where('user_id', $id)->count();
        $reviews = Review::where('user_id', $id)->latest()->limit(10)->get();  
      $skills = User_skill::where('user_id' , $id)->get();
      $qualification = User_qualification::where('user_id' , $id)->get();

      $industry =  $mentor->industry ;
      
      $similar_mentors = User::where('industry', $industry)->limit(18)->get();
       return view('front.user.profiles.mentor', ['user' => $mentor ,'similar_mentors' =>$similar_mentors ,'qualification' =>$qualification ,'skills' =>$skills ,'webinar' =>$webinar ,'quizze' =>$quizze ,'community' =>$community ,'sp_session_accept' =>$sp_session_accept ,'session' =>$session , 'reviews' => $reviews]);
      }
      else{
          return redirect()->back();
      }
    }


    public function mentor_search(Request $request)
    {
     
      $title = $request->title;
 
      $mentors = User::when(1 , function ($query) use($title){
        return $query->where('type_id',2);
    })
    ->when(!empty($title) , function ($query) use($title){
      return $query->where('first_name','like','%'. $title . '%')->orWhere('bio','like','%'. $title . '%')->orWhere('last_name','like','%'. $title . '%');
  })
     ->latest()->paginate(15);
      
      $induatries =Industry::get();
        $city = City::get();
        $country = Country::get();
        $featured_mentors = User::where('type_id' , 2)->where('is_featured' , 1)->inRandomOrder()->limit(6)->get();
        
        return view('front.mentors.list')->with(['mentors' => $mentors , 'mentor1' => $mentors , 'industries' => $induatries , 'cities'=>$city ,'featured_mentors'=>$featured_mentors , 'country'=>$country]);
 
    }

    public function mentor_filter(Request $request)
    {
     //dd($request);
      $title = $request->title;
      $industry = $request->industry;
      $countryy = $request->country;
      $cityy = $request->city;
 
      // $mentors = User::where('first_name','like','%'. $title . '%')->orWhere('last_name','like','%'. $title . '%')->orWhere('bio','like','%'. $title . '%')->where('industry' , $industry)->where('country' , $countryy)->where('city' , $cityy)->where('type_id' , 2)->get();
     
       $mentors = User::when(1 , function ($query) use($title){
                                        return $query->where('type_id',2);
                                    })
                                   ->when(!empty($title) , function ($query) use($title){
                                        return $query->where('first_name','like','%'. $title . '%')->orWhere('bio','like','%'. $title . '%')->orWhere('last_name','like','%'. $title . '%');
                                    })
                                    ->when(!empty($industry) , function ($query) use($industry){
                                        return $query->where('industry' ,'=' , $industry);
                                    })
                                    ->when(!empty($countryy) , function ($query) use($countryy){
                                        return $query->where('country' , $countryy);
                                    })
                                    ->when(!empty($cityy) , function ($query) use($cityy){
                                        return $query->where('city' , $cityy);
                                    })

         ->latest()->paginate(15);
       
      
        $induatries =Industry::get();
        $city = City::get();
        $country = Country::get();
        $featured_mentors = User::where('type_id' , 2)->where('is_featured' , 1)->inRandomOrder()->limit(6)->get();
        
        return view('front.mentors.list')->with(['mentors' => $mentors ,'mentor1' => $mentors , 'industries' => $induatries , 'cities'=>$city ,'featured_mentors'=>$featured_mentors , 'country'=>$country]);
 
    }

    public function coache_profile($slug)
    {
   
      $mentor = User::where('slug' , $slug)->where('type_id' , 3)->first();
      if($mentor){
          $id= $mentor->id;
          $session = Session::where('user_id', $id)->count();
        $sp_session_accept = Sp_session::where('mentor_id',$id)->where('status','Accepted')->count();
        $community = Community::where('user_id', $id)->count();
        $quizze = Quizze::where('user_id', $id)->count();
        $webinar = Service_detail::where('name' , 'webinar')->where('user_id', $id)->count();
        $reviews = Review::where('user_id', $id)->latest()->limit(10)->get();  

      $skills = User_skill::where('user_id' , $id)->get();
      $qualification = User_qualification::where('user_id' , $id)->get();

      $industry =  $mentor->industry ;
      
      $similar_mentors = User::where('industry', $industry)->limit(18)->get();
       return view('front.user.profiles.mentor', ['user' => $mentor ,'similar_mentors' =>$similar_mentors ,'qualification' =>$qualification ,'skills' =>$skills,'webinar' =>$webinar ,'quizze' =>$quizze ,'community' =>$community ,'sp_session_accept' =>$sp_session_accept ,'session' =>$session  , 'reviews' => $reviews]);
      }
      else{
          return redirect()->back();
      }
    }
      
     

    public function coache_search(Request $request)
    {
     
      $title = $request->title;
 
      $coaches = User::when(1 , function ($query) use($title){
        return $query->where('type_id',3);
    })
    ->when(!empty($title) , function ($query) use($title){
      return $query->where('first_name','like','%'. $title . '%')->orWhere('bio','like','%'. $title . '%')->orWhere('last_name','like','%'. $title . '%');
  })
     ->latest()->paginate(15);
      
      $induatries =Industry::get();
        $city = City::get();
        $country = Country::get();
        $featured_coaches = User::where('type_id' , 3)->where('is_featured' , 1)->inRandomOrder()->limit(6)->get();
        
        return view('front.coaches.list')->with(['coache1' => $coaches ,'coaches' => $coaches , 'industries' => $induatries , 'cities'=>$city ,'featured_coaches'=>$featured_coaches , 'country'=>$country]);
 
    }

    public function coache_filter(Request $request)
    {
     
      $title = $request->title;
      $industry = $request->industry;
      $countryy = $request->country;
      $cityy = $request->city;
 
      // $coaches = User::where('first_name','like','%'. $title . '%')->Where('last_name','like','%'. $title . '%')->Where('bio','like','%'. $title . '%')->where('industry' , $industry)->where('country' , $countryy)->where('city' , $cityy)->where('type_id' , 3)->get();
       $coaches = User::when(1 , function ($query) use($title){
                                          return $query->where('type_id' ,3);
                                      })
                                   ->when(!empty($title) , function ($query) use($title){
                                        return $query->where('first_name','like','%'. $title . '%')->orWhere('bio','like','%'. $title . '%')->orWhere('last_name','like','%'. $title . '%');
                                    })
                                    ->when(!empty($industry) , function ($query) use($industry){
                                        return $query->where('industry' ,'=' , $industry);
                                    })
                                    ->when(!empty($countryy) , function ($query) use($countryy){
                                        return $query->where('country' , $countryy);
                                    })
                                    ->when(!empty($cityy) , function ($query) use($cityy){
                                        return $query->where('city' , $cityy);
                                    })

                                    ->latest()->paginate(10);
       
        $induatries =Industry::get();
        $city = City::get();
        $country = Country::get();
        $featured_coaches = User::where('type_id' , 3)->where('is_featured' , 1)->inRandomOrder()->limit(6)->get();
        
        return view('front.coaches.list')->with(['coaches' => $coaches ,'coache1' => $coaches , 'industries' => $induatries , 'cities'=>$city ,'featured_coaches'=>$featured_coaches , 'country'=>$country]);
 
    }


    public function company_profile($slug)
    {
        $mentor = User::where('slug' , $slug)->first();
      if($mentor){
       $id= $mentor->id;
      $skills = User_skill::where('user_id' , $id)->get();
      $service = Service_detail::where('user_id' , $id)->limit(5)->get();
      $industry =  $mentor->industry ;
      $reviews = Review::where('user_id', $id)->latest()->limit(10)->get();  
        $webinar = Service_detail::where('name' , 'webinar')->where('user_id', $id)->count();
        $workshopss = Service_detail::where('user_id',$id)->where('name','webinar')->count();
        $coursess = Service_detail::where('user_id',$id)->where('name','course')->count();
        $internshipss = Service_detail::where('user_id',$id)->where('name','internship')->count();
        $programss = Service_detail::where('user_id',$id)->where('name','program')->count();
        $projectss = Service_detail::where('user_id',$id)->where('name','project')->count();
        $eventss = Service_detail::where('user_id',$id)->where('name','event')->count();
        $seminarss = Service_detail::where('user_id',$id)->where('name','seminar')->count();

      $similar_company = User::where('industry', $industry)->where('type_id', 5)->get();
       return view('front.user.profiles.companie_lnstitution', ['user' => $mentor ,'similar_company' =>$similar_company ,'service' =>$service  , 'reviews' => $reviews  , 'webinar' => $webinar , 'workshopss' => $workshopss , 'coursess' => $coursess , 'internshipss' => $internshipss , 'programss' => $programss , 'projectss' => $projectss , 'eventss' => $eventss , 'seminarss' => $seminarss]);
      }
      else{
          return redirect()->back();
      }
        
     
    }


    public function get_cities($name)
    {

        $c = Country::where('name' , $name)->first();
         $id = $c->id;
      $cities = City::where('country_id' , $id)->pluck("name", "id");
       return $cities; 
    }

    public function participate()
    {
      $services = Service_detail::latest()->paginate(15);
      $industries =Industry::get();
      $featured_service = Service_detail::where('featured_service' , 1)->limit(5)->get();
    
      return view('front.participate.list')->with(['services' => $services , 'featured_service' => $featured_service , 'industries' => $industries ]);

    }
    public function Details($slug)
    {
      $service = Service_detail::where('slug' , $slug)->first();
      if($service){
      $id = $service->id;
      $user_id = $service->user_id;
      $service_name = $service->name;
      $other_services = Service_detail::where('name', $service_name)->limit(5)->get();
      $sd_time = Sd_time::where('service_id', $id)->get();
      $user = User::find($user_id);
      return view('front.participate.details')->with(['service' => $service , 'other_services' => $other_services , 'sd_time' => $sd_time , 'user' =>$user]);
      }
      else{
    return redirect()->back();

      }
      
    }

    public function service_search(Request $request)
    {
      $industries =Industry::get();
      $title = $request->title;      
      $service = Service_detail::where('name','like','%'. $title . '%')->orWhere('title','like','%'. $title . '%')->orWhere('about','like','%'. $title . '%')->latest()->paginate(10);
      $featured_service = Service_detail::where('featured_service' , 1)->limit(5)->get();
        return view('front.participate.list')->with(['services' => $service , 'featured_service' => $featured_service , 'industries' => $industries]);

    }//zzz
     public function service_filter(Request $request)
    {
       
      $industries =Industry::get();
      $featured_service = Service_detail::where('featured_service' , 1)->limit(5)->get();

      $name = $request->name;
      $date = $request->date;
      if($date == 1){
        $date = Carbon::now()->subDay(3);
      }elseif($date == 2){
        $date = Carbon::now()->subDay(9);
      }elseif($date == 3){
        $date = Carbon::now()->subMonths();
      }
      $service = Service_detail::when(!empty($name) , function ($query) use($name){
                                        return $query->where('name','like','%'. $name . '%');
                                    })
                                    ->when(!empty($date) , function ($query) use($date){
                                        return $query->whereDate('created_at','>=',$date);
                                    }) ->latest() ->paginate(10);

     return view('front.participate.list')->with(['services' => $service , 'featured_service' => $featured_service , 'industries' => $industries]);

    }


    public function dp_profile($id)
    {
      $pd_plan = Pd_plan::find($id);
      if($pd_plan){
      $pd_gools = Pd_gool::where('pd_plan_id' , $id)->with('pd_subgool')->get();
     foreach($pd_gools as $pd_gool){
      $count_subgool= $pd_gool->pd_subgool->count();
      $count_subgooldone = Pd_subgool::where('status', 1)->where('pd_gool_id', $pd_gool->id)->count();
      $rate = @(int)($count_subgooldone/$count_subgool*100);
      $pd_gool->rate=$rate;
     } 
      return view('front.user.pd_plan', ['pd_plan' => $pd_plan ,'pd_gool' =>$pd_gools]);
      }
      else{
          return redirect()->back();
      }
    }


    public function learner_profile($slug)
    {
       $mentor = User::where('slug' , $slug)->where('type_id' ,4)->first();
      if($mentor){
          $id= $mentor->id;
      $skills = User_skill::where('user_id' , $id)->get();
      $qualification = User_qualification::where('user_id' , $id)->get();
        $reviews = Review::where('user_id', $id)->latest()->limit(10)->get();  

      $industry =  $mentor->industry ;
      
      $similar_mentors = User::where('industry', $industry)->get();
       return view('front.user.profiles.learner_profile_backup', ['user' => $mentor ,'similar_mentors' =>$similar_mentors ,'qualification' =>$qualification ,'skills' =>$skills  ,'reviews' =>$reviews]);
      }
      else{
          return redirect()->back();
      }
}}
