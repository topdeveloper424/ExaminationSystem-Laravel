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
                    <h3 class="card-title">Select Correct Answer !</h3>
                </div>
                <div class="card-body">
                    <div class="jumbotron ">
                        <div class="container">
                            <div class="alert alert-danger" role="alert" id="timout" style="display: none">
                                Timeout ! Please try next question.
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <h1 class="display-3">{{$question->question}}</h1>
                                </div>
                                <div class="col-md-3">
                                    <span class="tag tag-lime" id="remaining">remaining time : </span>
                                </div>
                            </div>
                            <form action="{{route('nextTest')}}" method="get">
                                <div class="row">
                                    <input type="hidden" name="cur_question_id" value="{{$question->id}}">
                                    <input type="hidden" name="active" id="active" value="1">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="correct" id="editRadio1" value="1">
                                                    <span class="custom-control-label">{{$question->res1}}</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="correct" id="editRadio2" value="2">
                                                    <span class="custom-control-label">{{$question->res2}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="correct" id="editRadio3" value="3">
                                                    <span class="custom-control-label">{{$question->res3}}</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" name="correct" id="editRadio4" value="4">
                                                    <span class="custom-control-label">{{$question->res4}}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-secondary">next</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        var remain = 60;
        function timeCounter(){
            remain = remain - 1;
            if(remain == 0){
                $("#active").val(0);
                $("#remaining").hide();
                $("#timout").show();

            }else{
                $("#remaining").html("remaining time : " + remain + " sec");
            }
        }

        $(document).ready(function () {
            $("#remaining").html("remaining time : 60 sec");
            $("#active").val(1);
            setInterval(timeCounter, 1000);

        });

    </script>
@stop