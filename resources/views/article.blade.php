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
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">{{$article->price}}€</strong>
          <h3 class="mb-0">{{$article->label}}</h3>
          <div class="mb-1 text-muted">{{$article->date}}</div>
          <p class="card-text mb-auto">{{$article->description}}</p>
          
          @guest 
          @if (Route::has('register'))
            <button onclick="location.href='../login';" type="submit" id="submitBut" class="btn btn-primary btn-block">Connecte toi pour t'incrire à l'évènement</button>

            {{-- connecté --}}

          @else

            @php
              $user_id = \Auth::user()->id;
              $event_id=App\Event::where('id', $id)->first()->id;
            @endphp    


            @if (strtotime($event_date) < strtotime(date('Y-m-d')))
            @else   
              @if ( App\Participant::where('event_id', $event_id)->first() == null)
                <form method="POST" action="{{ 'eventSub' }}">
                  @csrf
                  <input type="text" name="event_id" value = {{$event_id}} hidden>
                  <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je m'inscrit</button>
                </from>
              @else
                <form method="post" action="{{ 'eventUnsub' }}">
                  @csrf
                  <input type="text" name="event_id" value = {{$event_id}} hidden>
                  <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je me désinscris</button>
                </from>
                <!--fonction eventLike coder ?-->
                <form method="POST" action="{{ 'eventLike' }}">
                  @csrf
                  <input type="text" name="event_id" value = {{$event_id}} hidden>
                  <button type="submit" id="submitBut" class="btn btn-primary btn-block">like</button>
                </from>
            @endif
            <button onclick="location.href='/downloadParticipantList';" class="btn btn-primary btn-block" name="event_id" value = {{$event_id}}>Télécharger la liste des participants</button>
          @endif




        @endguest

          

      @if (strtotime($event_date) < strtotime(date('Y-m-d')))

        <!--to post comments (manque l'upload photo)-->

        @guest 

          @if (Route::has('register'))
            <button onclick="location.href='../login';" type="submit" id="submitBut" class="btn btn-primary btn-block">Connecte toi pour commenter</button>
          @endif

          {{-- connecté --}}

          @else
            <form method="POST" action="{{ 'addComment' }}">
              @csrf

              <!-- il faudrat peut être changer value,je sais pas si j'utilise la bonne fonction addComment-->
              <input type="text" size ="1000" style= "height: 100px" name="amount" placeholder="commentaire...">
              <button type="submit" id="submitBut" class="btn btn-primary btn-block">publier</button>
              <input type="text" name="product_id" value = {{$id}} hidden>
            </form>
          @endif
        @endguest

        <!--pictures posted-->
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
                <div class="gallery-item-card" style = "@screen and (min-with: 768px){height: 140px;}">
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
          @if((App\User::were('id', \Auth::user()->id)->role() == "BDE-staff")||(App\User::were('id', \Auth::user()->id)->role() == "CESI-staff"))
            <!--pas de lien fais faire la fonction de supression-->
            <button type="submit" id="submitBut" class="btn btn-primary btn-block">supprimer</button>
          @endif
        </div>

        @endforeach

      @endif
    </main>

    <footer>
      @include('layouts/partials/_footer')
    </footer>
  </body>
</html>


