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
    return view('shop', [
        'by' => request('by'),
        'order' => request('order'),
        'search' => request('search')
    ]);
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

    $id = Auth::user()->id;
    App\Basket::create([
      'amount' => request('amount'),
      'user_id' => $id,
      'product_id' => request('product_id')
    ]);

    return redirect('/shop');
});

Route::post('/event/eventSub', function () {
    $id = Auth::user()->id;
    App\Participant::create([
        'user_id' => $id,
        'event_id' => request('event_id')
    ]);
    return redirect('/event');
});

Route::post('/event/eventUnsub', function () {
    $id = Auth::user()->id;
    $participant = App\Participant::where('user_id', $id)->where('event_id', request('event_id'))->delete();
    return redirect('/event');
});

Route::post('/downloadParticipantList', function (){
    $id = Auth::user()->id;
    $participants = App\Participant::all()->where('event_id', request('event_id'));
    $filename = "participantListe.csv";
    foreach ($participants as $participant){
        $handle = fopen($filename, 'w+');
        $user_id = $participant->user_id;
        $first_name = App\User::where('id', $user_id)->first()->first_name;
        $last_name = App\User::where('id', $user_id)->first()->last_name;
        $participant_user = array($first_name, ';', $last_name);
        fputcsv($handle,  [
            $first_name
            .';'.
            $last_name
            .';'
        ]);
        fclose($handle);
    }
    $headers = array(
        'Content-Type' => 'text/csv',
    );
    return Response::download($filename, 'participantListe.csv', $headers);
});

Route::get('shop/{id}', function ($id) {
    return view('product')->with('id', $id);
});

Route::get('/event/past', function () {
    return view('event_past')->with('id', 'Evènements Passés');
});

Route::get('event/{id}', function ($id) {
    return view('article')->with('id', $id);
});

Auth::routes();

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

Route::post('/addOrder', function () {
    $currentId = Auth::user()->id;
    $nbrFor = (App\Basket::where('user_id', $currentId)->get());

    App\Order::create([
        'date' => date('Y-m-d H:i:s'),
        'price' => request('price'),
        'user_id' =>  $currentId,
    ]);

    for($i = 0; $i < count($nbrFor); $i++){
        $amount = (App\Basket::where('user_id', $currentId)->get('amount'));
        $amountTab = $amount[$i];
        $product_id = (App\Basket::where('user_id', $currentId)->get('product_id'));
        $product_idTab = $product_id[$i];
        $order_id = (App\Order::where('user_id', $currentId)->get('id'));
        $order_idTab = $order_id[$i];

        App\OrderContent::create([
            'amount'=>$amountTab['amount'],
            'product_id'=>$product_idTab['product_id'],
            'order_id'=> $order_idTab['id'],
        ]);
    }

    App\Basket::where('user_id', $currentId)->delete();

    return redirect('/send-mail');
});

Route::post('/suppProduct', function () {
    App\Product::where('label' ,request('nameProductSupp'))->delete();

    return redirect('/shop');
});

Route::post('/addProduct', function () {

    App\Product::create([
        'label' => request('labelProductAdd'),
        'description' => request('descriptionProductAdd'),
        'price' => request('priceProductAdd'),
        'center_id' => request('centerProductAdd')
    ]);

    return redirect('/shop');
});

Route::get('boiteIdees', function () {
    return view('boiteIdees');
});

Route::post('/addIdeas', function () {
    $currentId = Auth::user()->id;

    App\Idea::create([
        'title' => request('titleIdeaAdd'),
        'description' => request('descriptionIdeaAdd'),
        'user_id' => $currentId,
    ]);

    return redirect('/boiteIdees');
});

Route::post('/suppIdeas', function () {
    App\Idea::where('title' , request('titleIdeaAdd'))->delete();

    return redirect('/boiteIdees');
});

Route::post('/deleteBasketItem', function () {
    App\Basket::where('user_id', Auth::user()->id)->where('product_id', request('id_to_delete'))->delete();
    return redirect('/panier');
});

Route::post('/addComment', function () {
    App\Comment::create([
        'content'=>request('content'),
        'user_id'=> Auth::user()->id,
        'event_id'=> request('event_id')
    ]);
    return redirect('/event');
});

Route::get('reportEvent', 'SendReport@mailsend');

Route::post('/commentDelete', function () {
    App\Comment::where('id', request('comment_id'))->first()->delete();
    return redirect('/event');
});

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');

Route::get('imageUpload', function () {
    return view('imageUpload');
});