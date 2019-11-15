<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @php
      $article = App\Event::where('id', $id)->first();
      $label = $article->label;
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
          <div class="mb-1 text-muted">{{$article->created_at}}</div>
          <p class="card-text mb-auto">{{$article->description}}</p>
          @guest 

          @if (Route::has('register'))
            <button onclick="location.href='../login';" type="submit" id="submitBut" class="btn btn-primary btn-block">Connecte toi pour t'incrire à l'évènement</button>
          @endif

          {{-- connecté --}}

          @else

          @php
            $id = \Auth::user()->id;
            $product_id = $article->id;
          @endphp

          <form method="POST" action="{{ 'addBasket' }}">
          @csrf

          <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je m'inscrit</button>
          {{-- </form> --}}

        @endguest

          
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="/img/boof.png" alt="{{$article->label}}">
        </div>
      </div>
    </main>

    <footer>
      @include('layouts/partials/_footer')
    </footer>
  </body>
</html>


