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
    {{$text}}
@endsection

@section('blog-active', 'active')
@section('content')

    <div class="content">

        <div class="panel panel-flat">

            <div class="panel-heading">
                <h2 class="panel-title text-center" style="border-bottom: 1px solid #DDDDDD; margin-bottom: 10px; margin-right: 10px"> Create New Post </h2>
            </div>

            <div class="panel-body">

                <div class="col-lg-12">

                    <div class="panel-body">
						{!! Form::open(['url' => '/admin/new-post/store', 'class' =>'form-horizontal','files' => true ]) !!}

						<div class="form-group">
							<label class="col-md-1 control-label text-bold"> Title : </label>
							<div class="col-md-11">
                                @if($errors->has('title'))
								{!! Form::text('title', \Illuminate\Support\Facades\Input::old('title'),
                                       array(
                                       'class'=>'form-control input-rounded',
                                       'placeholder'=>'Write Post Title',
                                       'autofocus'=>true,
                                       'data-popup' =>'tooltip',
                                       'title' => 'Maximum 100 Characters',
                                )) !!}
                                    @foreach($errors->get('title', ':message') as $error)
                                        <small class="form-text text-muted">
                                            <i class="icon-x" style="color: red"> {{ $error }} </i>
                                        </small>
                                    @endforeach
                                @else
                                    {!! Form::text('title', \Illuminate\Support\Facades\Input::old('title'),
                                       array(
                                       'class'=>'form-control input-rounded',
                                       'placeholder'=>'Write Post Title',
                                       'autofocus'=>true,
                                       'data-popup' =>'tooltip',
                                       'title' => 'Maximum 100 Characters',
                                )) !!}
                                @endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-1 control-label text-bold"> {!! Form::label('post','Post :') !!}</label>
							<div class="col-md-11">
                                @if($errors->has('post'))
                                    {{Form::textarea('post',null,array('class' => 'summernote', 'placeholder'=>'Content', 'id' => 'summernote'))}}
                                    @foreach($errors->get('post', ':message') as $error)
                                        <small class="form-text text-muted">
                                            <i class="icon-x" style="color: red"> {{ $error }} </i>
                                        </small>
                                    @endforeach
                                @else
                                    {{Form::textarea('post',null,array('class' => 'summernote', 'placeholder'=>'Content', 'id' => 'summernote'))}}
                                @endif
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-1 control-label text-bold"> {!! Form::label('category','Category :') !!}</label>
                            <?php $category = \App\category::pluck('id','name');?>
                            <div class="col-md-11">

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">News Category Select From Here</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li><a data-action="collapse"></a></li>
                                                <li><a data-action="reload"></a></li>
                                                <li><a data-action="close"></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <p class="content-group">You Can Select Multiple Category From Here.</p>
                                            <div class="row">
                                                @foreach($category as $name => $id)
                                                <div class="col-md-3">
                                                  <div class="checkbox">
                                                    <label>
                                                        @if($errors->has('category'))
                                                            {{ Form::checkbox('category[]', $id, \Illuminate\Support\Facades\Input::old('category[]'), ['class' => 'field']) }} {{ $name }}
                                                            @foreach($errors->get('category', ':message') as $error)
                                                                <small class="form-text text-muted">
                                                                    <i class="icon-x" style="color: red"> {{ $error }} </i>
                                                                </small>
                                                            @endforeach
                                                        @else
                                                            {{ Form::checkbox('category[]', $id, \Illuminate\Support\Facades\Input::old('category[]'), ['class' => 'field']) }} {{ $name }}
                                                        @endif
                                                    </label>
                                                  </div>
                                                </div>
                                               @endforeach
                                        </div>

                                    </div>

                                </div>

                            </div>

						</div>

                        <div class="form-group">
							<label class="col-md-1 control-label text-bold"> {!! Form::label('tags','Tags :') !!}</label>
							<div class="col-md-11">
                                @if($errors->has('tags'))
                                    {!! Form::text('tags', \Illuminate\Support\Facades\Input::old('tags'),
                                       array(
                                       'class'=>'tagsinput-max-tags',
                                )) !!}
                                    @foreach($errors->get('tags', ':message') as $error)
                                        <small class="form-text text-muted">
                                            <i class="icon-x" style="color: red"> {{ $error }} </i>
                                        </small>
                                    @endforeach
                                @else
                                    {!! Form::text('tags', \Illuminate\Support\Facades\Input::old('tags'),
                                       array(
                                       'class'=>'tagsinput-max-tags',
                                )) !!}
                                @endif
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-1 control-label text-bold">{!! Form::label('thumbail','Thumbail :') !!}</label>
                            <div class="col-lg-10">
                                @if($errors->has('thumbail'))
                                    {{ Form::file('thumbail', ['class' => 'file-input','accept'=>'image/*, video/*']) }}
                                    @foreach($errors->get('thumbail', ':message') as $error)
                                        <small class="form-text text-muted">
                                            <i class="icon-x" style="color: red"> {{ $error }} </i>
                                        </small>
                                    @endforeach
                                @else
                                    {{ Form::file('thumbail', ['class' => 'file-input','accept'=>'image/*, video/*']) }}
                                @endif
                                <span class="help-block">Image Maximum Size 1MB & width*height = (300*300)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label text-bold">{!! Form::label('video_link','Video Link') !!}</label>
                            <div class="col-lg-10">
                                <div class="input-group">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="button">https://www.youtube.com/watch?v=</button>
									</span>
                                    {!! Form::text('video_link', null,
                                        array(
                                        'class'=>'form-control',
                                        'placeholder'=>'Example : Ek17-Sh7jtA',
                                        'data-popup' =>'tooltip',
                                        'id' =>'video',
                                        'title' => 'Write Only Youtube Video Code'
                                 )) !!}

                                    <span class="input-group-btn">
										<button class="btn bg-teal" type="button">Not Required.Its Optional</button>
									</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
							<div class="text-center">
								{!! Form::submit('Post Submit',
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
