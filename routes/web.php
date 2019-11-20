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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Auth::routes();
// Authentication Routes...
Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::name('logout')->post('logout', 'Auth\LoginController@logout');

//Route::get('/home', 'HomeController@index')->name('home');

// --- NAPA ---
/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Front')->group(function () {

   Route::name('home')->get('/', 'FrontController@index');	
   Route::name('about')->get('/about', 'FrontController@about');	
   Route::name('courses')->get('/courses', 'FrontController@courses');  
   Route::name('contacts')->get('/contacts', 'FrontController@contacts');        
   //...   

});

/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/
Route::prefix('')->namespace('Back')->group(function () {

   //Route::middleware('admin')->group(function () {
   Route::middleware('auth')->group(function () {	
      //Route::name('dashboard')->get('/dashboard', 'AdminController@index')->middleware('admin');
	    Route::name('dashboard')->get('/dashboard', 'AdminController@index');
	    Route::resource('students', 'AdminController');
      //Route::name('update')->put('update/{card}', 'AdminController@update');	  
   });

});