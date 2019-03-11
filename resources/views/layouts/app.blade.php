<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>NRS Infoways</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=sall" rel="stylesheet"
          type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/bootstrap-select/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/jquery-multi-select/css/multi-select.css')}}"/>

    <link href="<?php echo asset('/plugins/validation/css/formValidation.min.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo asset('/plugins/pnotify/pnotify.custom.min.css'); ?>" rel="stylesheet"/>

    @yield('style')
    <link href="{{asset('/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{asset('/layout/css/themes/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>
</head>

<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full
width page without the sidebar menu -->
<body class=" page-sidebar-closed-hide-logo page-footer-fixed page-sidebar-fixed">
@include('layouts.header')
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container" style="margin-top: 5.5%">
    <!-- BEGIN SIDEBAR -->
@include('layouts.sidebar')
<!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">


            {{--            {{ !is_array($breadcrumb) ? Breadcrumbs::render($breadcrumb) : Breadcrumbs::render($breadcrumb[0], $breadcrumb[1]) }}--}}
            @yield('content')

        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
@include('layouts.footer')
