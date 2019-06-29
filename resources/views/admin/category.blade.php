@extends('layout/admin-layout')
@section('title')
    Categories
@stop

@section('content')
    <div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Categories</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categories</li>
            </ol>
        </div>


        <div class="row ">
            <div class="col-lg-12 col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-3">
                            <h3 class="card-title">CATEGORY LIST</h3>
                        </div>
                        <div class="col-lg-9">
                            <button class="mr-4 btn btn-success"  data-toggle="tooltip" data-placement="top" title="Create New Category" style="float: right" onclick="addNew()"><i class="fa fa-link"></i>&nbsp;Add New</button>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 3%">#</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 62%">Description</th>
                                <th style="width:15%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $idx = 1; ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$idx}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="edit this category" onclick="editOne({{$category->id}})"><i class="fa fa-pencil"></i>&nbsp;Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete this category" onclick="deleteOne({{$category->id}})"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                    </td>
                                </tr>
                                <?php $idx++; ?>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                    <!-- table-responsive -->
                </div>

            </div>

        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.add_category')}}" method="post">
                        @csrf

                        <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="newName">Category Name</label>
                                        <input class="form-control" type="text" name="name" id="newName" placeholder="Category name" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="newDescription">Description</label>
                                        <textarea class="form-control" type="text" name="description" id="newDescription" placeholder="description" required>
                                </textarea>
                                    </fieldset>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.update_category')}}" method="post">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="cur_id" name="cur_id">
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="newName">Category Name</label>
                                        <input class="form-control" type="text" name="name" id="curName" placeholder="Category name" required>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="newDescription">Description</label>
                                        <textarea class="form-control" type="text" name="description" id="curDescription" placeholder="description" required>
                                </textarea>
                                    </fieldset>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <script>

        function addNew() {
            $("#newName").val("");
            $("#newDescription").val("");
            $("#addModal").modal('show');
        }


        function editOne(id) {
            $("#cur_id").val(id);
            $("#curName").val("")
            $("#curDescription").val("")
            $.ajax({
                type: "get",
                url: '{{route('admin.get_category')}}',
                data: {
                    id: id
                },
                success: function (data) {
                    console.log(data);
                    var jsondata= JSON.parse(data);
                    $("#curName").val(jsondata["name"]);
                    $("#curDescription").val(jsondata["description"]);
                    $("#editModal").modal('show');
                }
            });
        }

        function deleteOne(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success btn-raised mr-5',
                cancelButtonClass: 'btn btn-danger btn-raised',
                buttonsStyling: false
            }, function () {
                $.post("{{route('admin.remove_category')}}",{
                    _token:'{{csrf_token()}}',
                    id:id,
                }).done(
                    function (data) {
                        document.location.reload(true);
                    }
                );
            });
        }
    </script>

@stop

