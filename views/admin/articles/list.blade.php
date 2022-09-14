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
                            <h4 class="page-title">Article</h4>
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
                                           aria-selected="true">Articles</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">Add Article</a>
                                    </li>
                                    
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                   
                <div class="row">
                    <div class="col-12">
                        <div class="card">


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_3">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>By</th>
                                             <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane p-3" id="Gallery" role="tabpanel">
                                        <div class="row">

                                        </div><!--end row-->

                                    </div>
                                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                    <form name="" method="post" action="{{ route('admin.article.save') }}"   enctype= "multipart/form-data" >
                                     @csrf
 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="title" type="text"   id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Sub Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="sub_title" type="text"   id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Text</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="text" rows="5" ></textarea>                                            </div>
                                        </div>
                                         
                                        </div>

                                    <div class="col-lg-6">
                                         
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control"  />   
                                             </div>
                                        </div> 
                                         
                                        
                                        
                                    </div>
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Save
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form> 
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/cp/assets/plugins/datatables/datatables.min.js"></script>
    <script src="{{ url('/') }}/cp/assets/plugins/datatables/datatables_advanced.js"></script>
    <script>
        $(document).ready(function(){


            var pTable = $('#datatable_3').DataTable({
                processing: true,
                searching: true,
                serverSide: true,
                ajax: {
                    url: '{{route('admin.articlesajax')}}',
                    type: 'get',
                    data: function(d){
                        d._token = "{{csrf_token()}}"

                    }
                },

                columns: [


                    { data: 'id' },
                    { data: 'title' },
                    { data: 'sub_title' },
                    { data: 'By' },
                    { data: 'actions' },
                ],
                "columnDefs": [
                    { "orderable": false, "targets": 3,
                        "width": "12%", "targets": 0
                    }
                ]


            });


        });
    </script>
@endpush