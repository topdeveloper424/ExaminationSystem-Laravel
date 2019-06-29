@extends('layout/visitor-layout')
@section('title')
    Test Result
@stop

@section('content')
<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Test Result </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Result</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thank you for your test!</h3>
                </div>
                <div class="card-body">
                    <div class="jumbotron ">
                        <div class="container">
                            <h1 class="display-3">Here are your score :
                                @if($invite->score > 4)
                                    <span class="badge badge-danger">{{$invite->score}}</span>
                                @elseif($invite->score > 3)
                                    <span class="badge badge-info">{{$invite->score}}</span>
                                @elseif($invite->score > 2)
                                    <span class="badge badge-warning">{{$invite->score}}</span>
                                @else
                                    <span class="badge badge-default">{{$invite->score}}</span>
                                @endif
                            </h1>

                            <br>
                            <a href="{{route('login')}}">
                                <button class="btn btn-secondary">Finish</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop