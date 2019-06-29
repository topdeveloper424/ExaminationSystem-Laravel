@extends('layout/candidate-layout')
@section('title')
  Candidate dashboard
@stop

@section('content')
  <div class=" content-area">
    <div class="page-header">
      <h4 class="page-title">Dashboard</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="row row-cards">
      <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
        <div class="card card-img-holder text-default bg-color">
          <div class="row">
            <div class="col-4">
              <div class="circle-icon bg-primary text-center align-self-center shadow-primary"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-user fs-30  text-white mt-4"></i></div>
            </div>
            <div class="col-8">
              <div class="card-body p-4">
                <h1 class="mb-3">{{count($invites)}}</h1>
                <h5 class="font-weight-normal mb-0">Total Invitations</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
        <div class="card card-img-holder text-default">
          <div class="row">
            <div class="col-4">
              <div class="card-img-absolute circle-icon bg-secondary align-items-center text-center shadow-secondary"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-heart fs-30 text-white mt-4"></i></div>
            </div>
            <div class="col-8">
              <div class="card-body p-4">
                <h1 class="mb-3">{{$pending}}</h1>
                <h5 class="font-weight-normal mb-0">Pending Tests</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
        <div class="card card-img-holder text-default">
          <div class="row">
            <div class="col-4">
              <div class="card-img-absolute  circle-icon bg-info align-items-center text-center shadow-info"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-bubble fs-30 text-white mt-4"></i></div>
            </div>
            <div class="col-8">
              <div class="card-body p-4">
                <h1 class="mb-3">{{$finished}}</h1>
                <h5 class="font-weight-normal mb-0">Finished Tests</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
        <div class="card card-img-holder text-default">
          <div class="row">
            <div class="col-4">
              <div class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success"><img src="assets\images\circle.svg" class="card-img-absolute"><i class=" lnr lnr-envelope fs-30 text-white mt-4 "></i></div>
            </div>
            <div class="col-8">
              <div class="card-body p-4">
                <h1 class="mb-3">@if($avg) {{$avg}} @else 0 @endif</h1>
                <h5 class="font-weight-normal mb-0">Average Score</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title"> Invite</div>
          </div>
          <div class="card-body p-6">

            <div class="table-responsive">
              <table class="table card-table table-vcenter text-nowrap table-primary">
                <thead class="bg-primary text-white">
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Test Time</th>
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
                    <td>{{$invite->score}}</td>
                  </tr>
                  <?php $idx++; ?>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

@stop