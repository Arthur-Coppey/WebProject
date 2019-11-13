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

Route::get('sign-in', function () {
    return view('sign-in');
});

Route::get('log-in', function () {
    return view('log-in');
});

Route::post('user', function () {
    // $this->validate(request(), [
    //     'first_name'=>'required',
    //     'last_name' =>'required',
    //     'email' => 'required|email',
    //     'center' => 'required',
    //     'password' => 'required',
    //     'password_confirm' =>'required|same:password'
    // ]);

    App\User::create([
      'first_name' => request('first_name'),
      'last_name' => request('last_name'),
      'email' => request('email'),
      'password' => request('password'),
      'center_id' => request('center'),
      'role_id' => '1'
  ]);

  return redirect('/');
});
