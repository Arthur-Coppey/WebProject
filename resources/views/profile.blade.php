<title>BDE CESI Bordeaux : Profil</title>

@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
@if (Route::has('register'))

    @include('layouts/partials/_notconnected')

@endif
@else

<div class="profil-title-div">
    <h1 class="titre-profil">Profil</h1>
</div>

<div class="profil-title-div">
    <h2 class="titre-infos-profil">Prénom : </h2>
</div>
<div class="profil-title-div">
    <h2 class="titre-infos-profil">Nom : </h2>
</div>
<div class="profil-title-div">
    <h2 class="titre-infos-profil">Adresse Mail : </h2>
</div>
<div class="profil-title-div">
    <h2 class="titre-infos-profil">Centre : </h2>
</div>

<div class="log-out-div">
    <a class="log-out-text" href="{{ route('logout') }}"
        style="text-decoration: none; color: white;"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
</div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endguest
     
@endsection