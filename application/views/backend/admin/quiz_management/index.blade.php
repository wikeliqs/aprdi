@extends('backend.layout.master')
@section('content')

    <ol class="breadcrumb bc-3">
        <li>
            <a href="{{ site_url('admin/dashboard') }}">
                <i class="entypo-folder"></i>
				{{ get_phrase('dashboard') }}
            </a>
        </li>
        <li><a href="#" class="active">{{ get_phrase('courses') }}</a> </li>
    </ol>
    <h2><i class="fa fa-arrow-circle-o-right"></i> {{ $page_title }}</h2>
    <br />
@endsection