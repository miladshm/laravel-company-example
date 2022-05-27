<!DOCTYPE html>
<html class="loading" lang="fa" data-textdirection="rtl" dir="rtl">
<!-- BEGIN: Head-->
<head>
    <base href="{{config('app.admin_url')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>پنل مدیریت | @isset($title) {{$title}} @else @stack('title') @endisset</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/ico/favicon.ico')}}">
    <meta name="theme-color" content="#5A8DEE">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <!-- END: Theme CSS-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/file-manager/css/file-manager.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/summernote-0.8.18-dist/summernote-bs4.min.css')}}">
@stack('vendor-styles')
<!-- END: Vendor CSS-->


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.css')}}">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/dark-layout.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themes/semi-dark-layout.css')}}">
@stack('page-styles')
<!-- END: Page CSS-->
    @stack('inline-styles')
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
@include('admin.partials.header')
@include('admin.partials.sidebar')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@include('admin.partials.customizer')
@include('admin.partials.footer')

<form hidden id="logout" action="{{route('logout')}}" method="post">@csrf</form>
<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js')}}"></script>
<script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
<script src="{{asset('assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('vendor/file-manager/js/file-manager.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/extensions/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/forms/validation/form-validation.js')}}"></script>

@stack('vendor-scripts')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/scripts/configs/vertical-menu-dark.js')}}"></script>
<script src="{{asset('assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('assets/js/core/app.js')}}"></script>
<script src="{{asset('assets/js/scripts/components.js')}}"></script>
<script src="{{asset('assets/js/scripts/footer.js')}}"></script>
<script src="{{asset('assets/js/scripts/customizer.js')}}"></script>
<script src="{{asset('plugins/summernote-0.8.18-dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/summernote-0.8.18-dist/lang/summernote-fa-IR.min.js')}}"></script>
@stack('page-scripts')
<!-- END: Theme JS-->
<script src="{{asset('js/scripts.js')}}"></script>

<script>

</script>
@stack('inline-scripts')
</body>
</html>
