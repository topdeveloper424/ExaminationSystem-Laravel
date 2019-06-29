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

class UserController extends Controller{

    public function dashboardPage(){
        if(!Session::get('useremail')) return Redirect('/login');
        $id = Session::get('userid');
        $role = Session::get('role');
        if(intval($role) == 0){
            $email = Session::get('useremail');
            $invites = DB::table('invitations')->where('email',$email)->get();
            $pending = DB::table('invitations')->where('status','=',0)->count(['id']);
            $finished = DB::table('invitations')->where('status','=',1)->count(['id']);
            $avg = DB::table('invitations')->where('status','=',1)->avg('score');

            return view('candidate.dashboard',['invites'=>$invites,'pending'=>$pending,'finished'=>$finished,'avg'=>$avg]);
        }else if(intval($role) == 1){
            $tests = DB::table('tests')->where('recruiter_id',$id)->count(['id']);
            $candidates = DB::table('candidates')->count(['id']);
            $pending = DB::table('invitations')->where('status','=',0)->where('recruiter_id',$id)->count(['id']);
            $finished = DB::table('invitations')->where('status','=',1)->where('recruiter_id',$id)->count(['id']);
            $categories = DB::table('categories')->take(5)->get();
            foreach ($categories as $category){
                $cu_count = DB::table('questions')->where('category_id',$category->id)->count(['id']);
                $category->question = $cu_count;
            }
            $recent_tests = DB::table('tests')->where('recruiter_id',$id)->take(5)->get();
            foreach ($recent_tests as $recent_test){
                $counter = DB::table('assigns')->where('test_id',$recent_test->id)->count(['id']);
                $cate_counter = DB::table('assigns')->where('test_id',$recent_test->id)->count(['category_id']);
                $recent_test->number = $counter;
                $recent_test->category = $cate_counter;

            }
            return view('recruiter.dashboard',['test'=>$tests,'candidates'=>$candidates,'pending'=>$pending,'finished'=>$finished,'recents'=>$recent_tests,'categories'=>$categories]);
        }else{
            $recruiters = DB::table('recruiters')->count(['id']);
            $candidates = DB::table('candidates')->count(['id']);
            $categories_count = DB::table('categories')->count(['id']);
            $invitations = DB::table('invitations')->count(['id']);

            $categories = DB::table('categories')->take(5)->get();
            foreach ($categories as $category){
                $cu_count = DB::table('questions')->where('category_id',$category->id)->count(['id']);
                $category->question = $cu_count;
            }
            $recent_tests = DB::table('tests')->where('recruiter_id',$id)->take(5)->get();
            foreach ($recent_tests as $recent_test){
                $counter = DB::table('assigns')->where('test_id',$recent_test->id)->count(['id']);
                $cate_counter = DB::table('assigns')->where('test_id',$recent_test->id)->count(['category_id']);
                $recent_test->number = $counter;
                $recent_test->category = $cate_counter;

            }

            return view('admin.dashboard',['recruiters'=>$recruiters,'candidates'=>$candidates,'categories_count'=>$categories_count,'invitations'=>$invitations,'categories'=>$categories,'recents'=>$recent_tests]);
        }
    }

    public function loginPage(){
//        $data['username'] = "admin";
//        $data['email'] = "admin@admin.com";
//        $data['password'] = md5("admin");
//        DB::table('admin_users')->insert($data);
        if(Session::get('role')) return Redirect('/');
        return view('auth/login');
    }

    public function login(Request $request){
        $role= $request->input('role');
        $email= $request->input('email');
        $password= $request->input('password');
        $pass = md5($password);

        if (intval($role) == 2){
            $row = DB::table('admin_users')->where('email',$email)->where('password',$pass)->get();
            if(count($row) > 0){
                Session::put('userid', $row[0]->id);
                Session::put('username', $row[0]->username);
                Session::put('useremail', $email);
                Session::put('role', $role);
                Session::save();
                return Redirect::route('dashboard');
            }else{
                return view('auth/login',['error'=>'Email or Paasword is wrong!']);
            }

        }else if (intval($role) == 0){
            $row = DB::table('candidates')->where('email',$email)->where('password',$pass)->get();
            if(count($row) > 0){
                Session::put('userid', $row[0]->id);
                Session::put('username', $row[0]->username);
                Session::put('useremail', $email);
                Session::put('role', $role);
                Session::save();

                return Redirect::route('dashboard');
            }else{
                return view('auth/login',['error'=>'Email or Paasword is wrong!']);
            }

        }else{
            $row = DB::table('recruiters')->where('email',$email)->where('password',$pass)->get();
            if(count($row) > 0){
                Session::put('userid', $row[0]->id);
                Session::put('username', $row[0]->username);
                Session::put('useremail', $email);
                Session::put('role', $role);
                Session::save();
                return Redirect::route('dashboard');
            }else{
                return view('auth/login',['error'=>'Email or Paasword is wrong!']);
            }

        }
    }

    public function registerPage(){
        if(Session::get('role')) return Redirect('/');
        return view('auth/register');

    }

    public function register(Request $request){
        $name= $request->input('name');
        $email= $request->input('email');
        $role= $request->input('role');
        $password= $request->input('password');
        $confirm= $request->input('confirm');
        if($password != $confirm){
            return view('auth/register',['error'=>'confirm password doesn\'t match !']);
        }
        if($role == 0){
            $row = DB::table('candidates')->where('username',$name)->get();
            if(count($row) > 0){
                return view('auth/register',['error'=>'this username already exist !']);
            }
            $row = DB::table('candidates')->where('email',$email)->get();
            if(count($row) > 0){
                return view('auth/register',['error'=>'this user already exist !']);
            }
            $data['username'] = $name;
            $data['email'] = $email;
            $data['password'] = md5($password);
            DB::table('candidates')->insert($data);
        }else{
            $row = DB::table('recruiters')->where('username',$name)->get();
            if(count($row) > 0){
                return view('auth/register',['error'=>'this username already exist !']);
            }
            $row = DB::table('recruiters')->where('email',$email)->get();
            if(count($row) > 0){
                return view('auth/register',['error'=>'this user already exist !']);
            }
            $data['username'] = $name;
            $data['email'] = $email;
            $data['password'] = md5($password);
            DB::table('recruiters')->insert($data);
        }
        return view('auth/register',['success'=>'successfully registered !']);
    }

    public function logout(){
        Session::flush();
        return Redirect('/login');

    }


}