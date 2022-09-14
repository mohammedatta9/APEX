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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Join Requests</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Join requests</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
@include('layouts.success')
                @include('layouts.error')
                

                <div class="row">
                    <div class="col-12">
                        <div class="card">


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="datatable_2">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>DOB</th>
                                            <th>Nationality</th>
                                            <th data-type="date" data-format="YYYY/DD/MM">Request Date</th>
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


            </div><!-- container -->


        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


@endsection
@push('js')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="{{ url('/') }}/cp/assets/plugins/datatables/datatables.min.js"></script>
    <script src="{{ url('/') }}/cp/assets/plugins/datatables/datatables_advanced.js"></script>
    <script>
        $(document).ready(function(){


            var pTable = $('#datatable_2').DataTable({
                processing: true,
                searching: true,
                serverSide: true,
                ajax: {
                    url: '{{route('admin.requestsajax')}}',
                    type: 'get',
                    data: function(d){
                        d._token = "{{csrf_token()}}"

                    }
                },

                columns: [


                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'Phone' },
                    { data: 'Date_Birth' },
                    { data: 'Nationality' },
                    { data: 'created_at' },
                    { data: 'actions' },
                ],
                "columnDefs": [
                    { "orderable": false, "targets": 7,
                        "width": "8%", "targets": 7,
                        "width": "12%", "targets": 6
                    }
                ]


            });


        });
    </script>
@endpush