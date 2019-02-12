<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    {{--<!-- Tell the browser to be responsive to screen width -->--}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{--<!-- Bootstrap 3.3.6 -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/bootstrap/css/bootstrap.min.css')}}">
    {{--<!-- Font Awesome -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    {{--<!-- Ionicons -->--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{--<!-- Theme style -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/AdminLTE.min.css')}}">
    {{--<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/dist/css/skins/_all-skins.min.css')}}">
    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/iCheck/flat/blue.css')}}">
    {{--<!-- Morris chart -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/morris/morris.css')}}">
    {{--<!-- jvectormap -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    {{--<!-- Date Picker -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datepicker/datepicker3.css')}}">
    {{--<!-- Daterange picker -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}">
    {{--<!-- bootstrap wysihtml5 - text editor -->--}}
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/myAdminStyle.css')}}">
</head>
<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper">

    <header class="main-header">
        @yield('header')
    </header>
    <aside class="main-sidebar">
        @yield('sidebar')
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{$title}}
            </h1>
        </section>
        <section class="content">
            @yield('content')

        </section>
    </div>
    <footer class="main-footer">
        <strong>2016-<?=date('Y');?> Developed with love by <a href="http://almsaeedstudio.com" target="_blank">UAITLAB</a>.</strong>
    </footer>

</div>



{{--<!-- ============= scripts =============== -->--}}
{{--<!-- jQuery 2.2.3 -->--}}
<script src="{{asset('assets/admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
{{--<!-- jQuery UI 1.11.4 -->--}}
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
{{--<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->--}}
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
{{--<!-- Bootstrap 3.3.6 -->--}}
<script src="{{asset('assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
{{--<!-- Morris.js charts -->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('assets/admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/ckeditor/ckeditor.js')}}"></script>
{{--<!-- Sparkline -->--}}
<script src="{{asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
{{--<!-- jvectormap -->--}}
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
{{--<!-- jQuery Knob Chart -->--}}
<script src="{{asset('assets/admin/plugins/knob/jquery.knob.js')}}"></script>
{{--<!-- daterangepicker -->--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
{{--<!-- datepicker -->--}}
<script src="{{asset('assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
{{--<!-- Bootstrap WYSIHTML5 -->--}}
<script src="{{asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
{{--<!-- Slimscroll -->--}}
<script src="{{asset('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
{{--<!-- FastClick -->--}}
<script src="{{asset('assets/admin/plugins/fastclick/fastclick.js')}}"></script>
{{--<!-- AdminLTE App -->--}}
<script src="{{asset('assets/admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('assets/admin/common.js')}}"></script>
</body>
</html>