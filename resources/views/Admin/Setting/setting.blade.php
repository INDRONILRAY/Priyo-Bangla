@extends('Admin.layouts.master')

@section('main_title')
    {{'Dashboard'}}
@endsection
@section('selectjs')
    <script type="text/javascript" src="{{asset('assets/js/plugins/uploaders/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/uploader_bootstrap.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/plugins/editors/summernote/summernote.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/pages/editor_summernote.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/tags/tokenfield.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/ui/prism.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/form_tags_input.js')}}"></script>

@endsection

@section('bread_crumbs')
    {{$key}}
@endsection

@section('blog-settings', 'active')
@section('content')

    <div class="content">

        <div class="panel panel-flat">

            <div class="panel-heading">
                <h2 class="panel-title text-center" style="border-bottom: 1px solid #DDDDDD; margin-bottom: 10px; margin-right: 10px"> Create New As Your Wish </h2>
                <p align="center">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    </p>
            </div>

            <div class="panel-body">
                {!! Form::model($data,['url' => '/admin/'.$data['id'].'/edit-setting/update', 'class' =>'form-horizontal','files' => true]) !!}


                <div class="form-group">
                    <label class="control-label col-md-1"> {!! Form::label('logo','Logo :') !!}</label>
                    <div class="col-md-11">

                        {{ Form::file('logo', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">Current Logo : </label>
                    <div class="col-md-11">
                        <img src="{{asset('upload/thumbail-image/'.$data->logo)}}" alt="Current Logo" width="199" height="90" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1"> {!! Form::label('footer_logo','Footer Logo :') !!}</label>
                    <div class="col-md-11">

                        {{ Form::file('footer_logo', ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1">Current Footer Logo : </label>
                    <div class="col-md-11">
                        <img src="{{asset('upload/thumbail-image/'.$data->footer_logo)}}" alt="Current Logo" width="199" height="52" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1"> {!! Form::label('Des','Description:') !!}</label>
                    <div class="col-md-11">
                        {{ Form::textarea('Des', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label text-bold">{!! Form::label('livetv','Tv Link') !!}</label>
                    <div class="col-lg-10">
                        <div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="button">https://www.youtube.com/watch?v=</button>
									</span>
                            {!! Form::text('livetv', null,
                                array(
                                'class'=>'form-control',
                                'placeholder'=>'Example : Ek17-Sh7jtA',
                                'data-popup' =>'tooltip',
                                'title' => 'Write Only Youtube Video Code'
                         )) !!}
                            <span class="input-group-btn">
										<button class="btn bg-teal" type="button">Not Required.Its Optional</button>
									</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1"> {!! Form::label('adbox1-728*100','Ad Box 1:') !!}</label>
                    <div class="col-md-11">
                        {{ Form::textarea('adbox1-728*100', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1"> {!! Form::label('adbox2-380*320','Ad Box 2:') !!}</label>
                    <div class="col-md-11">
                        {{ Form::textarea('adbox2-380*320', null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        {!! Form::submit('Update',
                          array(
                          'class'=>'btn bg-teal-400',
                          )) !!}
                    </div>
                </div>


                {!! Form::close() !!}
            </div>

                </div>

                </div>


            </div>
        </div>


@endsection
