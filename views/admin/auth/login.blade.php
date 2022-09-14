<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Telcca - Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/site/images/favicon.png">



    <!-- App css -->
    <link href="{{ url('/') }}/cp/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/cp/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/cp/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="body" class="auth-page" style="background-image: url('{{ url('/') }}/cp/assets/images/p-1.png'); background-size: cover; background-position: center center;">
<!-- Log In page -->
<div class="container-md">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3">
                                    <a href="#" class="logo logo-admin">
                                        <img src="{{ url('/') }}/site/images/telcca.png" height="50" alt="logo" class="auth-logo">
                                    </a>
                                    <p class="text-muted  mb-0">Sign in to continue to Telcca dashboard.</p>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                @include('layouts.error')
                                <form class="my-4" method="post" action="{{ route('admin.dologin') }}">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="email" class="form-control" required id="email" name="email" placeholder="Enter email">
                                    </div><!--end form-group-->

                                    <div class="form-group">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" required name="password" id="password" placeholder="Enter password">
                                    </div><!--end form-group-->

                                    <div class="form-group row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch form-switch-success">
                                                <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col-->

                                    </div><!--end form-group-->

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <input class="btn btn-primary" type="submit" value='Log In' />
                                            </div>
                                        </div><!--end col-->
                                    </div> <!--end form-group-->
                                </form><!--end form-->
                                <div class="m-3 text-center text-muted">
                                    <p class="mb-0">Back to website ?  <a href="../" class="text-primary ms-2">Telca website</a></p>
                                </div>

                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->

<!-- App js -->
<script src="{{ url('/') }}/cp/assets/js/app.js"></script>

</body>

</html>