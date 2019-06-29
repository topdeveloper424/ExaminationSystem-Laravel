@extends('layout/admin-layout')
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
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $idx = 1; ?>
                                            @foreach($tests as $test)
                                                <tr>
                                                    <td>{{$idx}}</td>
                                                    <td><a href="{{route('admin.invite')}}?id={{$test->id}}">{{$test->name}}</a></td>
                                                    <td>{{$test->invite_count}}</td>
                                                    <td>{{$test->result_count}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete this test" onclick="deleteOne({{$test->id}})"><i class="fa fa-trash"></i>Delete</button>
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
</div>

    <script>
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