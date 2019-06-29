<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;

class TestController extends Controller{
    public function verifyLogin(Request $request){
        try{
            $email = $request->input('email');
            $token = $request->input('token');
            $invitation = DB::table('invitations')->where('email',$email)->where('token',$token)->get();
            $invite = $invitation[0];
            if(count($invitation) > 0){
                if($invite->status == 0){
                    $end_time = $invite->end_time;
                    $end_date = strtotime($end_time);
                    $cur_date = time();

                    if ($cur_date < $end_date){
                        Session::put('invite', $invite->id);
                        Session::put('test_id', $invite->test_id);
                        Session::save();

                        return Redirect::route('startTest');

                    }else{
                        return view('candidate.expired');
                    }

                }else{
                    return view('candidate.expired');
                }
            }else{
                return view('candidate.expired');

            }

        }catch (\Exception $exception){
            echo 'access denied!';
        }
    }

    public function startTest(){
        if(!Session::get('invite')) return Redirect('/login');
        $id = Session::get('invite');

        $invite = DB::table('invitations')->where('id',$id)->get();
        $assigns = DB::table('assigns')->where('test_id',$invite[0]->test_id)->count(['id']);

        return view('candidate.start-test',['invite'=>$invite[0],'assigns'=>$assigns]);

    }

    public function takeTest(){
        if(!Session::get('invite')) return Redirect('/login');
        $id = Session::get('test_id');
        $assigns = DB::table('assigns')->where('test_id',$id)->get();
        $question = DB::table('questions')->where('id',$assigns[0]->question_id)->get();
        Session::put('cur_question', 0);
        Session::save();

        $cur_time = date('Y-m-d H:i:s');
        $invite_id = Session::get('invite');
        $data['take_time'] = $cur_time;
        $data['status'] = 1;
        DB::table('invitations')->where('id',$invite_id)->update($data);

        return view('candidate.testing',['question'=>$question[0]]);

    }
    public function checkIsFinished(){
        $cur_question = Session::get('cur_question');
        $cur_question += 1;
        $test_id = Session::get('test_id');
        $assigns = DB::table('assigns')->where('test_id',$test_id)->get();
        $assigns_count = count($assigns)-1;
        if($cur_question > $assigns_count){
            return true;
        }
        return false;

    }
    public function nextTest(Request $request){
        if(!Session::get('invite')) return Redirect('/login');
        if ($this->checkIsFinished()){
            $invite_id = Session::get('invite');
            $invite = DB::table('invitations')->where('id',$invite_id)->get();
            Session::flush();
            return view('candidate.test-result',['invite'=>$invite[0]]);
        }
        $cur_question_id = $request->input('cur_question_id');
        $active = $request->input('active');
        $score = 0;
        if($active == 1){
            $question = DB::table('questions')->where('id',$cur_question_id)->get();
            if ($request->has('correct')){
                $correct = $request->input('correct');
                if ($correct == $question[0]->correct){
                    $score = 1;
                }else{
                    $score = -0.03;
                }
            }else{
                $score = 0;
            }
        }
        $id = Session::get('invite');
        $invite = DB::table('invitations')->where('id',$id)->get();

        $cur_score = $invite[0]->score;
        if (!$cur_score){
            $cur_score = 0;
        }
        if($score < 0){
            if($cur_score > 0.03){
                $cur_score += $score;
            }
        }else{
            $cur_score += $score;
        }

        $data['score'] = $cur_score;
        DB::table('invitations')->where('id',$id)->update($data);

        $cur_question = Session::get('cur_question');
        $cur_question += 1;
        Session::put('cur_question', $cur_question);
        Session::save();
        $test_id = Session::get('test_id');
        $assigns = DB::table('assigns')->where('test_id',$test_id)->get();
        $assigns_count = count($assigns)-1;
        if($cur_question > $assigns_count){
            $invite = DB::table('invitations')->where('id',$id)->get();
            Session::flush();
            return view('candidate.test-result',['invite'=>$invite[0]]);
        }else{
            $question = DB::table('questions')->where('id',$assigns[$cur_question]->question_id)->get();

            return view('candidate.testing',['question'=>$question[0]]);
        }
    }


}