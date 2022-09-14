<?php

namespace App\Http\Controllers;
use App\Models\Quizze;
use App\Models\Quiz_question;
use App\Models\Quiz_Skill;
use App\Models\Quiz_Result;
use App\Models\FinalResult;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Question_option;

use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public function quizze_store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
             'description' => 'required',
             'category' => 'required',
        ]);
        
       if( $request->id ){
        $Quiz = Quizze::where('id',$request->id)->first();
       }else{
        $Quiz = new Quizze();
       }
        
        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
         $Quiz->image = $image;
        } 
 
        $Quiz->title = $request->title;
        $Quiz->user_id = auth()->user()->id;
        $Quiz->description =   $request->description;
        $Quiz->category = $request->category;
        $Quiz->type = $request->type;
        
        $Quiz->save();

            if( $request->skill){
            $skill = $request->skill;
            for($i = 0; $i < count($skill); $i++)
                {
                 if( $request->skill =! ""){
                $quiz_skill =new Quiz_Skill();
                $quiz_skill->quiz_id = $Quiz->id;
                $quiz_skill->skill_id = $skill[$i] ;          
                $quiz_skill->save();}
                }
            }
       
        $id = $Quiz->id; 

        if ($Quiz)
        return response()->json([
            'status' => true,
            'msg' => 'successfully',
            'id' => $id,
        ]);

    else
        return response()->json([
            'status' => false,
            'msg' => 'error',
        ]);  
        
    }

    public function publish_quiz(Request $request)
    { 
        
        
   
        $Quiz = Quizze::where('id',$request->id)->first();
        
        
        if($Quiz->questions->count() > 0){

            $Quiz->publish = 1 ;
        
        
            $Quiz->save();
     
    
            if ($Quiz){
                notify()->success('Now users can see it!');

                return redirect('/quizzes');
            }
            
    
        else{
            notify()->error('There is an error in your data');

            return redirect()->back(); 
        }
            
        } 
        else{
            notify()->error('It must contain questions');

            return redirect()->back();
        }

            
       
        
    }

    public function quizze_edit(Request $request)
    {

        $request->validate([
            'title' => 'required',
             'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        
        $Quiz = Quizze::where('id',$request->id)->first();
        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
         $Quiz->image = $image;
        } 
 
        $Quiz->title = $request->title;
        $Quiz->date = $request->date;
        $Quiz->link = $request->link;
        $Quiz->user_id = auth()->user()->id;
        $Quiz->notes =   $request->notes;
        $Quiz->description =   $request->description;
        $Quiz->time = $request->time;
        $Quiz->time_to = $request->time_to;
        $Quiz->deadline = $request->deadline;
        $Quiz->fees = $request->fees;

        $Quiz->save();
         if($Quiz)  
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
    public function quizze_delete(Request $request)
    {        
        $Quiz = Quizze::where('id',$request->id)->first();
          $Quiz->delete();

          if($Quiz)   {

            if($request->f){
                notify()->success('Deleted!');

                return redirect('/profile');
            }else
          
            return response()->json([
                'status' => true,
                'msg' => 'successfully',
            ]);
          }

      else {
        if($request->f){
        notify()->error('There is an error in your data');

        return redirect()->back();}
        else
        return response()->json([
            'status' => false,
            'msg' => 'error',
        ]);   
      }
         
    }


    public function result_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        $result =new Quiz_Result();
        

        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
            $result->image =  $image;

        } 

   
        $result->title =  $request->title;
        $result->quiz_id =  $request->quiz_id;
         
       
        $result->save();

        
          if($result) {
            notify()->success('');

              return redirect()->back();
           } else  {
            notify()->error('There is an error in your data');

            return redirect()->back();
          }    

 
    }

    public function result_edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        $result = Quiz_Result::where('id', $request->id)->first();
        
        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
            $result->image =  $image;

        } 

   
        $result->title =  $request->title;
      
         
       
        $result->save();

        
          if($result) {
            notify()->success('');

              return redirect()->back();
           } else  {
            notify()->error('There is an error in your data');

            return redirect()->back();
          }    
 
    }
    public function result_delete(Request $request)
    {
        $r = Quiz_Result::where('id', $request->id)->first();       
        $r->delete();
          if($r) { notify()->success('delete! ');
              return redirect()->back();
           } else  {
            notify()->error('There is an error in your data');
               return redirect()->back();
          }    

 
    }


    public function question_store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        $question =new Quiz_question();
        

        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
            $question->image =  $image;

        } 

   
        $question->title =  $request->title;
        $question->quiz_id =  $request->quiz_id;
        $question->notes =  $request->notes;
       
        $question->save();

        $answer = $request->answer;
        $is_true = $request->is_true;
        for($i = 0; $i < count($answer); $i++)
          {
              if($answer != ""){
                $option =new Question_option();
                $option->quiz_question_id = $question->id;
                $option->answer = $answer[$i] ;     
                $option->is_true = $is_true[$i] ;     
                $option->save();
              }
           
          }
          if($question) {
            notify()->success('');

              return redirect()->back();
           } else  {
            notify()->error('There is an error in your data');

            return redirect()->back();
          }    

 
    }

    public function question_edit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',        

        ]);
        $question = Quiz_question::where('id', $request->id)->first();
        

        if (request()->image != null) {
            $image = $this->uploadImage('users', $request->file('image'));
            $question->image =  $image;

        } 

   
        $question->title =  $request->title;
         $question->title_note =  $request->title_note;
        $question->notes =  $request->notes;
        $question->type =  $request->type;
       
        $question->save();

        $answer = $request->answer;
        $is_true = $request->is_true;
        for($i = 0; $i < count($answer); $i++)
          {
              if( $answer[$i] == ""){}else{
           $option =new Question_option();
           $option->quiz_question_id = $question->id;
           $option->answer = $answer[$i] ;     
           $option->is_true = $is_true[$i] ;     
           $option->save();}
          }
          if($question) {
            notify()->success('Edit success! ');

            

              return redirect()->back();
           } else  {
              notify()->error('There is an error in your data');
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }
    public function question_delete(Request $request)
    {
        $question = Quiz_question::where('id', $request->id)->first();       
        $question->delete();
          if($question) { notify()->success('delete! ');
              return redirect()->back();
           } else  {
            notify()->error('There is an error in your data');
               return redirect()->back();
          }    

 
    }


    public function delete_option(Request $request)
    {  
        $o =  Question_option::find($request->id);
        
        $o->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }
    public function delete_skill(Request $request)
    {  
        $o =  Quiz_skill::find($request->id);
        
        $o->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }
    
    public function quiz_view($id){
        $quiz = Quizze::where('id',$id)->first();
        $skills = Quiz_skill::where('quiz_id', $quiz->id)->get();
        if($quiz){
        return view('front.quizzes.view')->with('quiz',$quiz)->with('skills',$skills);
        }
        else{
            return redirect()->back();
        }
    }
    
    public function quizzes(){
        $quiz = Quizze::latest()->where('publish',1)->paginate(10);
        $quizzes1 = Quizze::inRandomOrder()->limit(5)->get();
        $industry = Industry::get();
        $skills = Skill::get();

        if($quiz){
        return view('front.quizzes.list')->with(['quizzes' => $quiz , 'quizzes1' => $quizzes1 ,'skills' => $skills ,'industries' => $industry ]);
        }
        else{
            return redirect()->back();
        }
    }
    public function quizze_search(Request $request)
    {
     
      $title = $request->title;      
      $quizzes = Quizze::when(1 , function ($query) use($title){
        return $query->where('publish',1);
    })
    ->when(!empty($title) , function ($query) use($title){
      return $query->where('title','like','%'. $title . '%')->orWhere('description','like','%'. $title . '%');
  })
     ->latest()->paginate(10);
     
      $quizzes1 = Quizze::inRandomOrder()->limit(5)->get();
      $industry = Industry::get();
      $skills = Skill::get();
        return view('front.quizzes.list')->with(['quizzes' => $quizzes , 'quizzes1' => $quizzes1 , 'industries' => $industry , 'skills' => $skills]);

    }
     public function quizze_filter(Request $request)
    { 
        $title = $request->title;
        $skills = $request->skills;
        $type = $request->type;
        $category = $request->category;
        $skill_quiz =  Quiz_Skill::where('skill_id' ,$request->skills)->get();
   
        // $coaches = User::where('first_name','like','%'. $title . '%')->Where('last_name','like','%'. $title . '%')->Where('bio','like','%'. $title . '%')->where('industry' , $industry)->where('country' , $countryy)->where('city' , $cityy)->where('type_id' , 3)->get();
         $quizzes = Quizze::when(1 , function ($query) use($title){
                                    return $query->where('publish',1);
                                })
                                ->when(!empty($title) , function ($query) use($title){
                                          return $query->where('title','like','%'. $title . '%')->orWhere('description','like','%'. $title . '%');
                                      })
                                      ->when(!empty($category) , function ($query) use($category){
                                          return $query->where('category' ,'=' , $category);
                                      })
                                      ->when(!empty($type) , function ($query) use($type){
                                          return $query->where('type' , $type);
                                      })
                                    //   ->when(!empty($skill_quiz) , function ($query) use($skill_quiz){
                                    //       foreach($skill_quiz as $skill_quiz){
                                    //         return $query->where('id' , $skill_quiz->quiz_id);

                                    //       }
                                    //   })
  
                                    ->latest()->paginate(10);
           
     
      $ids = $request->ids;      
     // $quizzes = Quizze::where('intitution_id', $ids )->paginate(10);
      $quizzes1 = Quizze::inRandomOrder()->limit(5)->get();
      $industry = Industry::get();
      $skills = Skill::get();
      return view('front.quizzes.list')->with(['quizzes' => $quizzes , 'quizzes1' => $quizzes1 , 'industries' => $industry , 'skills' => $skills ]);

    }
    
    public function start_quiz($id){
        $quiz = Quizze::where('id' , $id)->first();
        if($quiz){
        return view('front.quizzes.start')->with('quiz',$quiz);
        }
        else{
            return redirect()->back();
        }
    }
    
    public function quiz_result(Request $request)
    {
        $quiz = Quizze::where('id' , $request->id)->first();
        $quiz->participants = $quiz->participants +1 ;
        $quiz->save();
        $array = [];
        foreach($quiz->questions as $q){ 

        $idqq = $request->q[$q->id];
        $answer = Question_option::where('id' , $idqq)->first();
        if($answer->is_true){$array[] = $answer->is_true;}
        
        } 

       $values = array_count_values($array);
        arsort($values);
         $popular = array_slice(array_keys($values), 0, 1);
          foreach($popular as $a){
           $result =  Quiz_Result::where('id', $a)->first();
           break;
          }
         
          if($popular ){
          if($result ){

            $finalresult = new FinalResult();
            $finalresult->title = $result->title;
            $finalresult->title_quiz = $quiz->title;
            $finalresult->user_id = auth()->user()->id;
            $finalresult->image = $result->image;
            $finalresult->save();
          }
        }

            if($popular){
                return view('front.quizzes.quiz_result')->with('result',$finalresult);

            }else{
              notify()->error('There is an error in your data');

              return redirect()->back();
            }
    
    }
    public function result_quiz($id)
    {
        $finalresult = FinalResult::where('id',$id)->first();
         
            if($finalresult){
                return view('front.quizzes.quiz_result2')->with('result',$finalresult);

            }else{
              notify()->error('There is an error in your data');

              return redirect()->back();
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
