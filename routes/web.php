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

Route::get("/", function () {

    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/members', 'MembersController');

Route::resource('/contribution', 'ContributionController');

Route::get("/loan/give", 'LoansController@give');

Route::resource('/loan', 'LoansController');

Route::get("/members/{member}/delete", 'MembersController@destroy');

Route::resource('/payment', 'PaymentController');

Route::resource('/expenses', 'ExpensesController');

Route::resource('/income', 'IncomeController');

Route::resource('/extra', 'ExtraController');

Route::get("/late","PresidentController@late");

Route::get("/statistics", 'StatisticsController@test');

Route::get("/statistics2", 'StatisticsController@accountant');

Route::prefix("/admin")->group(function () {

    Route::get("/dashboard", 'AdminController@index');
    Route::get("/accountant", 'AdminController@accountant');
    Route::post("/accountant", 'AdminController@storeAccountant');
    Route::get("/president", 'AdminController@president');
    Route::post("/president", 'AdminController@storePresident');
    Route::get("/delete/{user}", 'AdminController@delete');
    Route::get("/admin", 'AdminController@admin');
    Route::post("/admin", 'AdminController@storeAdmin');
    Route::resource('/cooperative', 'CooperativeController');
});


Route::post('/amount', function () {
    request()->cooperative_id=auth()->user()->cooperative->id;
    \App\Amount::where('year', Date('y'))->first()->update(request()->all());
    session()->flash('success', 'Amount created successfully');
    return back();
});
