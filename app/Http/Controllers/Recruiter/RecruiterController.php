<?php

namespace App\Http\Controllers\Recruiter;
use Validator;
use App\Mail\Invite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;
use DateInterval;

class RecruiterController extends Controller{

    public function getRecruiterId(){
        $recruiter_id = Session::get('userid');
        return $recruiter_id;

    }

    public function createTest(){
        $categories = DB::table('categories')->get();
        $tests  = DB::table('tests')->get();
        foreach ($tests as $test){
            $question_num = DB::table('assigns')->where('test_id',$test->id)->count(['id']);
            $test->question_num = $question_num;
        }

        return view('recruiter.create',['categories'=>$categories,'tests'=>$tests]);
    }
    public function getQuestionNum(Request $request){
        $id = $request->input('id');
        $counter = DB::table('questions')->where('category_id',$id)->count(['id']);

        echo $counter;
    }

    public function addTest(Request $request){
        $name = $request->input('name');
        $content = $request->input('content');
        $content_json = json_decode($content);
        $recruiter_id = $this->getRecruiterId();
        $data['name'] = $name;
        $data['recruiter_id'] = $recruiter_id;
        DB::table('tests')->insert($data);


        foreach ($content_json as $item){
            $questions = DB::table('questions')->where('category_id',$item->category)->get();
            $question_num = $item->number;
            $id_array = null;
            $id_array = array();
            $counter = 0;
            foreach ($questions as $question){
                $id_array[$counter] = $question->id;
                $counter ++;
            }
            echo json_encode($id_array);
            $final_array = null;
            $final_array = array();
            $counter = 0;
            while ($counter <= $question_num){
                $random_idx = random_int(0,count($id_array)-1);
                array_push($final_array,$id_array[$random_idx]);
                array_splice($id_array,$random_idx,1);
                $counter ++;
            }

            $test_id = DB::table('tests')->max('id');
            foreach ($final_array as $final){
                $dd['test_id'] = $test_id;
                $dd['question_id'] = $final;
                $dd['category_id'] = $item->category;
                DB::table('assigns')->insert($dd);
            }

        }

        return Redirect::route('recruiter.create_test');

    }

    public function getTest(Request $request){
        $id = $request->input('id');
        $categories = DB::select('SELECT category_id, COUNT(id) as question_num FROM assigns WHERE test_id="'.$id.'" GROUP BY category_id');

        foreach ($categories as $category){
            $row = DB::table('categories')->where('id',$category->category_id)->get();
            $category->name = $row[0]->name;
        }

        echo json_encode($categories);

    }

    public function removeTest(Request $request){
        $id = $request->input('id');
        DB::table('tests')->where('id',$id)->delete();
        DB::table('assigns')->where('test_id',$id)->delete();
        DB::table('invitations')->where('test_id',$id)->delete();

        echo 'success';

    }

    public function tests(){
        $recruiter_id = $this->getRecruiterId();
        $tests = DB::table('tests')->where('recruiter_id',$recruiter_id)->get();
        foreach ($tests as $test){
            $invite_count = DB::table('invitations')->where('test_id',$test->id)->count(['id']);
            $test->invite_count = $invite_count;
            $result_count = DB::table('invitations')->where('test_id',$test->id)->where('status','=',1)->count(['id']);
            $test->result_count = $result_count;

        }
        return view('recruiter.test',['tests'=>$tests]);
    }

    public function invite(Request $request){
        $id = $request->input('id');
        $invites = DB::table('invitations')->where('test_id',$id)->get();
        $cur_date = date('Y-m-d h:i:s', time());

        return view('recruiter.invite',['invites'=>$invites,'test_id'=>$id,'cur_date'=>$cur_date]);
    }

    public function sendmail($mail,$subject,$data){
//        $mail = "mingOK424@hotmail.com";
        $result = filter_var($mail,FILTER_VALIDATE_EMAIL);
        if($result){
            Mail::to($mail)->send(new Invite($subject,$data));
//            dd("mail sent");
        }else{
            return "invalid";
        }
    }

    public function sendInvite(Request $request){
        $test_id = $request->input('test_id');
        $validDays = $request->input('validDays');
        $startTime = new DateTime();
        $endTime = new DateTime();
        $endTime->add(new DateInterval('P'.$validDays.'D'));
        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');
        $email = trim($email);
        $email_array = explode(",",$email);
//        $this->sendmail('',$subject,$content);
        $data['test_id'] =$test_id;
        $data['recruiter_id'] = $this->getRecruiterId();
        $data['subject'] = $subject;
        $data['content'] = $content;
        $data['valid_days'] = $validDays;
        $data['start_time'] = $startTime;
        $data['end_time'] = $endTime;
        $token = Str::random(40);
        $data['token'] = $token;
        $data['status'] = 0;
        foreach ($email_array as $email_item){
            $cleaned_email = trim($email_item);
            if($cleaned_email!= ''){
                $message_data['email'] = $cleaned_email;
                $message_data['token'] = $token;
                $message_data['content'] = $content;

                $this->sendmail($cleaned_email,$subject,$message_data);
                $data['email'] = $cleaned_email;
                DB::table('invitations')->insert($data);
            }
        }

        return Redirect::route('recruiter.invite',['id'=>$test_id]);
    }

    public function resendInvite(Request $request){
        $id = $request->input('id');
        $row = DB::table('invitations')->where('id',$id)->get();
        $email = $row[0]->email;
        $subject = $row[0]->subject;
        $content = $row[0]->content;
        $token = Str::random(40);
        if(trim($email) != ''){
            $message_data['email'] = $email;
            $message_data['token'] = $token;
            $message_data['content'] = $content;

            $this->sendmail($email,$subject,$message_data);
            $data['token'] = $token;
            DB::table('invitations')->where('id',$id)->update($data);
        }

        echo 'success';
    }

    public function result(Request $request){
        $id = $request->input('id');

        $invitations = DB::table('invitations')->where('test_id',$id)->where('status','=',1)->get();

        return view('recruiter.result',['invites'=>$invitations,'test_id'=>$id]);

    }

}