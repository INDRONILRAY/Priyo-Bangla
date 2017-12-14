@extends('Admin.layouts.master')

@section('main_title')
    {{'Dashboard'}}
@endsection
@section('selectjs')
        <!-- Include Bootstrap Datepicker -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
        <!-- Include Bootstrap Datepicker -->
<style type="text/css">
    #dateRangeForm .form-control-feedback {
        top: 0;
        right: -15px;
    }
</style>
    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>

@endsection

@section('bread_crumbs')
    {{$text}}
@endsection

@section('blog-view-active', 'active')
@section('content')

        <!-- Content area -->
    <div class="content" id="part1">
        <label><h2>Posts</h2><a href="{{ url('/admin/new-post') }}"><button type="button" class="btn btn-info right">Add New</button></a></label><br>
        <label class="button-inline"><button type="button" class="btn">Search News : </button></label>
        <label class="option-inline">
                <input type="text" class="form-control" name="dateRangePicker" id="dateRangePicker" />
        </label>
        <label class="button-inline"><button type="submit" class="btn" id="seacat">Filter</button></label>
        <div class="table-responsive">

            <table class="table table-bordred table-striped">

                <thead>
                {{--<th><input type="checkbox" id="checkall" /></th>--}}
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Views</th>
                <th>Actions</th>
                <th>Categories</th>
                </thead>
                <tbody>
                @foreach($news as $item)
                <tr>
                    {{--<td><input type="checkbox" class="checkthis" id="chkbox" name="chkbox" /></td>--}}
                    <td>{{ str_limit($item->title,$limit = 100, $end = '...') }}</td>
                    <td>{{ \App\User::where('id',$item->user_id)->value('name') }}</td>
                    <td>{{ date('j',strtotime($item->created_at)) }} {{ date('F',strtotime($item->created_at)) }}  {{ date('Y',strtotime($item->created_at)) }}</td>
                    <td>{{ $item->views }} </td>
                    <td>
                        <a href="/admin/{{ $item->id }}/edit-post"> <button type="button" class="btn btn-xs btn-success" style="border-radius: 5px">Edit</button> </a>
                        <button type="button" onclick='catDelete("{{ $item->id }}")') class="btn btn-xs btn-danger" style="border-radius: 5px">Delete</button>
                    </td>
                    <td style="width: 10%">
                    <?php $data = \App\termtaxomony::where('news_id',$item->id)->get();
                    foreach($data as $item)
                    echo \App\category::where('id',$item->term_id)->value('name').",&nbsp;";
                    ?>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="clearfix"></div>
            <ul class="pagination pull-right" id="table-1-p" >
                {{ $news->links() }}
            </ul>
        </div>

    </div>

<!-- Content area -->
    <div class="content" id="part2">
        <label><h2>Posts</h2><a href="{{ url('/admin/All-News') }}"><button type="button" class="btn btn-success right">All News</button></a></label><br>
        <label class="button-inline"><button type="button" class="btn">Search News : </button></label>
        <label class="option-inline">
                <input type="text" class="form-control" name="dateRangePicker" id="dateRangePicker" />
        </label>
        <label class="button-inline"><button type="submit" class="btn" id="seacat">Filter</button></label>
        <div class="table-responsive">

            <table class="table table-bordred table-striped">

                <thead>
                {{--<th><input type="checkbox" id="checkall" /></th>--}}
                <th>ID</th>
                <th>Title</th>
                <th>Views</th>
                <th>Date</th>
                <th>Actions</th>
                </thead>
                <tbody id="datatable">

                </tbody>
            </table>

        </div>

    </div>
    <!-- /content area -->

<script>
    $(document).ready(function(){
        $('#part2').hide();
        $("#seacat").click(function () {
            $('#part1').fadeOut();
            var data= {
                dateRangePicker: $("#dateRangePicker").val(),
            };
            $.ajax({
                url: "/ajax/seacat",
                type: 'post',
                data: {data: data,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: 'json',
                beforeSend: function() {
                },
                success: function (response) {
                    $('#part2').fadeIn('slow');
                    if(response.status == 'success'){
                        $("#datatable").empty();
                        var len = response['xx'].length;
                        if(len>0) {
                            for (var i = 0; i < len; i++) {
                                var id = response['xx'][i]['id'];
                                var title = response['xx'][i]['title'];
                                var view = response['xx'][i]['views'];
                                var date = response['xx'][i]['created_at'];
                                $("#datatable").append("<tr>");
                                $("#datatable").append("<td>" + id + "</td>");
                                $("#datatable").append("<td>" + title + "</td>");
                                $("#datatable").append("<td>" + view + "</td>");
                                $("#datatable").append("<td>" + date + "</td>");
                                $("#datatable").append("" +
                                        "<a href='/admin/"+ id +"/edit-post'> <button type='button' class='btn btn-xs btn-success' style='border-radius: 5px'>Edit</button> </a>");

                                $("#datatable").append("</tr>");
                            }

                        }

                    }else {
                        alert('Error Data Cannot Find');
                    }
                },
                error:function(jqXHR, textStatus, errorThrown){
                    console.log("error"+errorThrown);
                }
            });
        });
    });
</script>

    <script>
                function catDelete(i) {
                    var data = {
                        id: i
                    };
                    if (confirm('Are You Sure To delete This News? ')) {
                        $.ajax({
                            url: "/ajax/news/delete",
                            type: 'post',
                            data: {
                                data: data,
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            beforeSend: function () {
                            },
                            success: function (response) {
                        if (response.status == 'success') {
                            $("#mytable").load(window.location + " #mytable");
                            alert('SuccessFully Data Deleted');
                        } else {
                            alert('Error');
                        }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log("error" + errorThrown);
                            }
                        });
                    } else {
                        alert('Delete Cancel')
                    }
                }
    </script>
<script>
    $(document).ready(function() {
        $('#dateRangePicker')
                .datepicker({
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    startDate: '2010-01-01',
                    endDate: '2020-01-01'
                })
    });
</script>
@endsection
