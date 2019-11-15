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

// Route::post('user', function () {
Route::get('basket', function () {
    return view('basket');
});

Route::get('event_creater', function () {
    return view('event_creater');
});

Route::post('create-event', function () {
    $ocurrences = request('ocurrences');
    $date = request('date');
    $frequency = request('frequency');
    for ($i=0; $i < $ocurrences; $i++) { 
        App\Event::create([
            'label' => request('label'),
            'location' => request('location'),
            'date' => $date,
            'price' => request('price'),
            'description' => request('description'),
            'meta_event_id' => '1'
        ]); 
        $date = date('Y-m-d', strtotime($date. ' + '.$frequency.' days'));
    }
   return redirect('/event');
});


Route::post('/shop/addBasket', function () {

      $id = \Auth::user()->id;
    App\Basket::create([
      'amount' => request('amount'),
      'user_id' => $id,
      'product_id' => request('product_id')
  ]);

  return redirect('/shop');
});


Route::get('shop/{id}', function ($id) {
    return view('product')->with('id', $id);
});

Route::get('event/{id}', function ($id) {
    return view('article')->with('id', $id);
});

Auth::routes();

// Route::get('panier', function ($user_id, $product_id) {
//     return view('panier');
// });

Route::get('panier', function () {
    return view('panier');
});

Route::get('cgv', function () {
    return view('cgv');
});

Route::get('app', function () {
    return view('layouts/app');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', function () {
    return view('profile');
});

Route::get('successPay', function () {
    return view('successPay');
});

Route::get('send-mail', 'SendMail@mailsend');
//SendMail = controller