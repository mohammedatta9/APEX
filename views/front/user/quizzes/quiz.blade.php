@extends('layouts.main')

@section('content')


<style type="text/css">
header {
    background-color: #0d1b26;
    color: #fff;
    padding: 10px 0;
}

.hide-element {
    display: none;
}

.notificaton-icon,
.avater {
    display: inline-block;
}

</style>



<section class="filter-mentor bg-white">
    <div class="container ">
    @if(session()->has('message'))
                    <div class="alert alert-success col-sm-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('msg'))
                    <div class="alert alert-warning col-sm-4">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('msg') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger col-sm-4">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('error') }}
                    </div>
                @endif
        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-2">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Quiz / Exercise</h5>
                <div>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" href="#quiz-modal">
                    <i class="fa fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" href="#delquiz">
                    <i class="fa fa-trash"></i>
                </button></div>
            </div>
            <h5 class="modal-title mt-2  mb-2" id="exampleModalLabel">Rusults</h5>
    @foreach($result as $qs)
             <div class="col-sm-8 col-lg-8">
                <div class="make-question border clearfix">

                    <div class="float-left">{{$qs->title}}</div>
                    
                    <div class="float-right position-relative show-edit-question-box">
                        <a  >...</a>
                        <div class="edit-question-box">
                             <a href="#edit-result{{$qs->id}}" data-toggle="modal">Edit</a>
                            <a href="#delete-result{{$qs->id}}" data-toggle="modal">Delete</a>

                        </div>
                    </div>
                    </div>
                </div>
                
               <!-- question-modal Modal -->
<div class="modal fade" id="edit-result{{$qs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit a Result</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('result.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$qs->id}}" style="display: none;" />

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" value="{{$qs->title}}" maxlength="60" class="w-100 input-shadow" />
                             <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                         
                        <div class="col-sm-6 col-lg-6 collaborate">
                            @if($qs->image)
                            <img width="100" src="{{ asset('storage/users/'. $qs->image) }}" alt="" /><br>
                            @endif
                            <label class="font-weight-bold">Change Image</label>
                             
                                <input type="file" name="image"   />
                             
                        </div><br><br>
                          
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-result{{$qs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('result.delete') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$qs->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Delete" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<a href="#add-result" data-toggle="modal" class="font-20 btn mt-1">+ Add a Result To This @if($q->type == 1) Quiz @elseif ($q->type == 2) Exercise @endif</a>
<br><br>
<h5 class="modal-title mt-2  mb-2" id="exampleModalLabel">Questions</h5>
@foreach($questions as $qs)
             <div class="col-sm-8 col-lg-8">
                <div class="make-question border clearfix">

                    <div class="float-left">{{$qs->title}}</div>
                    
                    <div class="float-right position-relative show-edit-question-box">
                        <a  >...</a>
                        <div class="edit-question-box">
                             <a href="#edit-question{{$qs->id}}" data-toggle="modal">Edit</a>
                            <a href="#delete-question{{$qs->id}}" data-toggle="modal">Delete</a>
                            <a href="#view-question{{$qs->id}}" data-toggle="modal">View</a>

                        </div>
                    </div>
                    </div>
                </div>
                
               <!-- question-modal Modal -->
<div class="modal fade" id="edit-question{{$qs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit A question</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('question.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$qs->id}}" style="display: none;" />

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" value="{{$qs->title}}" maxlength="60" class="w-100 input-shadow" />
                             <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                         
                        <div class="col-sm-6 col-lg-6 collaborate">
                            <img width="100" src="{{ asset('storage/users/'. $qs->image) }}" alt="" /><br>
                            <label class="font-weight-bold"> Change Image</label>

                                <input type="file" name="image"   />
                             
                        </div><br>
                        
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Notes</label>
                            <input type="text" name="notes" value="{{$qs->notes}}" maxlength="160" class="w-100 input-shadow"  />
                         </div>
                        <div class="col-sm-8 col-lg-8">
                        <div class="row m-0 mb-3">
                            <label class="font-weight-bold col-lg-12">Answers</label>
                            <table class="table">
                        @foreach ($qs->question_options as $qq)
                            <tr class="R_option{{$qq->id}}">
                                <td>Option #{{ $loop->iteration }}</td>
                                <td>{{$qq->answer}}</td>
                                <td> @foreach ($result as $re)
                                           @if($qq->is_true == $re->id)  {{ $re->title }} @endif
                                            @endforeach</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteoption" optionid="{{$qq->id}}" >
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
 
                            <div id="myRepeatingFieldsqe{{$qs->id}}">
                                <div class="entry input-group col-xs-3">
                                    <table class="table meeting-table class-table">
                                        <tr>
                                             <td><input type="text" name="answer[]"  maxlength="60"/></td> 
                                             <td><select name="is_true[]" >
                                             @foreach ($result as $re)
                                            <option value="{{ $re->id }}" >{{ $re->title }}</option>
                                            @endforeach
                                               </select</td>
                                             <td>  <button type="button" class="btn btn-lg btn-addqe" idqs="{{$qs->id}}">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                        </button></td>
                                        </tr>
                                    </table>
                                    <span class="input-group-btn">
                                       
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                       
               
                    </div>
                         
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Update" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete-question{{$qs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete A question</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('question.delete') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$qs->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Delete" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-question{{$qs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View A question</h5>
            </div>
            <div class="modal-body form-style">
            
            <h4 class="pt-3 pb-4">{{ $qs->title }}</h4>
                @if($qs->image)
                <img src="{{asset('/storage/users/'.$qs->image)}}" alt="quiz">
                @endif
                <!--<img src="images/placeholder-image.png" alt="image" class="w-100">-->
                <div class="quiz-selction pt-4 col-lg-12 pl-2 label-hover">
                     @foreach($qs->question_options as $qq)
                     @if($qq->answer)
                    <label class="custom-radio border"><input type="radio" name="q[{{$qs->id}}]" value="{{$qq->id}}"> {{ $qq->answer }} <span
                    class="checkmark"></span></label>
                    @endif
                    @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endforeach

                <a href="#add-question" data-toggle="modal" class="font-20 btn mt-1">+ Add a Question To This @if($q->type == 1) Quiz @elseif ($q->type == 2) Exercise @endif</a>
                 <br>
                 <form action="{{route('publish_quiz') }}" method="POST"  enctype="multipart/form-data">
                 @csrf 
                  <!-- <a id="publish" Class="font-20 btn mt-4" quizid="{{$q->id}}"> Publish @if($q->type == 1) Quiz @elseif ($q->type == 2) Exercise @endif</a> -->
                        <input type="text" name="id" value="{{$q->id}}" style="display: none;" />
                        <input  type="submit" name="" value="Publish" Class="font-20 btn mt-4" />
                </form>
            </div>
            
        </div>
    </div>
</section>
<!-- edit_quiz -->
<div class="modal fade" id="quiz-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Quiz / Exercise</h5>
            </div>
            <div class="modal-body form-style">
                <form id="quizform" action="" enctype="multipart/form-data">
                    @csrf 
                    <input type="text" name="id" value="{{$q->id}}" style="display:none"/>

                    <div class="row">
                        <div class="col-sm-6 col-lg-6">

                            <label class="font-weight-bold">Quiz / Exercise</label>
                            <select class="w-100 " name="type" required>
                            <option selected value="{{$q->type}}" >@if($q->type == 1) Quiz @elseif ($q->type == 2) Exercise @endif</option>
                            <option selected value="2" >Exercise</option>
                            <option value="1">Quiz</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" value="{{$q->title}}"  class="w-100 input-shadow" required maxlength="60" />
                            <small id="title_qerror" class="form-text text-danger"></small>
                            <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>

                        <div class="col-sm-6 col-lg-6">
                            
                         @if($q->image != '')
                            <img src="{{ asset('/storage/users/'.$q->image) }}" id="photo" alt="shadow" width="100"/>
                            @endif
                            <label class="font-weight-bold">Change Image</label> 
                            <input type="file" name="image" />
                            <small id="image_qerror" class="form-text text-danger"></small>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                        
                                <label class="font-weight-bold">Category</label>
                                <select class="w-100 " name="category" id="industry" required>
                                <option disabled selected  >Choose Category</option>
                                @foreach ($industry as $industry)
                                <option value="{{ $industry->id }}" 
                                 {{ $industry->id == $q->category ? 'selected' : '' }}
                                   >{{ $industry->name }}</option>
                                @endforeach
                               
                                </select>
                                <small id="category_qerror" class="form-text text-danger"></small>

                                <label class="mt-3 font-weight-bold ">Skills</label>
                                <br>
                                <table class="table meeting-table class-table">
                                @foreach ($skills_q as $s)
                                <tr class="R_skill{{$s->id}}">
                                 
                                <td><p class="mt-1">{{$s->skill->name}}</p></td>
                                 <td class="mt-1">
                                    <button type="button" class="btn btn-danger btn-sm mt-1 deleteskill" skillid="{{$s->id}}" >
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                                @endforeach
                                </table>    
                                <div id="myRepeatingFieldsk">
                                    <div class="entry input-group col-xs-3">
                                        <table class="table meeting-table class-table">
                                            <tr>
                                                <td><select class="w-100 " name="skill[]" id="industry" required>
                                                <option disabled selected>Choose Skill</option>
                                                @foreach ($skills as $skill)
                                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                                @endforeach
                                                </select></td>
                                                <td>
                                                    <button type="button" class="btn btn-lg btn-addsk">
                                                        <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                        <span class="input-group-btn"> </span>
                                    </div>
                                </div>
                             
                        </div>
                        <div class="col-sm-6 col-lg-6 p-0">
                      
                           
                    
                            <div class="col-lg-12 mb-0">
                                <label class="font-weight-bold">Description </label>
                                <textarea class="w-100" rows="6" name="description" maxlength="360"> {{$q->description}} </textarea>
                                <small id="description_qerror" class="form-text text-danger"></small>

                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input id="savequiz" type="button" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delquiz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete  @if($q->type == 1) Quiz @elseif ($q->type == 2) Exercise @endif?</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('quizze.delete') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$q->id}}" style="display: none;" />
                    <input type="text" name="f" value="{{$q->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Delete" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- option-modal Modal -->
<div class="modal fade" id="add-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Question</h5>
            </div>
            <div class="modal-body form-style">
            <form action="{{ route('question.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="quiz_id" value="{{$q->id}}" style="display: none;" />

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Question</label>
                            <input type="text" name="title" class="w-100 input-shadow" maxlength="60" required/>
                             <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                         
                         <label class="font-weight-bold col-lg-12">Options</label>
                         <small class="pt-0 w-100 font-weight-bols text-right d-block">Choose the result associated with this answer</small>
                         <div id="myRepeatingFieldsq">
                             <div class="entry input-group ">
                                 <table class="table meeting-table class-table">
                                     <tr>
                                          <td><input type="text" name="answer[]"  maxlength="60" required/></td> 
                                           <td><select name="is_true[]" required>
                                          @foreach ($result as $re)
                                         <option value="{{ $re->id }}" >{{ $re->title }}</option>
                                         @endforeach
                                            </select></td>
                                          <td>  <button type="button" class="btn btn-lg btn-addq">
                                         <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                     </button></td>
                                     </tr>
                                 </table>
                                 <span class="input-group-btn">
                                    
                                 </span>
                             </div>
                          
                     </div>
                        <div class="col-sm-6 col-lg-6 collaborate">
                            <label class="font-weight-bold">Add an Image</label>
                           
                                <input type="file" name="image"  />
                            
                        </div><br>
                         
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Notes</label>
                            <input type="text" name="notes" class="w-100 input-shadow" maxlength="60"/>
                         </div>
                       
                    </div>
                         
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- option-modal Modal -->
<div class="modal fade" id="add-result" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Result</h5>
            </div>
            <div class="modal-body form-style">
            <form action="{{ route('result.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="quiz_id" value="{{$q->id}}" style="display: none;" />

                    <div class="row">
                        <div class="col-lg-12">
                            <label class="font-weight-bold">Tilte</label>
                            <input type="text" name="title" class="w-100 input-shadow" maxlength="60"/>
                             <small class="pt-2 w-100 font-weight-bols text-right d-block">60 remaining character</small>
                        </div>
                         
                        <div class="col-sm-6 col-lg-6 collaborate">
                            <label class="font-weight-bold">Add an Image</label>
                            
                                <input type="file" name="image"  />
                          
                        </div><br>
                         
                         
                         
                         
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js')
 
<script>
  $(function () {
        $(document)
            .on("click", ".btn-addqe", function (e) {
                var id = $(this).attr('idqs');
                e.preventDefault();
                var controlForm = $("#myRepeatingFieldsqe" + id +":first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-addqe").removeClass("btn-addqe").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });

    $(function () {
        $(document)
            .on("click", ".btn-addq", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFieldsq:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-addq").removeClass("btn-addq").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });

  //delete option
$('.deleteoption').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('optionid');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_option') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_option"+ data.id).remove();
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    // publish
// quizid
  

    $('.deleteskill').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('skillid');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_skill') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_skill"+ data.id).remove();
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });

    $(function () {
        $(document)
            .on("click", ".btn-addsk", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFieldsk:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-addsk").removeClass("btn-addsk").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
            })
            .on("click", ".btn-remove", function (e) {
                e.preventDefault();
                $(this).parents(".entry:first").remove();
                return false;
            });
    });

    $(document).on("click", "#savequiz", function (e) {
        e.preventDefault();

        $("#title_qerror").text("");
        $("#image_qerror").text("");
        $("#description_qerror").text("");
        $("#category_qerror").text("");

        var formData = new FormData($("#quizform")[0]);
        $.ajax({
            type: "post",
            url: "{{route('quizze.store')}}",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                // jQuery.noConflict();
                  $("#quiz-modal").hide();
                 $('.modal-backdrop').hide();
                 
                 //window.location = "{{ url('/') }}/quiz-create/" + data.id;
                 flashBox('success');
                
            },
            error: function (reject) {
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                    $("#" + key + "_qerror").text(val[0]);
                });
            },
        });
    });
 </script>

@endpush