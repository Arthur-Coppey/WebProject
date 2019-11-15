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

Route::get('/', function () {
    return view('main');
});

Route::get('event', function () {
    return view('event');
});

Route::get('shop', function () {
    return view('shop');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('mentionsLegales', function () {
    return view('mentionsLegales');
});


Route::get('aPropos', function () {
    return view('aPropos');
});

Route::get('register', function () {
    return view('auth/register');
});

Route::get('login', function () {
    return view('auth/login');
});

<<<<<<< HEAD
// Route::post('user', function () {
=======
Route::get('basket', function () {
    return view('basket');
});

Route::post('user', function () {
>>>>>>> 110c585d0914480ada833d282eb7f19c23d82eb9

//     App\User::create([
//       'first_name' => request('first_name'),
//       'last_name' => request('last_name'),
//       'email' => request('email'),
//       'password' => request('password'),
//       'center_id' => request('center'),
//       'role_id' => '1'
//   ]);

//   return redirect('/');
// });

Route::get('shop/{label}', function ($label) {
    return view('article')->with('label', $label);
});

Auth::routes();



Route::get('app', function () {
    return view('layouts/app');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', function () {
    return view('profile');
});