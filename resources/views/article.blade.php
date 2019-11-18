<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @php
    $article = App\Event::where('id', $id)->first();
    $label = $article->label;
    $event_date = $article->date;
    $event_comments = App\Comment::where('event_id', $id)->get();

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
                @guest {{-- User déconnecté --}}

                <button onclick="location.href='../login';" type="submit" id="submitBut"
                    class="btn btn-primary btn-block">Connecte toi pour t'incrire à l'évènement</button>
                {{-- User connecté --}}
                @else
                @if (strtotime($event_date) > strtotime(date('Y-m-d')))
                @php
                $id = \Auth::user()->id;
                $event_id=App\Event::where('id', $id)->first()->id;
                
                @endphp

                @if ( App\Participant::where('event_id', $event_id)->first() == null)
                <form method="POST" action="{{ 'eventSub' }}">
                    @csrf
                    <input type="text" name="event_id" value={{$event_id}} hidden>
                    <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je m'inscrit</button>
                </form>
                @else
                <form method="post" action="{{ 'eventUnsub' }}">
                    @csrf
                    <input type="text" name="event_id" value={{$event_id}} hidden>
                    <button type="submit" id="submitBut" class="btn btn-primary btn-block">Je me désinscris</button>
                </form>
                @endif
                <!--fonction eventLike coder ?-->
                <form method="POST" action="{{ 'eventLike' }}">
                    @csrf
                    <input type="text" name="event_id" value={{$event_id}} hidden>
                    <button type="submit" id="submitBut" class="btn btn-primary btn-block">like</button>
                </form>

                <form method="POST" action="{{ '/downloadParticipantList' }}">
                    @csrf
                    <button class="btn btn-primary btn-block" name="event_id" value={{$event_id}}>Télécharger la
                        liste des participants</button>
                </form>



                @endif
                @endguest

            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="/img/event/soireeBde.png" alt="{{$article->label}}">
            </div>
            
            @guest
            <button onclick="location.href='../login';" type="submit" id="submitBut"
            class="btn btn-primary btn-block">Connecte toi pour commenter</button>
            @else
            <form method="POST" action="{{ '/addComment' }}">
                @csrf
                <!-- il faudrat peut être changer value,je sais pas si j'utilise la bonne fonction addComment-->
                <input type="text" size="1000" style="height: 50px; font-size: 25px;" name="content" placeholder="Ajouter un commentaire">
                <input type="text" name="event_id" value={{$id}} hidden>

                <button style="background-color: #5c88da; border: none;" type="submit" class="btn btn-primary publish-comment-butt">
                    <a style="text-decoration: none;">
                        <h3 class="publish-comment-title">Publier</h3>
                    </a>
                </button>
            </form>
            
            <div class="container">
   
                <div class="panel panel-primary">
                  <div class="panel-body">
               
                    @if ($message = Session::get('success'))
                    
                    @php
                        $imgName = Session::get('image');
                        $imageURL = "/images/".$imgName;

                        App\Picture::create([
                        'URI'=> $imageURL,
                        'event_id'=> App\Event::where('id', $id)->first()->id,
                        'product_id'=> 0,
                        'user_id' => $id
                    ]);
                    @endphp
                    @endif
              
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
              
                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="width: 50vw;">
              
                            <div class="col-md-6" style="width: 50vw;">
                                <input type="file" name="image" class="form-control">
                            </div>
               
                            <div class="col-md-6" style="width: 50vw;">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
               
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            @endguest
        </div>
        <div>

            <h2 class="comment-section-title">Commentaires :</h2>
            @foreach ($event_comments as $event_comment)
            @php
            $user_first_name = App\User::where('id', $event_comment->user_id)->first()->first_name;
            $user_last_name = App\User::where('id', $event_comment->user_id)->first()->last_name;
            @endphp


            <div class="gallery-item-card-container-event each-comment" style="border: 1px solid rgba(107, 104, 104, 0.658); width: 20%">
                <table class="gallery-item-card-event">

                    <tbody class="core-info-cell-event">

                        <tr class="user-name-event">
                            <td>
                                <h3 class="comm-titles">Par : </h3>
                            </td>
                            <td>
                                <span>{{$user_first_name}} {{$user_last_name}} </span>
                            </td>
                        </tr>

                        <tr class="desc-event">
                            <td>
                                <h3 class="comm-titles">Commentaire : </h3>
                            </td>
                            <td>
                                <span>{{$event_comment->content}}</div>
                            </td>
                        </tr>

                    </tbody>

                </table>
                @guest
                @else
                @if ((App\User::where('id', ($id))->first()->role_id)==2 | (App\User::where('id', ($id))->first()->role_id)==3)
                <!--pas de lien fais faire la fonction de supression-->
                <form method="POST" action="{{ '/commentDelete' }}">
                    @csrf
                    <!-- il faudrat peut être changer value,je sais pas si j'utilise la bonne fonction addComment-->
                    <input type="text" name="comment_id" value={{$event_comment->id}} hidden>
                    <button type="submit" id="submitBut" class="btn btn-primary btn-block">supprimer</button>
                </form>
                <a href="../reportEvent"><button type="submit" id="reportEvent" class="btn btn-primary btn-block">Signaler</button>
                </a>
                @endif

                @endguest
                
            </div>

            @endforeach

            @php
                $picture = App\Picture::where('event_id', App\Event::where('id', $id)->first()->id)->get();
                $url = App\Picture::all()->get('URL');
            @endphp

            @foreach ($picture as $m=>$item)
            
            {{-- <span>{{$user_first_name}} {{$user_last_name}} </span> --}}

                <img class="desc-event-img" src="{{ $picture[$m]->URI }}">

            @endforeach 

        </div>
    </main>

    <footer>
        @include('layouts/partials/_footer')
    </footer>
</body>

</html>