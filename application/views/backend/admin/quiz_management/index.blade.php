@extends('backend.layout.master')
@section('content')

    <ol class="breadcrumb bc-3">
        <li>
            <a href="{{ site_url('admin/dashboard') }}">
                <i class="entypo-folder"></i>
				{{ get_phrase('dashboard') }}
            </a>
        </li>
        <li><a href="#" class="active">{{ get_phrase('quiz') }}</a> </li>
    </ol>
    <h2><i class="fa fa-arrow-circle-o-right"></i> {{ $page_title }}</h2>
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <a href = "{{ site_url('backend/quizmanagement/create')}}" class="btn btn-block btn-info btn-lg" type="button"><i class="fa fa-plus"></i>&nbsp;&nbsp;{{ get_phrase('add_quiz')}}</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <form class="" action="{{ site_url('backend/quizmanagement') }}" method="post">

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-block btn-default btn-lg" name="button"><i class="fa fa-search"></i> Filter</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <table class="table table-bordered datatable" id="table-1">
                        <thead>
                        <tr>
                            <th>{{ get_phrase('title')}}</th>
                            <th>{{ get_phrase('category')}}</th>
                            <th>{{ get_phrase('number_of_sections')}}</th>
                            <th>{{ get_phrase('number_of_lessons')}}</th>
                            <th>{{ get_phrase('number_of_enrolled_users')}}</th>
                            <th>{{ get_phrase('action')}}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function ajax_get_sub_category(category_id) {
            $.ajax({
                url: '{{ site_url('admin/ajax_get_sub_category/') }}' + category_id ,
                success: function(response)
                {
                    jQuery('#sub_category_id').html(response);
                    console.log(response);
                }
            });
        }
    </script>
@endsection