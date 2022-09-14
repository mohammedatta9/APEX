<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Telcca - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/site/assets/images/favicon.ico">



    <!-- App css -->
    <link href="{{ url('/') }}/cp/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/cp/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/cp/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/cp/assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />

</head>

<body id="body" class="dark-sidebar">

@include('layouts.admin.menu')
@include('layouts.admin.nav')


@yield('content')


@include('layouts.admin.footer')
@stack('js')

</body>

</html>