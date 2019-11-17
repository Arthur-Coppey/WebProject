@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

@guest 
@if (Route::has('register'))

@endif

@else
<button type="button" class="btn btn-primary btn-sm" id="btnGauche">
	<a href="/event_creater" style="text-decoration: none">
		<p class="loginRegisterText">Ajouter un évènement</p>
	</a>
</button>

@endguest

<button type="button" class="btn btn-primary btn-sm" id="btnGauche">
	<a href="event/past" style="text-decoration: none">
		<p class="loginRegisterText">Voir les évènements passés</p>
	</a>
</button>

<div class="marketplace-extensions-top">
	<div class="cells_events">
		<div class="gallery">
			@php
				$events = App\Event::orderBy('date', 'asc')->get();
			@endphp
		
			@foreach ($events as $event)
			@php
				$label = $event->label;
				$id = $event->id;
				$date = $event->date;
			@endphp
			@if (strtotime($date) >= strtotime(date('Y-m-d')))
			<a href="../event/{{$id}}" aria-label="{{$label}}" class="gallery-item-card-container-event">
				<div class="gallery-item-card-event">

					<div class="icon-cell-event">
						<img class="icon" src="img/boof.png" alt="{{$label}}">
					</div>

					<div class="core-info-cell-event">

						<div class="name-event">
						<span>{{$event->label}}</span>
						</div>

						<div class="core-info-second-row-event">

							<div class="date-event">
								<span>{{$event->date}}</span>
							</div>

							<div class="date-event">
								<span>{{$event->location}}</span>
							</div>

							<div class="price-event">
								<span>{{$event->price}}€</span>
							</div>

						</div>
					
						<div class="item-details-event">
							<div class="description">{{$event->description}}</div>
						</div>

					</div>

				</div>
			</a>
			@endif
			@endforeach
			
			<!-- fin block -->
		</div>
		<!-- clearfix sert à mettre à la suite les prochains élément sans qu'ils glisse dessous !-->
			<div class="clearfix">
		</div>
	</div>
</div>

@endsection('main')

