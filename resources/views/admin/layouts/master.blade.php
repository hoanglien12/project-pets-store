<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <base href="{{asset('')}}public/" > -->
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('asset/uploads/2018/01/logo-1.png') }}" >

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('asset/themes/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('asset/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('asset/themes/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    {{-- Custom datepicker--}}
    <link rel="stylesheet" href="{{ asset('asset/css/datepicker.css') }}">

    
    <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables.css') }}"/>
    <link rel="stylesheet" href="{{ asset('js/DataTables/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/datatables.js') }}"/>

    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>

</head>

<body>

    <div id="wrapper">
        @include('admin.layouts.header')
        <div class="navbar-default sidebar" role="navigation">
            @include('admin.layouts.side_bar')
            <!-- /.sidebar-collapse -->
        </div>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                </div>
            </div>
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('vendor/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('data/morris-data.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/custom-js.js') }}"></script>

    <!-- Custom datepicker-->
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script src="{{ asset('js/custom-js.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>

</html>
