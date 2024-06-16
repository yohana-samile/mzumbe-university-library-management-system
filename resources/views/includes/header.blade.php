<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{__('MULMS') }}</title>
        <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link href="{{ url("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
        <link href="{{ url("css/mulms.min.css")}}" rel="stylesheet">
        <link href="{{ url("css/style.css")}}" rel="stylesheet">
        <link href="{{ url("vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">

        {{-- online cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
        <style media="print">
            body * {
                display: none;
            }

            table {
                display: block;
            }
        </style>

    </head>
    <body id="page-top">
