@extends('layout/recruiter-layout')
@section('title')
    Create Test
@stop

@section('content')
    <div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Create Test</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Test</li>
            </ol>
        </div>


        <div class="row ">
            <div class="col-lg-12 col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-3">
                            <h3 class="card-title">TEST LIST</h3>
                        </div>
                        <div class="col-lg-9">
                            <button class="mr-4 btn btn-success" data-toggle="tooltip" data-placement="top" title="Create New Test" style="float: right" onclick="addNew()"><i class="fa fa-link"></i>&nbsp;Add Test</button>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Questions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $idx = 1; ?>
                            @foreach($tests as $test)
                                <tr>
                                    <td>{{$idx}}</td>
                                    <td>{{$test->name}}</td>
                                    <td>{{$test->question_num}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="detail of this test" onclick="moreDetails({{$test->id}})"><i class="fa fa-comment"></i>&nbsp;Details</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete this test" onclick="deleteOne({{$test->id}})"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                    </td>
                                </tr>
                                <?php $idx++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>

            </div>

        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Create New Test</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="newName">Test Name</label>
                                        <input class="form-control" type="text" name="name" id="newName" placeholder="Test name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newName">Category</label>
                                        <select class="form-control" name="category" id="categories" onchange="selectCategory()">
                                            <option value="">Select Category ... </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newName"> Number</label> <span class="tag tag-red" id="max_number"></span>
                                        <input type="number" class="form-control" name="question_num" id="question_num" min="1">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="newName"> </label> <br>
                                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Add New Category" onclick="addNewCategory()">Add</button>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <th>category</th>
                                        <th>Question Number</th>
                                        <th>Delete</th>
                                        </thead>
                                        <tbody id="addTbody">

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="addTest()">Save</button>
                        </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Test Details </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <th>category</th>
                                        <th>Question Number</th>
                                        </thead>
                                        <tbody id="detalTbody">
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>


    </div>
    <script>

        function addNew() {
            $("#newName").val("");
            $("#categories").val("");
            $("#question_num").val("");
            $("#max_number").html("");
            $("#addTbody").html("");
            $("#addModal").modal('show');
        }

        function selectCategory() {
            var category_id = $("#categories").val();
            if(category_id == ''){
                swal({
                    title: "Error",
                    text: "Please select question number!",
                    type: "error"
                });
                return;

            }
            $.ajax({
                type: "get",
                url: '{{route('recruiter.get_question_num')}}',
                data: {
                    id: category_id
                },
                success: function (data) {
                    $("#max_number").html("max number : " + data);
                    $("#question_num").attr("max",data);
                }
            });


        }

        function addNewCategory() {
            var category = $("#categories").val();
            var question_num = $("#question_num").val();
            var category_name = $('#categories option:selected').text();
            if (category == '' || question_num == ''){
                swal({
                    title: "Error",
                    text: "Please enter all fields !",
                    type: "error"
                });
                return;
            }


            var addTbody = document.getElementById("addTbody");
            var row = addTbody.insertRow(-1);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);

            var len = addTbody.getElementsByTagName("tr").length;
            len = len - 1;

            cell0.innerHTML = category_name + "<input type='hidden' value='"+category+"'>";
            cell1.innerHTML = question_num + "<input type='hidden' value='"+question_num+"'>";
            cell2.innerHTML = "<button type='button' class=\"btn btn-dark\" onclick=\"del("+len+")\"><i class=\"icon ion-trash-a\"></i></button>";

        }
        function del(num) {
            var addTbody = document.getElementById("addTbody");
            addTbody.deleteRow(num);
            for (var i = num; i < addTbody.children.length; i++) {
                bt.innerHTML = "<button type='button' class=\"btn btn-dark\" onclick=\"del("+i+")\"><i class=\"icon ion-trash-a\"></i></button>";
            }

        }

        function addTest() {
            var addTbody = document.getElementById("addTbody");
            var ch = addTbody.children;
            var testname = $("#newName").val();
            if(testname.trim() == ''){
                swal({
                    title: "Error",
                    text: "Please enter Test Name!",
                    type: "error"
                });
                return;

            }
            if (addTbody.children.length == 0 ){
                swal({
                    title: "Error",
                    text: "Please enter all fields !",
                    type: "error"
                });
                return;

            }
            var content = [];
            for (var i = 0; i < addTbody.children.length; i++) {
                var temp = ch[i];
                var td = temp.getElementsByTagName("td");
                var category= td[0].getElementsByTagName("input");
                var category_id = category[0].value;

                var num_tag= td[1].getElementsByTagName("input");
                var number = num_tag[0].value;
                var item = {}
                item["category"] = category_id;
                item["number"] = number;
                content.push(item);
            }

            $.post("{{route('recruiter.add_test')}}",{
                _token:'{{csrf_token()}}',
                name:testname,
                content:JSON.stringify(content),
            }).done(
                function (data) {
                    document.location.reload(true);
                }
            );
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
                $.post("{{route('recruiter.remove_test')}}",{
                    _token:'{{csrf_token()}}',
                    id:id,
                }).done(
                    function (data) {
                        document.location.reload(true);
                    }
                );
            });
        }

        function moreDetails(id) {
            $("#detalTbody").html("");
            $.ajax({
                type: "get",
                url: '{{route('recruiter.get_test')}}',
                data: {
                    id: id
                },
                success: function (data) {
                    console.log(data);
                    var jsondata = JSON.parse(data);
                    var htm = '';
                    for (var i = 0; i < jsondata.length; i ++){
                        var row = jsondata[i];
                        console.log(row);
                        htm += '<tr><td>' + row['name'] + '</td><td>'+ row['question_num']+'</td></tr>';
                    }

                    $("#detalTbody").html(htm);
                    $("#detailModal").modal('show');
                }
            });

        }
    </script>

@stop

