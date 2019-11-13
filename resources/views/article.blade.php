@extends('layouts.article', ['label', $label])

@section('main')
    @php
        $article = App\Product::where('label', $label)->first();
    @endphp

<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-primary">{{$article->price}}€</strong>
      <h3 class="mb-0">{{$article->label}}</h3>
      <div class="mb-1 text-muted">{{$article->created_at}}</div>
    <p class="card-text mb-auto">{{$article->description}}</p>
    </div>
    <div class="col-auto d-none d-lg-block">
    <img src="/img/boof.png" alt="{{$article->label}}">
    </div>
  </div>
@endsection