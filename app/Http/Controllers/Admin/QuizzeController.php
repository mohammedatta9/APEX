<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Quizze;
use App\Models\Quiz_question;
use App\Models\Industry;
use App\Models\Question_option;

use Illuminate\Http\Request;

class QuizzeController extends Controller
{




    public function quizzes_list()
    {
         return view('admin.quizzes.list');
    }

    public function quizzesajax(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        if ($request->get('order') == 'title') {
            $rorder = "title";
        } else {
            $rorder = $request->get('order');
        }
        $columnIndex_arr = $rorder;
        $columnName_arr = $request->get('columns');
        $order_arr = $rorder;
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        //$columnName = $columnName_arr[$columnIndex]['data']; // Column name
        if ($columnName_arr[$columnIndex]['data'] == 'title') {
            $columnName = "title";
        } else {
            $columnName = $columnName_arr[$columnIndex]['data'];
        }

        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Quizze::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Quizze::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        $records = Quizze::orderBy($columnName, $columnSortOrder)
           // ->with('industry')
           ->where('title', 'like', '%' . $searchValue . '%')
            ->select('*')
            ->skip($start)
            ->take($rowperpage)
            ->orderBy('id', 'desc')
            ->get();


        // Fetch records


        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $title = $record->title ;
           // $industry= $record->industry->name;
        
            $data_arr[] = array(
                "id" => $id,
                "title" => $title,
                //"industry" => $industry,
                 
                "actions" => '
<a href="' . route('admin.quizzes.profile', [$record->id]) . '"><i class=" far fa-edit  text-secondary font-20"></i></a>
<a href="' . route('admin.quizzes.profile', [$record->id]) . '"><i class=" las la-trash-alt  text-secondary font-20"></i></a>
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
     
     
    public function quizzes_profile($id)
    {
        $industries = Industry::get();
        $quizze  = Quizze::where('id', $id)->first();
         return view('admin.quizzes.profile')->with('c', $quizze)->with('industries', $industries);
    }



    public function quizzes_edit(Request $request)
    { 
        $request->validate([
            'title' => 'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        
        $Quiz = Quizze::where('id',$request->id)->first();
        if($Quiz){
        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
         $Quiz->image = $image;
        } 
 
        $Quiz->title = $request->title;
        $Quiz->skills = $request->skills;
        $Quiz->intitution_id = $request->intitution_id;
        $Quiz->notes =   $request->notes;
        $Quiz->duration =   $request->duration;
        $Quiz->description =   $request->description;

          $Quiz->save();              
                  
                    return redirect()->back()->with('success', '  updated successfully');
                } else {
                    return redirect()->back()->with('error', 'please try again');
                }  
     
          }
          public function quizzes_question($id)
          {
              $industries = Industry::get();
              $q  = Quiz_question::where('id', $id)->first();
               return view('admin.quizzes.question')->with('qs', $q)->with('industries', $industries);
          }
 
          function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }
 
   
}
