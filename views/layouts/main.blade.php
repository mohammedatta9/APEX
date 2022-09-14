<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Telcca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('/') }}/site/images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/calender-style.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/calender-theme.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/custom-style.css?a<?=time()?>">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/custom-style2.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/modal-custom.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/responsive.css">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/circle.css?<?=time()?>">
    <link rel="stylesheet" href="{{ url('/') }}/site/css/notify.css?<?=time()?>">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<style>
    .notify {
        z-index: 100;
    }
</style>

</head>

<body>
{{--@notifyCss--}}
@include('layouts.header')
@yield('content')

@include('layouts.footer')