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

<div class="log-out-div">
    <a class="dropdown-item log-out-text" href="{{ route('logout') }}"
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