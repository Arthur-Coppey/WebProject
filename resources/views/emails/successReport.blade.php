<title>BDE CESI Bordeaux : Paiement réussi</title>

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

    <h1>Le signalement a bien été envoyé !</h1>





@endguest


@endsection('main')
