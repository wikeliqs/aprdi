@php
    $system_name         = DB()->get_where('settings', array('key' => 'system_name'))->row()->value;
    $user_details        = $ci->user_model->get_all_user($ci->session->userdata('user_id'))->row_array();
    $text_align          = DB()->get_where('settings', array('key' => 'text_align'))->row()->value;
    $logged_in_user_role = strtolower($ci->session->userdata('role'));
@endphp
<!DOCTYPE html>
<html lang="en" dir="{{ ($text_align == 'right-to-left') ? 'rtl':'' }}">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta charset="utf-8"/>
    <title>{{ $system_name }} | {{ get_phrase($page_title) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link name="favicon" type="image/x-icon" href="{{ base_url() . 'assets/favicon.png' }}" rel="shortcut icon"/>
    <!-- BEGIN PLUGIN CSS -->
    @include('backend.layout.includes_top')
</head>
<!-- END HEAD -->
<body class="page-body" data-url="http://neon.dev">
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('backend.layout.navigation')
    <div class="main-content">
        @include('backend.layout.header')

        @yield('content')

        @include('backend.layout.footer')
    </div>
</div>
</body>
@include('backend.layout.modal')
@include('backend.layout.includes_bottom')