<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',"UserController@dashboardPage")->name('dashboard');
Route::post('/login',"UserController@login");
Route::get('/login',"UserController@loginPage")->name('login');
Route::post('/register',"UserController@register");
Route::get('/register',"UserController@registerPage")->name('register');

Route::get('/logout',"UserController@logout")->name('logout');

Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'CheckAdmin'],function ($router)
{
    $router->get('categories', 'AdminController@categories')->name('admin.categories');
    $router->post('add-category', 'AdminController@addCategory')->name('admin.add_category');
    $router->get('get-category', 'AdminController@getCategory')->name('admin.get_category');
    $router->post('update-category', 'AdminController@updateCategory')->name('admin.update_category');
    $router->post('remove-category', 'AdminController@removeCategory')->name('admin.remove_category');

    $router->get('questions', 'AdminController@questions')->name('admin.questions');
    $router->post('add-question', 'AdminController@addQuestion')->name('admin.add_question');
    $router->get('get-question', 'AdminController@getQuestion')->name('admin.get_question');
    $router->post('update-question', 'AdminController@updateQuestion')->name('admin.update_question');
    $router->post('remove-question', 'AdminController@removeQuestion')->name('admin.remove_question');

    $router->get('displaylist', 'AdminController@displaylist')->name('admin.displaylist');
    $router->get('invite', 'AdminController@invite')->name('admin.invite');
    $router->get('result', 'AdminController@result')->name('admin.result');

});
Route::group(['prefix' => 'recruiter','namespace' => 'Recruiter','middleware' => 'CheckRecruiter'],function ($router)
{
    $router->get('create-test', 'RecruiterController@createTest')->name('recruiter.create_test');
    $router->get('get-question-num', 'RecruiterController@getQuestionNum')->name('recruiter.get_question_num');
    $router->post('add-test', 'RecruiterController@addTest')->name('recruiter.add_test');
    $router->get('get-test', 'RecruiterController@getTest')->name('recruiter.get_test');

    $router->post('remove-test', 'RecruiterController@removeTest')->name('recruiter.remove_test');

    $router->get('tests', 'RecruiterController@tests')->name('recruiter.tests');

    $router->get('invite', 'RecruiterController@invite')->name('recruiter.invite');
    $router->post('send-invite', 'RecruiterController@sendInvite')->name('recruiter.send_invite');
    $router->post('resend-invite', 'RecruiterController@resendInvite')->name('recruiter.resend_invite');

    $router->get('result', 'RecruiterController@result')->name('recruiter.result');


});

Route::get('/verify', 'TestController@verifyLogin');
Route::get('/start-test', 'TestController@startTest')->name('startTest');
Route::get('/take-test', 'TestController@takeTest')->name('takeTest');
Route::get('/next-test', 'TestController@nextTest')->name('nextTest');




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});