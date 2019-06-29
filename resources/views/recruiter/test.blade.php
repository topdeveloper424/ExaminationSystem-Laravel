@extends('layout/recruiter-layout')
@section('title')
    Tests
@stop

@section('content')
    <div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Tests</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Test</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Past Assessments</div>
                </div>
                <div class="card-body p-6">
                    <div class="wizard-container">
                        <div class="wizard-card mt-4 m-0" data-color="red" id="wizardProfile">
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="#" class="form-control btn btn-primary"><i class="fa fa-book"></i>&nbsp;&nbsp;Past Assessments</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="form-control btn btn-outline-success"><i class="fa fa-group"></i>&nbsp;&nbsp;Invite</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a class="form-control btn btn-outline-danger"><i class="fa fa-star-o"></i>&nbsp;&nbsp;Result</a>
                                    </div>
                                </div>
                                <div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap table-primary">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Test Name</th>
                                                <th>Invited</th>
                                                <th>Results</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $idx = 1; ?>
                                            @foreach($tests as $test)
                                                <tr>
                                                    <td>{{$idx}}</td>
                                                    <td><a href="{{route('recruiter.invite')}}?id={{$test->id}}" data-toggle="tooltip" data-placement="left" title="Click to go this test page" class="btn btn-success">{{$test->name}}</a></td>
                                                    <td>{{$test->invite_count}}</td>
                                                    <td>{{$test->result_count}}</td>
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

                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
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
                    swal('Congratulations!', 'Your message has been successfully sent', 'success');
                    document.location.reload(true);
                }
            );
        });


    }

</script>
@stop