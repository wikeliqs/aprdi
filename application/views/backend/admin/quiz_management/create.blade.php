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
                <div class="panel-heading">
                    <div class="panel-title">
					    {{ get_phrase('add_quiz_form') }}
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <form class="" action="{{ site_url('admin/course_actions/add') }}" method="post" enctype="multipart/form-data" novalidate>
                            <div class="col-sm-7">
                                <div class="panel-group" id="accordion" data-toggle="collapse">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="" data-toggle="collapse" data-parent="#accordion"  href="#generalInfo">
                                                    {{ get_phrase('general_info') }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="generalInfo" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ get_phrase('name') }}</label>
                                                        <div class="controls">
                                                            <input type="text" name = "quiz_name" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">{{ get_phrase('description') }}</label>
                                                        <div class="controls">
                                                        <textarea rows="5" class="form-control wysihtml5" data-stylesheet-url="{{ base_url('assets/backend/css/wysihtml5-color.css') }}"
                                                                  name="quiz_description" placeholder="{{ get_phrase('description') }}"
                                                                  id="sample_wysiwyg1" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  href="#timing">
                                                    {{ get_phrase('timing') }}
                                                    <span class="badge badge-info" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Students can only start their attempt(s) after the open time and they must complete their attempts before the close time." data-original-title="Quiz Timing"><i class="fa fa-info-circle"></i></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="timing" class="panel-collapse">
                                            <div class="panel-body">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ get_phrase('open_quiz_date') }}</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_date('open_quiz_date[0]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_month('open_quiz_date[1]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_year('open_quiz_date[2]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 clearfix">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="checkbox">
                                                            <label for="">
                                                                {!! form_checkbox(['name'=>'enabled_open_quiz_date','value'=>1,'class'=>'','checked'=>false]) !!} Enable
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 clear">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ get_phrase('close_quiz_date') }}</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_date('close_quiz_date[0]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_month('close_quiz_date[1]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="controls">
                                                            {!! form_dropdown_year('close_quiz_date[2]', null, ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">&nbsp;</label>
                                                        <div class="checkbox">
                                                            <label for="">
                                                                {!! form_checkbox(['name'=>'enabled_close_quiz_date','value'=>1,'class'=>'','checked'=>false]) !!} Enable
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion"  href="#grade">
                                                    {{ get_phrase('grade') }}
                                                    <span class="badge badge-info" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="This setting determines the minimum grade required to pass. The value is used in activity and course completion." data-original-title="Quiz Grading"><i class="fa fa-info-circle"></i></span>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="grade" class="panel-collapse">
                                            <div class="panel-body">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label class="form-label">{{ get_phrase('grade_to_pass') }}</label>
                                                        <div class="controls">
                                                            {!! form_input('grade_to_pass', null, ['class'=>'form-control','placeholder'=>'Grade to pass - Ex : 20']); !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label class="form-label">{{ get_phrase('attempts_allowed') }}</label>
                                                    <div class="checkbox">
                                                        <label for="">
                                                            {!! form_dropdown() !!} Enable
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection