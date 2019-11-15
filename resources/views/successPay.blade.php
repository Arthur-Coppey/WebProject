@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
@if (Route::has('register'))

   

@endif
{{-- connecter --}}
@else

     <h1>Votre commande a bien été prise en compte !</h1><br>
     {{-- DELETE LES ARTICLES --}}
     
     
     @php
          



     @endphp
@endguest


@endsection('main')
