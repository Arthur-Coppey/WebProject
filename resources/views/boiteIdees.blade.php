@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
{{-- ¨Pas co --}}
@if (Route::has('register'))

    @include('layouts/partials/_notconnected')

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

@endguest
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


@endsection('main')
