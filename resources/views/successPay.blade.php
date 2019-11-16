@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
@if (Route::has('register'))

    @include('layouts/partials/_notconnected')

@endif
{{-- connecter --}}
@else

    <h1>Votre commande à bien était passé</h1>

    @php
        $currentId = \Auth::user()->id;
        $nbrFor = (App\Basket::where('user_id', $currentId)->get());
        $i=0;
    @endphp

{{-- $amount = (App\Basket::where('user_id', $currentId)->get('amount'));        
$amountTab = $amount[$i];
$product_id = (App\Basket::where('user_id', $currentId)->get('product_id'));
$product_idTab = $product_id[$i];
 --}}
{{-- 
    @foreach($nbrFor as $value)
    @php
        $i=$i++;
        $product_id = $value->product_id;
        $product_amount = $value->amount;

        $order_id = (App\Order::where('user_id', $currentId)->get('id'));
        $order_idTab = $order_id[$i];

        App\OrderContent::create([
            'amount' => $product_amount,
            'product_id' => $product_id,
            'order_id' => $order_idTab['id'],
        ]);

    @endphp

    @endforeach --}}

    



@endguest


@endsection('main')
