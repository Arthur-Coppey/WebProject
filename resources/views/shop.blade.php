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
			</div>
		</div>
	</div>
	<!-- fin block -->
</div>
<!-- clearfix sert à mettre à la suite les prochains élément sans qu'ils glisse dessous !-->
<div class="clearfix">
</div>


<div class="del-add">
	<form method="POST" action="{{ 'addProduct' }}">
		@csrf
		<center>
			<h2 class="add-title">Ajouter un Article</h2>
			<div class="add-prod">
				<div class="add-prod-box">
					<table>
						<tbody>
							<tr>
								<td class="input-desc">
									<a>
									Nom :
									</a>
								</td>
								<td class="input-form">
									<input type="text" name="labelProductAdd">
								</td>
							</tr>
							<tr>
								<td class="input-desc">
									<a>
										Description :
									</a>
								</td>
								<td class="input-form">
									<input type="text" name="descriptionProductAdd">
								</td>
							</tr>
							<tr>
								<td class="input-desc">
									<a>
										Prix :
									</a>
								</td>
								<td class="input-form">
									<input type="text" name="priceProductAdd">
								</td>
							</tr>
							<tr>
								<td class="input-desc">
									<a>
										Numéro de Centre :
									</a>
								</td>
								<td class="input-form">
									<input type="text" name="centerProductAdd">
								</td>
							</tr>
						</tbody>
					</table>

					<button class="add-text-butt">
						<a class="add-text" style="text-decoration: none; color: white;">
							Ajouter un produit
						</a>
					</button>
				</div>
			</div>
		</center>
	</form>
	<br>
	<form method="POST" action="{{ 'suppProduct' }}">
		@csrf
		<center>
			<h2 class="del-title">Supprimer un Article</h2>
			<div class="del-prod">
				<div class="del-prod-box">
					<table>
						<tbody>
							<tr>
								<td class="input-desc">
									<a>
										Nom :
									</a>
								</td>
								<td class="input-form">
									<div>
										<input type="text" name="nameProductSupp">
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<button class="del-text-butt">
						<a class="del-text" style="text-decoration: none; color: white;">
							Supprimer un produit
						</a>
					</button>
				</div>
			</div>
		</center>
	</form>
</div>
				
				
			



@endsection('main')
