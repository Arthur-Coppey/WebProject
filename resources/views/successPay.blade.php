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


    {{-- @php
        $i=0;
        
        $currentID = \Auth::user()->id;
        $nbrFor = (App\Basket::where('user_id', $currentID)->get());
        $addPay = 0;

        for($i=0;$i< count($nbrFor);$i++){
            $addPay = $addPay + $totalToPay[$i];
        }




        while($i<count($nbrFor)){
            $i++;
            App\Order::create([
            'date' => date('Y-m-d H:i:s'),
            'price' => '30',
            'user_id' => $currentID,
            
            
        ]);
        }



    @endphp --}}



@endguest


@endsection('main')
