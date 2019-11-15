@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')

<div class="marketplace-extensions-top">
	<div data-reactroot="">
		<div class="extensions">
			<div class="gallery-items">


				<!-- début block -->
				<!-- aria-label pour une future bar de recherche -->
				@php
					$products = App\Product::all();
				@endphp
				@foreach ($products as $product)
				@php
					$label = $product->label;
					$id = $product->id;
				@endphp

				<a href="../shop/{{$product->id}}" aria-label="nom produit" class="gallery-item-card-container">
					<div class="gallery-item-card">
						<div class="cover">
							<div class="icon-cell">
								<img class="icon" src="img/boof.png" alt="label bdd">
							</div>
							<div class="core-info-cell">
								<div class="name">
								<span>{{$product->label}}</span>
								</div>
								<div class="core-info-second-row">
									<div class="price">
										<span>{{$product->price}}€</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item-details">
							<div class="description">{{$product->description}}</div>
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
</div>



@endsection('main')
