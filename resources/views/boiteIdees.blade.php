@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@php
    $idea = App\Idea::all()->sortByDesc('created_at');
@endphp
@foreach ($idea as $idea)
    @php
        $title = $idea->title;
    @endphp

    {{-- <a href="../shop/{{$idea->id}}" aria-label="nom produit" class="gallery-item-card-container"> --}}
        <div class="gallery-item-card">
            <div class="cover">
                {{-- <div class="icon-cell">
                    <img class="icon" src="img/boof.png" alt="label bdd">
                </div> --}}
                <div class="core-info-cell">
                    <div class="title">
                        <span>{{$idea->title}}</span>
                    </div>
                    <div class="core-info-second-row">
                        <div class="description">
                            <span>{{$idea->description}}</span>      
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </a>
@endforeach

@guest 
{{-- ¨Pas co --}}
@if (Route::has('register'))

<span class="notlogedcontainer">
        <div class="notlogedtext">
            Malheureusement, il semblerait que vous ne soyez pas connectés !<br>
            Veuillez vous connecter ou vous inscrire à l'aide des liens ci dessous !
        </div>
        <div>
            <table class="redirectlinks">
                <tr>
                    <td class="redirectlinks">
                        <button type="button" class="headerRight btn btn-primary btn-sm" id="btnGauche">
                            <a href="/register" style="text-decoration: none">
                                <p class="loginRegisterText">Inscription</p>
                            </a>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="ouvrir headerRight btn btn-secondary btn-sm" id="btnDroit">
                            <a href="/login" class="bouton-test" style="text-decoration: none">
                                <p class="loginRegisterText">Connexion</p>
                            </a>
                        </button>       
                    </td>
                </tr>
            </table>
        </div>
    </span>

@endif
{{-- connecter --}}
@else
<form method="POST" action="{{ 'addIdeas' }}">
        @csrf
        <div class="payer">
            <div class="payer-box">
                <div>
                    <input type="text" name="titleIdeaAdd" placeholder="Nom de l'idée" >
                </div>
                <div>
                    <input type="text" name="descriptionIdeaAdd" placeholder="Description de l'idée" >
                <div>
                <button>
                    <a class="payer-text" style="text-decoration: none; color: white;">
                        Ajouter l'idée
                    </a>
                </button>
                </div>
            </div>
        </div>
</form>
@if ((App\User::where('id', (\Auth::user()->id))->first()->role_id)==2 | (App\User::where('id', (\Auth::user()->id))->first()->role_id)==3)

<form method="POST" action="{{ 'suppIdeas' }}">
        @csrf
        <div class="payer">
            <div class="payer-box">
                <div>
                    <input type="text" name="titleIdeaAdd" placeholder="Nom de l'idée à supp" >
                </div>
                <div>
                    <button>
                        <a class="payer-text" style="text-decoration: none; color: white;">
                            Supprimer l'idée
                        </a>
                    </button>
                </div>
            </div>
        </div>
</form>
@endif
@endguest




@endsection('main')
