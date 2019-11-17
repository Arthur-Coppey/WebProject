<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
    $article = App\Event::where('id', $id)->first();
    $label = $article->label;
    $event_date =$article->date;
    $event_comments = App\Comment::where('event_id', $id);

    @endphp
    @include('layouts/partials/_producthead', ['label', $label])
</head>

<body>

    <header>
        @include('layouts/partials/_sidebar')
        @include('layouts/partials/_navbar')
    </header>

    <main>
        <div
            class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">{{$article->price}}€</strong>
                <h3 class="mb-0">{{$article->label}}</h3>
                <div class="mb-1 text-muted">{{$article->date}}</div>
                <p class="card-text mb-auto">{{$article->description}}</p>


                <button onclick="location.href='../login';" type="submit" id="submitBut"
                    class="btn btn-primary btn-block">Connecte toi pour t'incrire à l'évènement</button>

                <button onclick="location.href='../login';" type="submit" id="submitBut"
                    class="btn btn-primary btn-block">Connecte toi pour commenter</button>

                <!--Photos-->
                <h2 class="contact-title">Photos de l'évènement</h2>
                @php
                $event_pictures = App\Picture::where('event_id','$id');
                @endphp

                @foreach ($event_pictures as $event_picture)
                @php
                $uri_picture = $event_picture->URI;
                @endphp
                <div class="extensions">
                    <div class="gallery-items">
                        <a href="{{$uri_picture}}" aria-label="nom produit" class="gallery-item-card-container">
                            <div class="gallery-item-card" style="@screen and (min-with: 768px){height: 140px;}">
                                <div class="cover">
                                    <div class="icon-cell">
                                        <img class="icon" src="{{$uri_picture}}" alt="picture post">
                                    </div>
                                </div>
                            </div>

                        </a>
                    </div>
                </div>
                @endforeach

                <!--comments-->
                <h2 class="contact-title">Commentaires</h2>
                @foreach ($event_comments as $event_comment)

                @php
                $user_first_name = App\User::were('id', $event_comment->user_id)->first()->first_name;
                $user_last_name = App\User::were('id', $event_comment->user_id)->first()->last_name;
                @endphp


                <div class="gallery-item-card-container-event">
                    <div class="gallery-item-card-event">

                        <div class="core-info-cell-event">

                            <div class="name-event">
                                <span>{{$user_first_name}} {{$user_last_name}} </span>

                            </div>

                            <div class="item-details-event">
                                <div class="description">{{$event_comment->content}}</div>
                            </div>

                        </div>

                    </div>
                    @if((App\User::were('id', \Auth::user()->id)->role() == "BDE-staff")||(App\User::were('id',
                    \Auth::user()->id)->role() == "CESI-staff"))
                    <!--pas de lien fais faire la fonction de supression-->
                    <button type="submit" id="submitBut" class="btn btn-primary btn-block">supprimer</button>
                    @endif
                </div>

                @endforeach

    </main>

    <footer>
        @include('layouts/partials/_footer')
    </footer>
</body>

</html>