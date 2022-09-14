<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function articles_list()
    {
         return view('admin.articles.list');
    }

    public function articlesajax(Request $request)
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
        $totalRecords = Article::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Article::select('count(*) as allcount')->Where('title', 'like', '%' . $searchValue . '%')->orWhere('sub_title', 'like', '%' . $searchValue . '%')->count();
        $records = Article::orderBy($columnName, $columnSortOrder)
           ->Where('title', 'like', '%' . $searchValue . '%')
           ->Where('sub_title', 'like', '%' . $searchValue . '%')
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
            $sub_title = $record->sub_title ;
            $By = $record->user->first_name ;
         
            $data_arr[] = array(
                "id" => $id,
                "title" => $title,
                "sub_title" => $sub_title,
                "By" => $By,

                "actions" => '
<a href="' . route('admin.articles.profile', [$record->id]) . '"><i class=" far fa-edit  text-secondary font-20"></i></a>
<a href="' . route('admin.articles.profile', [$record->id]) . '"><i class=" las la-trash-alt  text-secondary font-20"></i></a>
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
     
    public function articles_profile($id)
    {
         $article  = Article::where('id', $id)->first();
         return view('admin.articles.profile')->with('c', $article);
    }



    public function articles_edit(Request $request)
    { 
      
        $request->validate([
            'title' => 'required',
           'sub_title' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048', 
              ]);
   
           $article = Article::find($request->id);
           if($article){
           if (request()->image != null) {
               $image = $this->uploadImage('users', $request->file('image'));
               $article->image =  $image;
           }
           
           $article->title =  $request->title;
           $article->slug = Str::slug($request->title);
           $article->sub_title =  $request->sub_title;
           $article->text =  $request->text;
           $article->approved_by = $request->approved_by;
           $article->save();                   
                  
                    return redirect()->back()->with('success', '  updated successfully');
                } else {
                    return redirect()->back()->with('error', 'please try again');
                }  
     
          }

          public function articles_save(Request $request)
    { 
      
        $request->validate([
            'title' => 'required',
           'sub_title' => 'required',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048', 
              ]);
   
           $article =  new Article();
           if($article){
           if (request()->image != null) {
               $image = $this->uploadImage('users', $request->file('image'));
               $article->image =  $image;
           }
           
           $article->title =  $request->title;
           $article->slug = Str::slug($request->title);
           $article->sub_title =  $request->sub_title;
           $article->user_id =  auth()->user()->id;
           $article->text =  $request->text;
           $article->approved_by = 1;

           $article->save();                   
                  
                    return redirect()->back()->with('success', '  updated successfully');
                } else {
                    return redirect()->back()->with('error', 'please try again');
                }  
     
          }

          
                    

public function article_delete(Request $request)
{
 
    $article = Article::findOrFail($request->id);

   
      $article->delete();
    
      if ($article)
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
 
}
