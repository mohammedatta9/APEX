@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"></a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Community Post detail</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="met-profile">
                                    <!-- aeaeaevd -->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">Community Post detail</a>
                                    </li>
                                     
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                     <form action="{{ route('question.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$qs->id}}" style="display: none;" />

                    <div class="row">
                    <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="title" value="{{$qs->title}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Type</label>
                                            <div class="col-sm-9">
                                            <input   type="radio" name="type" value="1" @if($qs->type == 1) checked="checked" @endif>
                                <label >Radio</label> -
                                <input  type="radio"  name="type" value="0"  @if($qs->type == 0) checked="checked" @endif>
                               <label > Checkbox</label>                                               </div>
                                        </div>

                                         <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Title note</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="title_note" value="{{$qs->title_note}}" class="form-control" />

                                          </div>
                                        </div> 
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Notes</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="notes" value="{{$qs->notes}}" class="form-control" />
                                            </div>
                                        </div>
                                        </div>

                                    <div class="col-lg-6">
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($qs->image)
                                            <img src="{{ asset('storage/users/'. $qs->image) }}" alt="communities" height="100" width="200">
                                           @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control"  />   
                                             </div>
                                        </div> 
                                       
                                        
                                    </div>
                        <hr>
                        <div class="col-sm-8 col-lg-8">
                        <div class="row m-0 mb-3">
                            <label class="font-weight-bold col-sm-3 col-form-label " >Answers</label>
                            <div id="myRepeatingFields">
                                <div class="entry input-group col-xs-3">
                                    <table class="table meeting-table class-table">
                                        <tr>
                                             <td><input type="text" name="answer[]" class="w-100" /></td> 
                                             <td>Is true answer ? </td><td><select name="is_true[]" >
                                             <option value="0">fauls</option>
                                             <option value="1">true</option>
                                               </select></td>
                                             <td>  <button type="button" class="btn btn-lg btn-add">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true">+</span>
                                        </button></td>
                                        </tr>
                                    </table>
                                    <span class="input-group-btn">
                                       
                                    </span>
                                </div>
                            </div>
                        </div>
                        <label class="font-weight-bold col-lg-12">Options</label>
                        <table class="table table-striped table-bordered">
                        @foreach ($qs->question_options as $qq)
                            <tr class="R_option{{$qq->id}}">
                                <td>Option #{{ $loop->iteration }}</td>
                                <td>{{$qq->answer}}</td>
                                <td>@if($qq->is_true == 1) true @else fauls @endif</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteoption" optionid="{{$qq->id}}" >
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
               
                    </div>
                         
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                             <input  type="submit" name="" value="Update" class="btn btn-de-primary"/>
                        </div>
                    </div>
                </form>
                                    </div>
                                    <div class="tab-pane p-3" id="Gallery" role="tabpanel">
                                        <div class="row">

                                        </div><!--end row-->

                                    </div>
                                    
                                    
                                </div>
                            </div> <!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->


        </div>
        <!-- end page content -->
    </div>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
 
<script>
  $(function () {
        $(document)
            .on("click", ".btn-add", function (e) {
                e.preventDefault();
                var controlForm = $("#myRepeatingFields:first"),
                    currentEntry = $(this).parents(".entry:first"),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                newEntry.find("input").val("");
                controlForm.find(".entry:not(:last) .btn-add").removeClass("btn-add").addClass("btn-remove").removeClass("btn-success").addClass("btn-danger").html("-");
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
 </script>
 
@endpush