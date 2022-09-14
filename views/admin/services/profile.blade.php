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
                            <h4 class="page-title">Service detail</h4>
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
                                           aria-selected="true">Service detail</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">Registered users of the service</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                    <h5 class=" client-name fw-bold">BY : {{$service->user->first_name}} {{$service->user->last_name}}</h5>
                                    <form name="" method="post" action="{{ route('admin.service.edit') }}"   enctype= "multipart/form-data" >
                                     @csrf
                                     <input   type="text" name="id" value="{{$service->id}}"  style="display:none;">

                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                        <div class="mb-3 row">
                                            <label  class="col-sm-3 "></label>
                                            <div class="col-sm-9">
                                            <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input" value="1" name="featured_service" type="checkbox"  @if($service->featured_service == 1 ) checked="checked" @endif>
                                            <label class="form-check-label" for="customSwitchSuccess">Featured service</label>
                                        </div>
                                     </div>
                                        </div><br>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Tilte</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="title" type="text" value="{{$service->title}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Type</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="name" type="text" value="{{$service->name}}" >
                                            </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">About</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="about" rows="5" >{{$service->about}}</textarea>                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Address</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="address" type="text" value="{{$service->address}}"  >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Qualifcation</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="qualifcation" type="text" value="{{$service->qualifcation}}"  >
                                            </div>
                                        </div>   
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Fees</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="ticket_fees" value="{{$service->ticket_fees}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">DeadLine</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="deadline" type="date" value="{{$service->deadline}}" >
                                            </div>
                                        </div>                 
                                    </div>
                                    
                                    <div class="col-lg-6">
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($service->cover)
                                            <img src="{{asset('/storage/services/'.$service->cover)}}" alt="service" height="100" width="200">
                                            @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change cover</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="cover" class="form-control"  />   
                                             </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Notes</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="notes" rows="3" >{{$service->notes}}</textarea>                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Duecrtion</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="duration" type="text" value="{{$service->duration}}"  >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Monthly salary</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="monthly_salary" type="text" value="{{$service->monthly_salary}}"  >
                                            </div>
                                        </div>   
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Registere Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="link" type="text" value="{{$service->link}}"  >
                                            </div>
                                        </div>                  
                                    </div>    
                                    <div class="col-lg-6">
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Date From</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="date_from" type="date" value="{{$service->date_from}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Date to</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="date_to" type="date" value="{{$service->date_to}}" id="example-text-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Time from</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="time_from" type="time" value="{{$service->time_from}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Time to</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="time_to" type="time" value="{{$service->time_to}}"  >
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
                                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                        <div class="row">
                                        <div class="card">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($up as $up)
                                                                <tr>
                                                                    <td>{{ $up->id }}</td>
                                                                    <td>{{ $up->user->first_name }} {{ $up->user->last_name }}</td>
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