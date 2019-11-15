@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')


<div class="marketplace-extensions-top">
	<div class="cells_events">
		<div class="gallery">
			@php
				$events = App\Event::all();
			@endphp
			@foreach ($events as $event)
			@php
				$label = $event->label;
			@endphp

			<a href="/shop/{{$label}}" aria-label="{{$label}}" class="gallery-item-card-container-event">
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
			@endforeach
			
			<!-- fin block -->
		</div>
		<!-- clearfix sert à mettre à la suite les prochains élément sans qu'ils glisse dessous !-->
			<div class="clearfix">
		</div>
	</div>
</div>

@endsection('main')
