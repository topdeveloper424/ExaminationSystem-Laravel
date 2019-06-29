<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use DateTime;

class AdminController extends Controller{

    public function categories(){
        $categories = DB::table('categories')->paginate(10);
        return view('admin/category',['categories'=>$categories]);
    }

    public function addCategory(Request $request){
        $name = $request->input('name');
        $description  = $request->input('description');

        $data['name'] = $name;
        $data['description'] = $description;

        DB::table('categories')->insert($data);

        return Redirect::route('admin.categories');
    }

    public function getCategory(Request $request){
        $id = $request->input('id');

        $row = DB::table('categories')->where('id',$id)->get();

        return json_encode($row[0]);
    }

    public function updateCategory(Request $request){
        $cur_id = $request->input('cur_id');
        $name = $request->input('name');
        $description  = $request->input('description');

        $data['name'] = $name;
        $data['description'] = $description;

        DB::table('categories')->where('id',$cur_id)->update($data);

        return Redirect::route('admin.categories');
    }

    public function removeCategory(Request $request){
        $id = $request->input('id');

        DB::table('questions')->where('category_id',$id)->delete();
        DB::table('categories')->where('id',$id)->delete();

        echo 'success';
    }

    public function questions(Request $request){
        $questions = null;
        $category_id = null;
        if ($request->has('category')){
            $category_id = $request->input('category');
            $questions = DB::table('questions')->where('category_id',$category_id)->paginate(10);
        }else{
            $questions = DB::table('questions')->paginate(10);
        }

        foreach ($questions as $question){
            $row = DB::table('categories')->where('id',$question->category_id)->get();
            $question->category = $row[0]->name;
        }

        $categories = DB::table('categories')->get();

        return view('admin/question',['questions'=>$questions,'categories'=>$categories,'cur_id'=>$category_id]);
    }

    public function addQuestion(Request $request){
        $category = $request->input('category');
        $question = $request->input('question');
        $answer1 = $request->input('answer1');
        $answer2 = $request->input('answer2');
        $answer3 = $request->input('answer3');
        $answer4 = $request->input('answer4');
        $correct = $request->input('correct');
        echo($category);
        exit;

        $data['question'] = $question;
        $data['category_id'] = $category;
        $data['res1'] = $answer1;
        $data['res2'] = $answer2;
        $data['res3'] = $answer3;
        $data['res4'] = $answer4;
        $data['correct'] = $correct;

        DB::table('questions')->insert($data);

        return Redirect::route('admin.questions',['category'=>$category]);
    }

    public function getQuestion(Request $request){
        $id = $request->input('id');
        $row = DB::table('questions')->where('id',$id)->get();

        echo json_encode($row[0]);
    }

    public function updateQuestion(Request $request){
        $id = $request->input('cur_id');
        $category = $request->input('category');
        $question = $request->input('question');
        $answer1 = $request->input('answer1');
        $answer2 = $request->input('answer2');
        $answer3 = $request->input('answer3');
        $answer4 = $request->input('answer4');
        $correct = $request->input('correct');

        $data['question'] = $question;
        $data['category_id'] = $category;
        $data['res1'] = $answer1;
        $data['res2'] = $answer2;
        $data['res3'] = $answer3;
        $data['res4'] = $answer4;
        $data['correct'] = $correct;
        DB::table('questions')->where('id',$id)->update($data);

        return Redirect::route('admin.questions');

    }

    public function removeQuestion(Request $request){
        $id = $request->input('id');
        DB::table('questions')->where('id',$id)->delete();

        echo 'success';
    }

    public function displaylist(Request $request){
        $tests = DB::table('tests')->get();
        foreach ($tests as $test){
            $invite_count = DB::table('invitations')->where('test_id',$test->id)->count(['id']);
            $test->invite_count = $invite_count;
            $result_count = DB::table('invitations')->where('test_id',$test->id)->where('status','=',1)->count(['id']);
            $test->result_count = $result_count;

        }
        return view('admin.test',['tests'=>$tests]);
    }
    public function invite(Request $request){
        $id = $request->input('id');
        $invites = DB::table('invitations')->where('test_id',$id)->get();

        return view('admin.invite',['invites'=>$invites,'test_id'=>$id]);
    }
    public function result(Request $request){
        $id = $request->input('id');

        $invitations = DB::table('invitations')->where('test_id',$id)->where('status','=',1)->get();

        return view('admin.result',['invites'=>$invitations,'test_id'=>$id]);

    }

}