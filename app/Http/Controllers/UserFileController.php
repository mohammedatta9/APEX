<?php

namespace App\Http\Controllers;
use App\Models\User_file; 
use App\Models\User_folder; 

use Illuminate\Http\Request;

class UserFileController extends Controller
{

    public function index()
    {
        $id=auth()->user()->id;
        $floders = User_folder::where('user_id',$id)->latest()->get();
        $files = User_file::where('user_id',$id)->where('folder_id',null)->get();

        return view('front.user.files.folders')->with(['floders' => $floders , 'files' => $files ]);

    }
    public function file_store(Request $request)
    { 
       $imageUpload = new User_file();

       if (request()->file != null) {
           $file = $this->uploadImage('users', $request->file('file'));
           $imageUpload->file =  $file;
         }
         $imageUpload->user_id = \auth()->user()->id; 
         $imageUpload->folder_id = $request->id; 
         $imageUpload->name = $request->file('file')->getClientOriginalName();

       $imageUpload->save();
       return response()->json(['success'=>$file]);    
                    
 }
 public function file_delete(Request $request)
    {
        $filename =  $request->get('filename');
        User_file::where('file',$filename)->delete();
        $path=public_path().'/storage/users/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

 function uploadImage($folder, $image)
 {
     $image->store('/', $folder);
     $filename = $image->hashName();
     $path = $filename;
     return $path;
 }

 public function folder_store(Request $request)
 { 
    try {
      $request->validate([
          'name' => 'required',
      ]);
       $f = User_folder::create([
           'user_id' => \auth()->user()->id,
           'name' =>   $request->name,
     
       ]);
                  
       if($f) {
        notify()->success('');
          return redirect()->back()->with('success', 'Seved!');
      } else  {
          return redirect()->back()->with('error', 'There is an error in your data');
      }

}
catch (\Exception $e){
    return redirect()->back()->with('error', 'Something wrong, please try again' );
}
}


public function folder_delete(Request $request)
{ 
    try {
        $f = User_folder::find($request->id)->delete();
                    
         if($f) {
            notify()->success('Deleted');
            return redirect()->back();
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

  
public function folder_edit(Request $request)
{ 
    try {
        $f = User_folder::find($request->id);
        $f->name = $request->name;   
        $f->save();   
         if($f) {
            notify()->success('Saved!');
            return redirect()->back();
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


  
public function file_delete2(Request $request)
{ 
    try {
        $f = User_file::find($request->id)->delete();
                    
         if($f) {
            notify()->success('Deleted!');

            return redirect()->back();
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

  
public function file_edit(Request $request)
{ 
    try {
        $f = User_file::find($request->id);
        if($request->name){ 
            $f->name = $request->name; }
       
        $f->folder_id = $request->folder_id;     
        $f->save();   
         if($f) {
            notify()->success('Saved! ');

            return redirect()->back();
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

  public function folder($id)
    {
        $f = User_folder::where('id' , $id)->first();
        $user = auth()->user()->id;
      if($f){
      $files = User_file::where('folder_id' , $f->id)->get();
      $floders = User_folder::where('user_id',$user)->latest()->get();

      
      return view('front.user.files.files')->with(['floders' => $floders , 'files' => $files , 'id' => $id ]);
    }
      else{
          return redirect()->back();
      }
        
     
    }
}
