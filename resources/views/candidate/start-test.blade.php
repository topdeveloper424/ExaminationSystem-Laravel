@extends('layout/visitor-layout')
@section('title')
    Test
@stop

@section('content')
<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Test</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Start Test</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Welcome!</h3>
                </div>
                <div class="card-body">
                    <div class="jumbotron ">
                        <div class="container">
                            <h1 class="display-3">Please take a test</h1>
                            <p class="lead m-0">This test includes {{$assigns}} questions. One question has 1 minute.</p>
                            <br>
                            <a href="{{route('takeTest')}}">
                                <button class="btn btn-secondary">Start</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop