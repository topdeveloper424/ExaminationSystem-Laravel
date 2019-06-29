@extends('layout/admin-layout')
@section('title')
  admin dashboard
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
                <h1 class="mb-3">{{$recruiters}}</h1>
                <h5 class="font-weight-normal mb-0">Total Recruiters</h5>
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
                <h1 class="mb-3">{{$candidates}}</h1>
                <h5 class="font-weight-normal mb-0">Total Candidates</h5>
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
                <h1 class="mb-3">{{$categories_count}}</h1>
                <h5 class="font-weight-normal mb-0">Total Categories</h5>
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
                <h1 class="mb-3">{{$invitations}}</h1>
                <h5 class="font-weight-normal mb-0">Total Invitations</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Welcome to examination system !</h3>
          </div>
          <div class="card-body">
            <div id="carousel-indicators2" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators2">
                <li data-target="#carousel-indicators2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-indicators2" data-slide-to="1"></li>
                <li data-target="#carousel-indicators2" data-slide-to="2"></li>
                <li data-target="#carousel-indicators2" data-slide-to="3"></li>
                <li data-target="#carousel-indicators2" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" alt="" src="assets\images\photos\19.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\20.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\21.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\22.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\23.jpeg" data-holder-rendered="true">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class=" col-md-6 col-xl-4">
        <div class="card">
          <div class="card-header border-bottom">
            <h5 class="card-title">Categories Summary</h5>
          </div>
          <div class="card-body p-0">
            @foreach($categories as $category)
            <div class="clearfix border-bottom p-3 ">
              <div class="col mb-0">
                <div>
                  <div class="float-left">
                    <h5><strong>{{$category->name}}</strong></h5>
                    <h6 class="mb-0">{{$category->description}}</h6>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="float-right">
                  <h4 class="font-weight-semibold label-medium-size mt-4 mb-0 text-primary">{{$category->question}} questions</h4>
                </div>
              </div>
            </div>
              @endforeach
          </div>
          <div class="card-footer text-center">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 col-sm-12 col-xl-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Latest Tests</h4>
          </div>
          <div class="card-body">
            <ul class="timeline">
              @foreach($recents as $recent)
                <li>
                  <a href="{{route('recruiter.invite')}}?id={{$recent->id}}"><strong>{{$recent->name}}</strong></a>
                  <a class="float-right">{{$recent->number}} questions</a>
                  <p>{{$recent->category}} categories </p>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>


    </div>


  </div>

@stop