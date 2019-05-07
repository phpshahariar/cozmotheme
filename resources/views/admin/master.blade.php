<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{!! asset('/admin/backend/') !!}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{!! asset('/admin/backend/') !!}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{!! asset('/admin/backend/') !!}/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

{{--    <script src="{!! asset('/admin/') !!}/ckeditor.js"></script>--}}
{{--    <script src="{!! asset('/admin/') !!}/samples/js/sample.js"></script>--}}
    <link rel="stylesheet" href="{!! asset('/admin/backend/') !!}css/samples.css">

</head>

<body id="page-top">

@include('admin.includes.header')

<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.includes.sidebar')

    <div id="content-wrapper">

        @yield('content')
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
@include('admin.includes.footer')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->


<!-- Logout Modal-->


<!-- Bootstrap core JavaScript-->
<script src="{!! asset('/admin/backend/') !!}/vendor/jquery/jquery.min.js"></script>
<script src="{!! asset('/admin/backend/') !!}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{!! asset('/admin/backend/') !!}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="{!! asset('/admin/backend/') !!}/vendor/chart.js/Chart.min.js"></script>
<script src="{!! asset('/admin/backend/') !!}/vendor/datatables/jquery.dataTables.js"></script>
<script src="{!! asset('/admin/backend/') !!}/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="{!! asset('/admin/backend/') !!}/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="{!! asset('/admin/backend/') !!}/js/demo/datatables-demo.js"></script>
<script src="{!! asset('/admin/backend/') !!}/js/demo/chart-area-demo.js"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

</body>

</html>
