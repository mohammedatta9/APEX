<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Join_request;
use App\Models\Service_detail;
use App\Models\User_participate;
use App\Notifications\AcceptRegRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;

class UsersController extends Controller
{
    //
    public function join_requests()
    {
        return view('admin.joinrequests.list');
    }

    public function join_requestsajax(Request $request)
    {

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        if ($request->get('order') == 'name') {
            $rorder = "first_name";
        } else {
            $rorder = $request->get('order');
        }
        $columnIndex_arr = $rorder;
        $columnName_arr = $request->get('columns');
        $order_arr = $rorder;
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        //$columnName = $columnName_arr[$columnIndex]['data']; // Column name
        if ($columnName_arr[$columnIndex]['data'] == 'name') {
            $columnName = "first_name";
        } else {
            $columnName = $columnName_arr[$columnIndex]['data'];
        }

        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Join_request::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Join_request::select('count(*) as allcount')->where('first_name', 'like', '%' . $searchValue . '%')->orWhere('last_name', 'like', '%' . $searchValue . '%')->orWhere('email', 'like', '%' . $searchValue . '%')->count();
        $records = Join_request::orderBy($columnName, $columnSortOrder)
            ->where('first_name', 'like', '%' . $searchValue . '%')
            ->orWhere('last_name', 'like', '%' . $searchValue . '%')
            ->orWhere('email', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy('id', 'desc')
            ->get();


        // Fetch records


        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->first_name . " " . $record->last_name;
            $email = $record->Email;
            $type = $record->type;
            $dob = $record->Date_Birth;
            $Phone = $record->Phone;
            $Nationality = @$record->Nationality;
            $created_at = $record->created_at->format('d/m/Y');

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "type" => $type,
                "email" => $email,
                "Date_Birth" => $dob,
                "created_at" => $created_at,
                "Phone" => $Phone,
                "Nationality" => $Nationality,
                "actions" => '
<a href="' . route('admin.request.view', [$record->id]) . '"><i class=" far fa-eye  text-secondary font-16"></i></a>
'

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    public function join_requests_view($id)
    {
        $r = Join_request::where('id', $id)->first();
        if ($r) {
            return view('admin.joinrequests.view')->with('request', $r);
        } else {
            return redirect()->back()->with('error', 'Invalid request');
        }
    }

    public function save_request(Request $request)
    {
        $re = Join_request::where('id', $request->id)->first();
        if ($re) {
            $exist = User::where('email', $re->Email)->first();
            if ($exist) {
                return redirect()->back()->with('error', 'The email already registered before');
            }
            $password = rand(000000, 999999);
            if ($re->type == "mentor") {
                $type = 2;
            } else {
                $type = 3;
            }
            try{
                $user = new User();
                $user->first_name = $re->first_name;
                $user->last_name = $re->last_name;
                $user->slug = str_slug($re['first_name'] . ' ' . $re['last_name'] . ' ' . rand(000000, 999999));
                $user->dob = $re->Date_Birth;
                $user->gender = $re->gender;
                $user->phone = $re->Phone;
                $user->image = $re->personal_photo;
                $user->email = $re->Email;
                $user->password = Hash::make($password);
                $user->type_id = $type;
                $user->created_by = auth()->user()->id;
                $user->status = 1;
                $user->is_featured = 0;
                $user->job_title = $re->current_Job_Title;
                $user->industry = $re;
                $user->facebook = $re->Facebook_link;
                $user->linkedin = $re->Linkedin;
                $user->video = $re->video;
                $user->is_admin = 0;
                $user->cv_link = $re->cv_link;
                $user->cv_file = $re->cv_file;
                $user->portfolio_link = $re->portfolio_link;
                $user->portfolio_file = $re->portfolio_file;
    
                $user->save();
                $user->notify(new AcceptRegRequest($password));
    //            if($re->portfolio_file != ""){
    //                File::move(public_path('Join_request/'.$re->portfolio_file), public_path('users/'.$re->portfolio_file));
    //                //Storage::move(public_path('Join_request/'.$re->portfolio_file), public_path('users/'.$re->portfolio_file));
    //            }
    //            if($re->cv_file != ""){
    //                File::move(public_path('Join_request/'.$re->cv_file), public_path('users/'.$re->cv_file));
    //                //Storage::move(public_path('Join_request/'.$re->cv_file), public_path('users/'.$re->cv_file));
    //            }
    //            if($re->personal_photo != ""){
    //                File::move(public_path('Join_request/'.$re->personal_photo), public_path('users/'.$re->personal_photo));
    //                //Storage::move(public_path('Join_request/'.$re->personal_photo), public_path('users/'.$re->personal_photo));
    //            }
    
                $re->delete();
                return view('admin.joinrequests.list')->with('success', 'User Created successfully');
            }
            catch(Exception $e){
                return redirect()->back()->with('error', "You can't add in-complete request");
            }
        }

    }

    public function mentors_list()
    {
        $mentors = User::where('type_id', 2)->get();
        return view('admin.mentors.index')->with('mentors', $mentors);
    }

    public function mentor_profile($id)
    {
        $mentors = User::where('id', $id)->first();
        $sd = Service_detail::where('user_id', $mentors->id)->get();
        return view('admin.mentors.profile')->with('mentor', $mentors)->with('services', $sd);
    }

    public function mentor_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->first_name = $request->first_name;
            $mentor->last_name = $request->last_name;
            $mentor->dob = $request->dob;
            $mentor->gender = $request->gender;
            $mentor->address = $request->address;
            $mentor->phone = $request->phone;
            $mentor->country = $request->country;
            $mentor->city = $request->city;
            //$mentor->email = $request->email ;
            $mentor->status = $request->status;
            $mentor->is_featured = $request->is_featured;
            $mentor->job_title = $request->job_title;
            $mentor->bio = $request->bio;
            $mentor->industry = $request->industry;
            $mentor->facebook = $request->facebook;
            $mentor->linkedin = $request->linkedin;
            $mentor->save();
            return redirect()->back()->with('success', 'profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

    public function coaches_list()
    {
        $mentors = User::where('type_id', 3)->get();
        return view('admin.coaches.index')->with('mentors', $mentors);
    }

    public function coaches_profile($id)
    {
        $mentors = User::where('id', $id)->first();
        $sd = Service_detail::where('user_id', $mentors->id)->get();
        return view('admin.coaches.profile')->with('mentor', $mentors)->with('services', $sd);
    }

    public function coaches_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->first_name = $request->first_name;
            $mentor->last_name = $request->last_name;
            $mentor->dob = $request->dob;
            $mentor->gender = $request->gender;
            $mentor->address = $request->address;
            $mentor->phone = $request->phone;
            $mentor->country = $request->country;
            $mentor->city = $request->city;
            //$mentor->email = $request->email ;
            $mentor->status = $request->status;
            $mentor->is_featured = $request->is_featured;
            $mentor->job_title = $request->job_title;
            $mentor->bio = $request->bio;
            $mentor->industry = $request->industry;
            $mentor->facebook = $request->facebook;
            $mentor->linkedin = $request->linkedin;
            $mentor->save();
            return redirect()->back()->with('success', 'profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

    public function company_list()
    {
        $mentors = User::where('type_id', 5)->get();
        return view('admin.company.index')->with('mentors', $mentors);
    }

    public function company_profile($id)
    {
        $mentors = User::where('id', $id)->first();
        $sd = Service_detail::where('user_id', $mentors->id)->get();
        return view('admin.company.profile')->with('mentor', $mentors)->with('services', $sd);
    }

    public function company_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->first_name = $request->first_name;
            $mentor->last_name = $request->last_name;
            $mentor->dob = $request->dob;
            $mentor->gender = $request->gender;
            $mentor->address = $request->address;
            $mentor->phone = $request->phone;
            $mentor->country = $request->country;
            $mentor->city = $request->city;
            //$mentor->email = $request->email ;
            $mentor->status = $request->status;
            $mentor->is_featured = $request->is_featured;
            $mentor->job_title = $request->job_title;
            $mentor->bio = $request->bio;
            $mentor->industry = $request->industry;
            $mentor->facebook = $request->facebook;
            $mentor->linkedin = $request->linkedin;
            $mentor->save();
            return redirect()->back()->with('success', 'profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

    public function institution_list()
    {
        $mentors = User::where('type_id', 6)->get();
        return view('admin.institution.index')->with('mentors', $mentors);
    }

    public function institution_profile($id)
    {
        $mentors = User::where('id', $id)->first();
        $sd = Service_detail::where('user_id', $mentors->id)->get();
        return view('admin.institution.profile')->with('mentor', $mentors)->with('services', $sd);
    }

    public function institution_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->first_name = $request->first_name;
            $mentor->last_name = $request->last_name;
            $mentor->dob = $request->dob;
            $mentor->gender = $request->gender;
            $mentor->address = $request->address;
            $mentor->phone = $request->phone;
            $mentor->country = $request->country;
            $mentor->city = $request->city;
            //$mentor->email = $request->email ;
            $mentor->status = $request->status;
            $mentor->is_featured = $request->is_featured;
            $mentor->job_title = $request->job_title;
            $mentor->bio = $request->bio;
            $mentor->industry = $request->industry;
            $mentor->facebook = $request->facebook;
            $mentor->linkedin = $request->linkedin;
            $mentor->save();
            return redirect()->back()->with('success', 'profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }

    public function learner_list()
    {
        $mentors = User::where('type_id', 4)->get();
        return view('admin.learner.index')->with('mentors', $mentors);
    }

    public function learner_profile($id)
    {
        $mentors = User::where('id', $id)->first();
        $sd = Service_detail::where('user_id', $mentors->id)->get();
        return view('admin.learner.profile')->with('mentor', $mentors)->with('services', $sd);
    }

    public function learner_save(Request $request, $id)
    {
        $mentor = User::where('id', $id)->first();
        if ($mentor) {
            $mentor->first_name = $request->first_name;
            $mentor->last_name = $request->last_name;
            $mentor->dob = $request->dob;
            $mentor->gender = $request->gender;
            $mentor->address = $request->address;
            $mentor->phone = $request->phone;
            $mentor->country = $request->country;
            $mentor->city = $request->city;
            //$mentor->email = $request->email ;
            $mentor->status = $request->status;
            $mentor->is_featured = $request->is_featured;
            $mentor->job_title = $request->job_title;
            $mentor->bio = $request->bio;
            $mentor->industry = $request->industry;
            $mentor->facebook = $request->facebook;
            $mentor->linkedin = $request->linkedin;
            $mentor->save();
            return redirect()->back()->with('success', 'profile updated successfully');

        } else {
            return redirect()->back()->with('error', 'please try again');
        }
    }


    public function services_list()
    {
        $services = Service_detail::get();
        return view('admin.services.list')->with('services', $services);
    }

    public function servicesajax(Request $request)
    {

        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        if ($request->get('order') == 'name') {
            $rorder = "name";
        } else {
            $rorder = $request->get('order');
        }
        $columnIndex_arr = $rorder;
        $columnName_arr = $request->get('columns');
        $order_arr = $rorder;
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        //$columnName = $columnName_arr[$columnIndex]['data']; // Column name
        if ($columnName_arr[$columnIndex]['data'] == 'name') {
            $columnName = "name";
        } else {
            $columnName = $columnName_arr[$columnIndex]['data'];
        }

        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Service_detail::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Service_detail::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->orWhere('name', 'like', '%' . $searchValue . '%')->count();
        $records = Service_detail::orderBy($columnName, $columnSortOrder)
           ->where('title', 'like', '%' . $searchValue . '%')
            ->orWhere('name', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy('id', 'desc')
            ->get();


        // Fetch records


        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name ;
            $title = $record->title;
        
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "title" => $title,
                 
                "actions" => '
<a href="' . route('admin.services.profile', [$record->id]) . '"><i class=" far fa-edit  text-secondary font-20"></i></a>
<a href="' . route('admin.services.profile', [$record->id]) . '"><i class=" las la-trash-alt  text-secondary font-20"></i></a>
'

            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
     
    public function services_profile($id)
    {
        $service  = Service_detail::where('id', $id)->first();
        $up = User_participate::where('service_detail_id', $service->id)->get();
        return view('admin.services.profile')->with('up', $up)->with('service', $service);
    }
    // services_edit
    public function services_edit(Request $request)
    { 
        
         $request->validate([
            'title' => 'required',
             'about' => 'required' 
                        
          ]);

           $service = Service_detail::findOrFail($request->id);
           if($service){
           $service->title =  $request->title;
           $service->slug = Str::slug($request->title);
           if (request()->cover != null) {
            $cover = $this->uploadImage('services', $request->file('cover'));
            $service->cover = $cover;
            }
            $service->about = $request->about;
            $service->featured_service = $request->featured_service;
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
          $service->name =  $request->name;
          $service->qualifcation =  $request->qualifcation;
          $service->deadline =  $request->deadline;
           

            $service->save();
          
       
           
            
            return redirect()->back()->with('success', '  updated successfully');
        } else {
            return redirect()->back()->with('error', 'please try again');
        }        


         
       }
       function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }


}
