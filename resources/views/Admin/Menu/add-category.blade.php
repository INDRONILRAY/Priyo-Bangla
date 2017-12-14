@extends('Admin.layouts.master')

@section('main_title')
    {{$text}}
@endsection
@section('dashboardjs')
    <script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
@endsection

@section('bread_crumbs')
    {{$text}}
@endsection

@section('active', 'active')
@section('content')

    <div class="content">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h1>Add New Category</h1>
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_cat" id="id_cat" value=""/>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" style="border: 1px solid #888888"required>
                            <p class="text-italic">The name is how it appears on your site.</p>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" style="border: 1px solid #888888"required>
                            <p class="text-italic">The “slug” is the URL-friendly version of the name. It is usually
                                all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent Category</label>
                            <select id="parent" class="form-control" style="border: 1px solid #888888"required>
                                <option value="" class="active">None</option>
                                <?php $value = \App\category::where('parent',"")->get(); ?>
                                @foreach($value as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <p class="text-italic">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and
                                under that have children categories for Bebop and Big Band. Totally optional.</p>
                        </div>
                        <div class="form-group">
                            <label for="dsc">Description</label>
                            <textarea class="form-control" rows="5" id="dsc" name="dsc" style="border: 1px solid #888888"required></textarea>
                            <p class="text-italic">The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                    <button type="button" class="btn btn-primary" id="btn-add" name="submit" value="submit">Add New Categories</button>
                    <button type="button" class="btn btn-warning" id="btn-update" name="submit" value="submit">Update Category</button>
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table id="listitem" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td>slug</td>
                                <td>parent</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $category =  \App\category::orderBy('id', 'desc')->get();?>
                            @foreach($category as $result)
                                <tr>
                                    <td>{{ $result->name }}</td>
                                    <td>{{ $result->slug }}</td>
                                    <td>{{ $result->parent }}</td>
                                    <td>
                                        <button type="button" onclick='myFunction("{{ $result->id }}")') class="btn btn-xs btn-success" style="border-radius: 5px">Edit</button>
                                        <button type="button" onclick='catDelete("{{ $result->id }}")') class="btn btn-xs btn-danger" style="border-radius: 5px">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <script>
                        $(document).ready(function(){
                           $('#list-item').DataTable();
                        });
                    </script>
            </div>
       </div>
    </div>
        <script type="text/javascript">
            $(document).ready(function(){
            $('#btn-update').hide();
			$("#btn-add").click(function () {
            var data= {
                name: $("#name").val(),
                slug: $("#slug").val(),
                parent: $("#parent").val(),
                dsc: $("#dsc").val(),
            };
            $.ajax({
                url: "/ajax/category",
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
                    console.log("error"+errorThrown);
                }
            });
			$("#name").val('');
			$("#slug").val('');
			$("#parent").val('');
			$("#dsc").val('');
			});
			});
        </script>
    <script>
        function myFunction(i) {
            $('#btn-update').show();
            $('#btn-add').hide();
            var data= {
                id: i
            };
            $.ajax({
                url: "/ajax/edit/category",
                type: 'post',
                data: {data: data,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: 'json',
                beforeSend: function() {
                },
                success: function (response) {
//                    console.log(response)
                            if(response.status == 'success'){
                                document.getElementById('name').value = response.name;
                                document.getElementById('slug').value = response.slug;
                                document.getElementById('parent').value = response.parent;
                                document.getElementById('dsc').value = response.dsc;
                                document.getElementById('id_cat').value = response.id;
                            }else {
                                alert('Error');
                            }
                },
                error:function(jqXHR, textStatus, errorThrown){
                    console.log("error"+errorThrown);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function(){
            $("#btn-update").click(function () {
                var data= {
                    name: $("#name").val(),
                    slug: $("#slug").val(),
                    parent: $("#parent").val(),
                    dsc: $("#dsc").val(),
                    id_cat: $("#id_cat").val(),
                };
                $.ajax({
                    url: "/ajax/update/category",
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
                            alert('Category Updated ');
                        }else {
                            alert('Error Data Cannot Update');
                        }
                    },
                    error:function(jqXHR, textStatus, errorThrown){
                        console.log("error"+errorThrown);
                    }
                });
                $("#name").val('');
                $("#slug").val('');
                $("#parent").val('');
                $("#dsc").val('');
            });
        });
    </script>
    <script>
        function catDelete(i) {
            $('#btn-add').show();
            var data= {
                id: i
            };
            $.ajax({
                url: "/ajax/delete/category",
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
                        alert('Category SuccessFully Deleted');
                    }else {
                        alert('Error');
                    }
                },
                error:function(jqXHR, textStatus, errorThrown){
                    console.log("error"+errorThrown);
                }
            });
        }
    </script>
@endsection