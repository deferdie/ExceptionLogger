<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="app">
            <div id="wrapper">
                @include('layouts.sb.topNav')

                @include('layouts.sb.sidebar')
                <div id="page-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="/vendor/raphael/raphael.min.js"></script>
        <script src="/vendor/morrisjs/morris.min.js"></script>
        <script src="/data/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="/dist/js/sb-admin-2.js"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
