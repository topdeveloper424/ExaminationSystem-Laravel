@extends('layout/recruiter-layout')
@section('title')
  recruiter dashboard
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
              <div class="circle-icon bg-primary text-center align-self-center shadow-primary"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-apartment fs-30  text-white mt-4"></i></div>
            </div>
            <div class="col-8">
              <div class="card-body p-4">
                <h1 class="mb-3">{{$test}}</h1>
                <h5 class="font-weight-normal mb-0">Total Tests</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-6 col-xl-3 col-md-6">
        <div class="card card-img-holder text-default">
          <div class="row">
            <div class="col-4">
              <div class="card-img-absolute circle-icon bg-secondary align-items-center text-center shadow-secondary"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-user fs-30 text-white mt-4"></i></div>
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
              <div class="card-img-absolute  circle-icon bg-info align-items-center text-center shadow-info"><img src="assets\images\circle.svg" class="card-img-absolute"><i class="lnr lnr-question-circle fs-30 text-white mt-4"></i></div>
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
              <div class="card-img-absolute circle-icon bg-success align-items-center text-center shadow-success"><img src="assets\images\circle.svg" class="card-img-absolute"><i class=" lnr lnr-drop fs-30 text-white mt-4 "></i></div>
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

      <div class="col-md-6 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Please try to test your candidates</h3>
          </div>
          <div class="card-body">
            <div id="carousel-controls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" alt="" src="assets\images\photos\4.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\6.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\7.jpeg" data-holder-rendered="true">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" alt="" src="assets\images\photos\8.jpeg" data-holder-rendered="true">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-controls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-controls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Category List</h3>
          </div>
          <div class="table-responsive pt-3 pb-3">
            <table class="table card-table table-vcenter text-nowrap">
              <tbody>
              @foreach($categories as $category)
              <tr>
                <td class="no-border">{{$category->name}}</td>
                <td class="no-border text-right"><span class="tag tag-blue">{{$category->question}} questions</span></td>
              </tr>
                @endforeach
              </tbody>
            </table>
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