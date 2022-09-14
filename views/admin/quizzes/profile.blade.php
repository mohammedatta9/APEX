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
                            <h4 class="page-title">Quizze detail</h4>
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
                                           aria-selected="true">Quizze detail</a>
                                    </li>
                                      
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#posts" role="tab"
                                           aria-selected="false">Quizze question</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                    <h5 class=" client-name fw-bold">BY : {{$c->users->first_name}} {{$c->users->last_name}}</h5>
                                    <form name="" method="post" action="{{ route('admin.quizzes.edit') }}"   enctype= "multipart/form-data" >
                                     @csrf
                                     <input   type="text" name="id" value="{{$c->id}}"  style="display:none;">

                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label  class="col-sm-3 "></label>
                                            <div class="col-sm-9">
                                            <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" value="1" name="featured_service" type="checkbox" checked  >
                                            <label class="form-check-label" for="customSwitchSuccess">Active</label>
                                        </div>
                                     </div>
                                        </div><br>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="title" type="text" value="{{$c->title}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Skills</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="skills" type="text" value="{{$c->skills}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Description</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="5" >{{$c->description}}</textarea>                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Notes</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="notes" rows="5" >{{$c->notes}}</textarea>                                            </div>
                                        </div>
                                         
                                        </div>

                                    <div class="col-lg-6">
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($c->image)
                                            <img src="{{asset('/storage/users/'.$c->image)}}" alt="communities" height="100" width="200">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control"  />   
                                             </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">category</label>
                                            <div class="col-sm-9">
                                            <select name="intitution_id"   class="form-control">
                                             @foreach($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                            {{ $industry->id == $c->intitution_id ? 'selected' : '' }}
                                            >{{ $industry->name }}</option>
                                            @endforeach
                                        </select>
                                          </div>
                                        </div> 
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Duration</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="duration" type="text" value="{{$c->duration}}" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="tab-pane p-3" id="Gallery" role="tabpanel">
                                        <div class="row">

                                        </div><!--end row-->

                                    </div>
                                     
                                        <div class="tab-pane p-3" id="posts" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Title</th>
                                                                 <th>Action</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($c->questions as $m)
                                                                <tr>
                                                                <td>{{ $m->id }}</td>
                                                                <td>{{ $m->title}}</td>
                                                                  <td>  <a href="{{ route('admin.quizzes.question', $m->id)}}"><i class=" far fa-edit  text-secondary font-20"></i></a>
                                                                <a href="{{ route('admin.quizzes.question', $m->id)}} "><i class=" las la-trash-alt  text-secondary font-20"></i></a>
                                                                </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table><!--end /table-->
                                                    </div>
                                                </div>

                                            </div><!--end col-->
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
$('.deletem_b').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('deletem_b');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_member') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_m"+ data.id).remove();
                       
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