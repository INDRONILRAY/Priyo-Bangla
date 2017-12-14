@extends('Admin.layouts.master')

@section('main_title')
    {{'Dashboard'}}
@endsection
@section('dashboardjs')
    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
@endsection

@section('bread_crumbs')
    {{$text}}
@endsection

@section('activemenu', 'active')
@section('content')

    <div class="content">

        <div class="panel panel-flat">

            <div class="panel-heading">
                <h2 class="panel-title text-center" style="border-bottom: 1px solid #DDDDDD; margin-bottom: 10px; margin-right: 10px"> Select Active Menu </h2>
            </div>

            <div class="panel-body">

                <div class="col-md-offset-1">

                    <div class="panel-body">

                        <!-- Bordered striped table -->
                        <div class="panel panel-flat">
                            <div class="panel-heading"></div>
                            <div class="panel-body">

                            </div>

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped" id="mytable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>HomePage Widget Section</th>
                                        <th>Selected Category</th>
                                        <th>Widget Category</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr>
                                        <td>1</td>
                                        <td>First Category </td>
                                        <td><?php $val = \App\widget::where('position',1)->value('cat_id'); echo \App\category::where('id',$val)->value('name');?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select-border-color border-warning" id="category1">
                                                    <option value="" class="active">None</option>
                                                    <?php $value = \App\category::where('parent',"")->get(); ?>
                                                    @if($value->count() > 1)
                                                        @foreach($value as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="0">Add Category First</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Side First Category </td>
                                        <td><?php $val2 = \App\widget::where('position',2)->value('cat_id'); echo \App\category::where('id',$val2)->value('name');?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select-border-color border-warning" id="category2">
                                                    <option value="" class="active">None</option>
                                                    <?php $value2 = \App\category::where('parent',"")->get(); ?>
                                                    @foreach($value2 as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Third Category </td>
                                        <td><?php $val3 = \App\widget::where('position',3)->value('cat_id'); echo \App\category::where('id',$val3)->value('name');?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select-border-color border-warning" id="category3">
                                                    <option value="" class="active">None</option>
                                                    <?php $value3 = \App\category::where('parent',"")->get(); ?>
                                                    @foreach($value3 as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>4TH Category </td>
                                        <td><?php $val4 = \App\widget::where('position',4)->value('cat_id'); echo \App\category::where('id',$val4)->value('name');?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select-border-color border-warning" id="category4">
                                                    <option value="" class="active">None</option>
                                                    <?php $value4 = \App\category::where('parent',"")->get(); ?>
                                                    @foreach($value4 as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>5TH Category </td>
                                        <td><?php $val5 = \App\widget::where('position',5)->value('cat_id'); echo \App\category::where('id',$val5)->value('name');?></td>
                                        <td>
                                            <div class="form-group">
                                                <select class="select-border-color border-warning" id="category5">
                                                    <option value="" class="active">None</option>
                                                    <?php $value5 = \App\category::where('parent',"")->get(); ?>
                                                    @foreach($value5 as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <!-- /bordered striped table -->

                        </div>



                    </div>


                </div>

            </div>
        </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#category1").change(function () {
                var data= {id: $("#category1").val(),};
                $.ajax({
                    url: "/ajax/category1",
                    type: 'post',
                    data: {data: data,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            setTimeout(function(){ location.reload(); });
                        }else {
                            alert('Error');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("Ajax Not Working Now"+errorThrown);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#category2").change(function () {
                var data= {id: $("#category2").val(),};
                $.ajax({
                    url: "/ajax/category2",
                    type: 'post',
                    data: {data: data,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            setTimeout(function(){ location.reload(); });
                        }else {
                            alert('Error');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("Ajax Not Working Now"+errorThrown);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#category3").change(function () {
                var data= {id: $("#category3").val(),};
                $.ajax({
                    url: "/ajax/category3",
                    type: 'post',
                    data: {data: data,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            setTimeout(function(){ location.reload(); });
                        }else {
                            alert('Error');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("Ajax Not Working Now"+errorThrown);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#category4").change(function () {
                var data= {id: $("#category4").val(),};
                $.ajax({
                    url: "/ajax/category4",
                    type: 'post',
                    data: {data: data,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            setTimeout(function(){ location.reload(); });
                        }else {
                            alert('Error');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("Ajax Not Working Now"+errorThrown);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#category5").change(function () {
                var data= {id: $("#category5").val(),};
                $.ajax({
                    url: "/ajax/category5",
                    type: 'post',
                    data: {data: data,
                        '_token': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    beforeSend: function() {
                    },
                    success: function (response) {
                        if(response.status == 'success'){
                            setTimeout(function(){ location.reload(); });
                        }else {
                            alert('Error');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("Ajax Not Working Now"+errorThrown);
                    }
                });
            });
        });
    </script>

@endsection