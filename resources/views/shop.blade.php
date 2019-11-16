<title>BDE CESI Bordeaux : Boutique</title>

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
					$products = App\Product::all()->sortByDesc('created_at');
					
				@endphp
				@foreach ($products as $product)
				@php
					$label = $product->label;
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

				@guest 
				@if (Route::has('register'))

				@endif

				@else

				{{-- if admin --}}
				@if ((App\User::where('id', (\Auth::user()->id))->first()->role_id)==2 | (App\User::where('id', (\Auth::user()->id))->first()->role_id)==3)
				<form method="POST" action="{{ 'suppProduct' }}">
						@csrf
						<div class="payer">
							<div class="payer-box">
								<div>
									<input type="text" name="nameProductSupp" placeholder="Nom du produit à supprimer" >
								</div>
								<button>
									<a class="payer-text" style="text-decoration: none; color: white;">
										Supprimer un produit
									</a>
								</button>
								</div>
							</div>
						</div>
				</form>
				<br>
				<form method="POST" action="{{ 'addProduct' }}">
						@csrf
						<div class="payer">
							<div class="payer-box">
								<div>
									<input type="text" name="labelProductAdd" placeholder="Nom du produit à ajouter" >
								</div>
									<input type="text" name="descriptionProductAdd" placeholder="Description du produit à ajouter" >
								<div>
								</div>
									<input type="text" name="priceProductAdd" placeholder="Prix du produit à ajouter" >
								<div>
								</div>
									<input type="text" name="centerProductAdd" placeholder="Id_Centre du produit à ajouter" >
								<div>
								</div>

								<button>
									<a class="payer-text" style="text-decoration: none; color: white;">
										Ajouter un produit
									</a>
								</button>
								</div>
							</div>
						</div>
				</form>
					
				@endif


				@endguest
				
				<!-- fin block -->
			</div>
			<!-- clearfix sert à mettre à la suite les prochains élément sans qu'ils glisse dessous !-->
			<div class="clearfix">
			</div>
		</div>
	</div>
</div>



@endsection('main')
