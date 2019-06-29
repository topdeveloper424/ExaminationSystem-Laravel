@extends('layout/recruiter-layout')
@section('title')
    Results
@stop

@section('content')
    <link href="{{asset('assets\plugins\wysiwyag\richtext.css')}}" rel="stylesheet">
    <script src="{{asset('assets\plugins\wysiwyag\jquery.richtext.js')}}"></script>
    <div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Results</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Results</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Result List</div>
                </div>
                <div class="card-body p-6">
                    <div class="wizard-container">
                        <div class="wizard-card mt-4 m-0" data-color="red" id="wizardProfile">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{route('recruiter.tests')}}" class="form-control btn btn-outline-primary"><i class="fa fa-book"></i>&nbsp;&nbsp;Past Assessments</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('recruiter.invite')}}?id={{$test_id}}" class="form-control btn btn-outline-success"><i class="fa fa-group"></i>&nbsp;&nbsp;Invite</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="form-control btn btn-danger"><i class="fa fa-star-o"></i>&nbsp;&nbsp;Result</a>
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
                                                <th>Time</th>
                                                <th>Score</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $idx = 1; ?>
                                            @foreach($invites as $invite)
                                                <tr>
                                                    <td>{{$idx}}</td>
                                                    <td>{{$invite->email}}</td>
                                                    <td>{{$invite->take_time}}</td>
                                                    <td>
                                                        @if($invite->score > 4)
                                                            <span class="badge badge-danger">{{$invite->score}}</span>
                                                        @elseif($invite->score > 3)
                                                            <span class="badge badge-info">{{$invite->score}}</span>
                                                        @elseif($invite->score > 2)
                                                            <span class="badge badge-warning">{{$invite->score}}</span>
                                                        @else
                                                            <span class="badge badge-default">{{$invite->score}}</span>
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
    <script>


    </script>
@stop