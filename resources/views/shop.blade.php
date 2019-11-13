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

				@ 
				$description = "une decription avec overflow aaaaaaaaaabbbbbbbbbbccccccccccccddddddddd";
				
				
				<a aria-label="nom produit" class="gallery-item-card-container">
					<div class="gallery-item-card">
						<div class="cover">
							<div class="icon-cell">
								<img class="icon" src="img/boof.png" alt="label bdd">
							</div>
							<div class="core-info-cell">
								<div class="name">
									<span>nom produit</span>
								</div>
								<div class="core-info-second-row">
									<div class="price">
										<span>prix</span>
									</div>
								</div>
							</div>
						</div>
						<div class="item-details">
							<div class="description">descriptiontest</div>
						</div>
					</div>
				</a>
				
				<!-- fin block -->
			</div>
			<!-- clearfix sert à mettre à la suite les prochains élément sans qu'ils glisse dessous !-->
			<div class="clearfix">
			</div>
		</div>
	</div>
</div>



@endsection('main')
