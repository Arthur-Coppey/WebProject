@extends('layouts.index')
@section('navbar')

@include('layouts/partials/_navbar')


@endsection('navbar')
@section('main')

@php
$ideas = App\Idea::all()->sortByDesc('created_at');
@endphp

<h2 class="ideas-list-title">Liste des Idées</h2>

@foreach ($ideas as $idea)
@php
$title = $idea->title;
$idea_id = $idea->id
@endphp

<div class="gallery-item-card">
    <div class="cover">
        <div class="core-info-cell single-idea">
            <div class="idea-title-div">
                <h2 class="desc-idee">Titre : {{$idea->title}}</h2>
            </div>
            <div class="idea-title-div">
                <h2 class="desc-idee">Description : {{$idea->description}}</h2>
            </div>
        </div>
    </div>
    @if (App\IdeaLike::all()->where('idea_id',$idea_id)->where('user_id', Auth::user())->find(11) == false)
    <form action="{{'deleteIdeaLike'}}" method="POST">
        @csrf
        <input type="text" name="idea_id"  value={{$idea_id}} hidden>
        <button type="submit" id="submitBut">oui</button>
    </form>  
    @else
    <form action="{{'addIdeaLike'}}" method="POST">
        @csrf
        <input type="text" name="idea_id"  value={{$idea_id}} hidden>
        <button type="submit" id="submitBut"><i class="far fa-thumbs-up"></i></button>
    </form>   
    @endif
    
</div>
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
    <center>
        <h2 class="add-title">Ajouter une Idée</h2>
        <div class="add-idea">
            <div class="add-idea-box">
                <table>
                    <tbody>
                        <tr>
                            <td class="input-desc">
                                <a>
                                    Nom :
                                </a>
                            </td>
                            <td class="input-form">
                                <input type="text" name="titleIdeaAdd">
                            </td>
                        </tr>
                        <tr>
                            <td class="input-desc">
                                <a>
                                    Description :
                                </a>
                            </td>
                            <td class="input-form">
                                <input type="text" name="descriptionIdeaAdd">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button class="add-text-butt">
                    <a class="add-text" style="text-decoration: none; color: white;">
                        Ajouter l'idée
                    </a>
                </button>
            </div>
        </div>
    </center>
</form>

@if ((App\User::where('id', (\Auth::user()->id))->first()->role_id)==2 | (App\User::where('id',
(\Auth::user()->id))->first()->role_id)==3)

<form method="POST" action="{{ 'suppIdeas' }}">
    @csrf
    <center>
        <h2 class="del-title">Supprimer une Idée</h2>
        <div class="del-idea">
            <div class="del-idea-box">
                <table>
                    <tbody>
                        <tr>
                            <td class="input-desc">
                                <a>
                                    Nom :
                                </a>
                            </td>
                            <td class="input-form">
                                <div>
                                    <input type="text" name="titleIdeaAdd">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="del-text-butt">
                    <a class="del-text" style="text-decoration: none; color: white;">
                        Supprimer une Idée
                    </a>
                </button>
            </div>
        </div>
    </center>
</form>
@endif
@endguest




@endsection('main')