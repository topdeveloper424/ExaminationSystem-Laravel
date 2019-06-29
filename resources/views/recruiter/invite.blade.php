@extends('layout/recruiter-layout')
@section('title')
    Tests
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
                                        <a href="{{route('recruiter.tests')}}" class="form-control btn btn-outline-primary"><i class="fa fa-book"></i>&nbsp;&nbsp;Past Assessments</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="form-control btn btn-success"><i class="fa fa-group"></i>&nbsp;&nbsp;Invite</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('recruiter.result')}}?id={{$test_id}}" class="form-control btn btn-outline-danger"><i class="fa fa-star-o"></i>&nbsp;&nbsp;Result</a>
                                    </div>
                                </div>
                                <hr>
                            <form action="{{route('recruiter.send_invite')}}" method="post">
                                @csrf
                                <input type="hidden" name="test_id" value="{{$test_id}}">
                                <div class="row mt-6">
                                    <div class="col-md-12"><span class="tag tag-red">Current Server Datetime : {{$cur_date}} </span></div>
                                    <div class="col-md-3">
                                            <label class="form-label">Validity (Days) : </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="validDays" placeholder="Enter number of days" required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <label class="form-label">To Email Address : </label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="email" placeholder="enter emails separated by commas(,)" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Subject : </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="subject" placeholder="subject" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Text Message : </label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea class="content" name="content" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-azure" style="float: right"><i class="fa fa-envelope-open-o"></i>&nbsp;Send Invitation</button>
                                    </div>
                                </div>
                            </form>
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
                                                <th>Activity</th>
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
                                                    <td><button class="btn btn-secondary btn-sm" onclick="resend({{$invite->id}})"><i class="fa fa-history"></i>&nbsp;resend</button></td>
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
        $(function(e) {
            $('.content').richText();
        });

        function resend(id) {
            $.post("{{route('recruiter.resend_invite')}}",{
                _token:'{{csrf_token()}}',
                async:false,
                id:id,
            }).done(
                function (data) {
                    swal('Congratulations!', 'Your message has been successfully sent', 'success');
                }
            );
        }


    </script>
@stop