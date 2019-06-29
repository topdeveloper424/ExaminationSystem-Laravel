@extends('layout/admin-layout')
@section('title')
    Invite
@stop

@section('content')
    <link href="{{asset('assets\plugins\wysiwyag\richtext.css')}}" rel="stylesheet">
    <script src="{{asset('assets\plugins\wysiwyag\jquery.richtext.js')}}"></script>
    <div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Invite</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Invite</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Invite</div>
                </div>
                <div class="card-body p-6">
                    <div class="wizard-container">
                        <div class="wizard-card mt-4 m-0" data-color="red" id="wizardProfile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{route('admin.displaylist')}}" class="form-control btn btn-outline-primary"><i class="fa fa-book"></i>&nbsp;&nbsp;Past Assessments</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="form-control btn btn-success"><i class="fa fa-group"></i>&nbsp;&nbsp;Invite</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('admin.result')}}?id={{$test_id}}" class="form-control btn btn-outline-danger"><i class="fa fa-star-o"></i>&nbsp;&nbsp;Result</a>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table card-table table-vcenter text-nowrap table-primary">
                                            <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Vaild Days</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $idx = 1; ?>
                                            @foreach($invites as $invite)
                                                <tr>
                                                    <td>{{$idx}}</td>
                                                    <td>{{$invite->email}}</td>
                                                    <td>{{$invite->valid_days}}</td>
                                                    <td>@if($invite->status == 0)
                                                            Pending
                                                        @else
                                                            finished
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $idx++; ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop