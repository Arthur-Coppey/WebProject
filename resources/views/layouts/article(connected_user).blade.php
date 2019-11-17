<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @php
  $article = App\Event::where('id', $id)->first();
  $label = $article->label;
  $event_date = $article->date;
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

        @if (strtotime($event_date) > strtotime(date('Y-m-d'))) 
          @php
          $user_id = \Auth::user()->id;
          $event_id=App\Event::where('id', $id)->first()->id;
          @endphp

          @if ( App\Participant::where('event_id', $event_id)->first() == null)
          <form method="POST" action="{{ 'eventSub' }}">
            @csrf
            <input type="text" name="event_id" value={{$event_id}} hidden>
            <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je m'inscrit</button>
            @else
            <form method="post" action="{{ 'eventUnsub' }}">
              @csrf
              <input type="text" name="event_id" value={{$event_id}} hidden>
              <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je me désinscris</button>
              @endif
              <!--fonction eventLike coder ?-->
              <form method="POST" action="{{ 'eventLike' }}">
                @csrf
                <input type="text" name="event_id" value={{$event_id}} hidden>
                <button type="submit" id="submitBut" class="btn btn-primary btn-block">like</button>
                </from>

                <button onclick="location.href='/downloadParticipantList';" class="btn btn-primary btn-block"
                  name="event_id" value={{$event_id}}>Télécharger la liste des participants</button>

                @endif

      </div>
      <div class="col-auto d-none d-lg-block">
        <img src="/img/boof.png" alt="{{$article->label}}">
      </div>

      
      <h2 class="contact-title">Commentaires</h2>
      @foreach ($event_comments as $event_comment)

      @php
      $user_first_name = App\User::where('id', $event_comment->user_id)->first()->first_name;
      $user_last_name = App\User::where('id', $event_comment->user_id)->first()->last_name;
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
        @if((App\User::where('id', \Auth::user()->id)->role() == "BDE-staff")||(App\User::where('id',
        \Auth::user()->id)->role() == "CESI-staff"))
        <!--pas de lien fais faire la fonction de supression-->
        <button type="submit" id="submitBut" class="btn btn-primary btn-block">supprimer</button>
        @endif
      </div>

      @endforeach
      <form method="POST" action="{{ 'addComment' }}">
                @csrf
                <!-- il faudrat peut être changer value,je sais pas si j'utilise la bonne fonction addComment-->
                <input type="text" size="1000" style="height: 100px" name="amount" placeholder="commentaire...">
                <button type="submit" id="submitBut" class="btn btn-primary btn-block">publier</button>
                <input type="text" name="product_id" value={{$id}} hidden>
              </form>
    </div>
  </main>

  <footer>
    @include('layouts/partials/_footer')
  </footer>
</body>

</html>