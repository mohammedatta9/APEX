<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Community_member;
use App\Models\Community_post;
use App\Models\Industry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CommunityController extends Controller
{




    public function communities_list()
    {
         return view('admin.communities.list');
    }

    public function communitiesajax(Request $request)
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
        $totalRecords = Community::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Community::select('count(*) as allcount')->Where('name', 'like', '%' . $searchValue . '%')->count();
        $records = Community::orderBy($columnName, $columnSortOrder)
           ->Where('name', 'like', '%' . $searchValue . '%')
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
            $By = $record->user->first_name ;
         
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "By" => $By,

                "actions" => '
<a href="' . route('admin.communities.profile', [$record->id]) . '"><i class=" far fa-edit  text-secondary font-20"></i></a>
<a href="' . route('admin.communities.profile', [$record->id]) . '"><i class=" las la-trash-alt  text-secondary font-20"></i></a>
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
     
    public function communities_profile($id)
    {
        $industries = Industry::get();
        $community  = Community::where('id', $id)->first();
         return view('admin.communities.profile')->with('c', $community)->with('industries', $industries);
    }



    public function communities_edit(Request $request)
    { 
      
                 
                    $request->validate([
                        'name' => 'required',
                        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

                    ]);
                     $community = Community::findOrFail($request->id);  
                     if ($community){
                     if (request()->image != null) {
                        $image = $this->uploadImage('users', $request->file('image'));
                        $community->image =  $image;
                    } 
            
                    
                    
                    $community->name =  $request->name;
                    $community->slug = Str::slug($request->name);
                    
                    $community->category_id =  $request->category_id;
                    $community->about =  $request->about;
                    
                    $community->save();                     
                  
                    return redirect()->back()->with('success', '  updated successfully');
                } else {
                    return redirect()->back()->with('error', 'please try again');
                }  
     
          }
          public function communities_post($id)
          {
              $industries = Industry::get();
              $post  = Community_post::where('id', $id)->first();
               return view('admin.communities.post')->with('post', $post)->with('industries', $industries);
          }


                
  public function post_edit(Request $request)
  { 
                try {
                  $request->validate([
                      'title' => 'required',
                      'text' => 'required',
                      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

                  ]);
                   $post = Community_post::find($request->id); 

                   if (request()->image != null) {
                      $image = $this->uploadImage('users', $request->file('image'));
                      $post->image =  $image;
                  }
          
                  $post->title =  $request->title;
                  $post->text =  $request->text;
                    
                  $post->save();                     
                
                            
                   if($post) {
                      return redirect()->back()->with('success', '  updated successfully');
                  } else  {
                      return redirect()->back()->with('error', 'There is an error in your data');
                  }
  
        }
         catch (\Exception $e){
                return redirect()->back()->with('error', 'Something wrong, please try again'.$e);
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
