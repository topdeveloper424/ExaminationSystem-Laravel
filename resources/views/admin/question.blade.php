@extends('layout/admin-layout')
@section('title')
    Questions
@stop

@section('content')
    <div class=" content-area">
        <div class="page-header">
            <h4 class="page-title">Questions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Questions</li>
            </ol>
        </div>


        <div class="row ">
            <div class="col-lg-12 col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-lg-3">
                        <h3 class="card-title">Question List</h3>
                        </div>
                        <div class="col-lg-5">
                            <select class="form-control select2-show-search" id="selectCategory" data-placeholder="Choose one (with searchbox)" onchange="filterCategory()">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($cur_id == $category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <button class="mr-4 btn btn-success"  data-toggle="tooltip" data-placement="top" title="Add New Question" style="float: right" onclick="addNew()"><i class="fa fa-link"></i>&nbsp;Add Question</button>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th style="width: 3%">#</th>
                                <th style="width: 20%">Question</th>
                                <th style="width: 62%">Category</th>
                                <th style="width:15%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($questions))
                            <?php $idx = 1; ?>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{$idx}}</td>
                                    <td>{{$question->question}}</td>
                                    <td>{{$question->category}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary  btn-sm" data-toggle="tooltip" data-placement="top" title="edit this question" onclick="editOne({{$question->id}})"><i class="fa fa-pencil"></i>&nbsp;Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete this question" onclick="deleteOne({{$question->id}})"><i class="fa fa-trash"></i>&nbsp;Delete</button>

                                    </td>
                                </tr>
                                <?php $idx++; ?>
                            @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                    {{ $questions->links() }}

                </div>

            </div>

        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.add_question')}}" id="addForm" method="post">
                        @csrf

                        <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Add New Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newName">Category</label>
                                        <input type="hidden" name="category" id="addCate" value="{{$cur_id}}">
                                        <select class="form-control"  name="category" id="addCategory" onchange="setAddCategory()" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($cur_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="newName">Question</label>
                                        <textarea class="form-control" type="text" name="question" id="newQuestion" placeholder="Question" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="radio1" value="1">
                                                <span class="custom-control-label">Answer 1</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="answer1" name="answer1" required>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="radio2" value="2">
                                                <span class="custom-control-label">Answer 2</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="answer2" name="answer2" required>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="radio3" value="3">
                                                <span class="custom-control-label">Answer 3</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="answer3" name="answer3" required>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="radio4" value="4">
                                                <span class="custom-control-label">Answer 4</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="answer4" name="answer4" required>
                                        </div>
                                    </div>

                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addForm()">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{route('admin.update_question')}}" id="editForm" method="post">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">Edit Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="cur_id" name="cur_id">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="newName">Category</label>
                                        <input type="hidden" name="category" id="editCate" value="{{$cur_id}}">
                                        <select class="form-control" name="category" id="editCategory" onchange="setEditCategory()" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($cur_id == $category->id) selected @endif>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="newName">Question</label>
                                        <textarea class="form-control" type="text" name="question" id="editQuestion" placeholder="Question" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="editRadio1" value="1">
                                                <span class="custom-control-label">Answer 1</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="editAnswer1" name="answer1" required>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="editRadio2" value="2">
                                                <span class="custom-control-label">Answer 2</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="editAnswer2" name="answer2" required>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="editRadio3" value="3">
                                                <span class="custom-control-label">Answer 3</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="editAnswer3" name="answer3" required>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="correct" id="editRadio4" value="4">
                                                <span class="custom-control-label">Answer 4</span>
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="editAnswer4" name="answer4" required>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="editForm()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filterCategory(id) {
            var category = $("#selectCategory").val();
            document.location.href="/admin/questions?category="+category;

        }

        function addNew() {
            $("#newQuestion").val("");
            $("#answer1").val("");
            $("#answer2").val("");
            $("#answer3").val("");
            $("#answer4").val("");
            $("#addCategory").val("");
            $("#addModal").modal('show');
        }

        function addForm() {
            var newquestion = $("#newQuestion").val();
            var answer1 = $("#answer1").val();
            var answer2 = $("#answer2").val();
            var answer3 = $("#answer3").val();
            var answer4 = $("#answer4").val();
            var category = $("#addCategory").val();


            if (category == "" || newquestion == "" || answer1 == "" || answer2 == "" || answer3 == "" || answer4 == ""){
                swal({
                    title: "Error",
                    text: "Please Fill out all fields!",
                    type: "error"
                });
                return;

            }


            if($('#radio1').is(':checked') || $('#radio2').is(':checked') || $('#radio3').is(':checked') || $('#radio4').is(':checked')){
                $("#addForm").submit();
            }else{
                swal({
                    title: "Error",
                    text: "Please check Correct question !",
                    type: "error"
                });
            }
        }

        function editOne(id) {
            $("#editQuestion").val("");
            $("#editAnswer1").val("");
            $("#editAnswer2").val("");
            $("#editAnswer3").val("");
            $("#editAnswer4").val("");
            $("#editCategory").val("");
            $("#cur_id").val(id);
            $.ajax({
                type: "get",
                url: '{{route('admin.get_question')}}',
                data: {
                    id: id
                },
                success: function (data) {
                    console.log(data);
                    var jsondata= JSON.parse(data);
                    $("#editQuestion").val(jsondata["question"]);
                    $("#editCategory").val(jsondata["category_id"]);
                    $("#editAnswer1").val(jsondata["res1"]);
                    $("#editAnswer2").val(jsondata["res2"]);
                    $("#editAnswer3").val(jsondata["res3"]);
                    $("#editAnswer4").val(jsondata["res4"]);
                    $("#editRadio"+jsondata["correct"]).prop("checked", true);

                    $("#editModal").modal('show');
                }
            });
        }

        function editForm() {
            var newquestion = $("#editQuestion").val();
            var answer1 = $("#editAnswer1").val();
            var answer2 = $("#editAnswer2").val();
            var answer3 = $("#editAnswer3").val();
            var answer4 = $("#editAnswer4").val();
            var category = $("#editCategory").val();


            if (category == "" || newquestion == "" || answer1 == "" || answer2 == "" || answer3 == "" || answer4 == ""){
                swal({
                    title: "Error",
                    text: "Please Fill out all fields!",
                    type: "error"
                });
                return;

            }

            if($('#editRadio1').is(':checked') || $('#editRadio2').is(':checked') || $('#editRadio3').is(':checked') || $('#editRadio4').is(':checked')){
                $("#editForm").submit();
            }else{
                swal({
                    title: "Error",
                    text: "Please check Correct question !",
                    type: "error"
                });
            }


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
                $.post("{{route('admin.remove_question')}}",{
                    _token:'{{csrf_token()}}',
                    id:id,
                }).done(
                    function (data) {
                        document.location.reload(true);
                    }
                );
            });
        }

        function setAddCategory() {
            var category = $("#addCategory").val();
            $("#addCate").val(category);
        }
        function setEditCategory() {
            var category = $("#editCategory").val();
            $("#editCate").val(category);
        }
    </script>

@stop

