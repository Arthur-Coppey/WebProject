<title>BDE CESI Bordeaux : A Propos</title>

@extends('layouts.index')
@section('navbar')

	@include('layouts/partials/_navbar')
	 

@endsection('navbar')

@section('main')

<h2 class="titresApropos">Les membres du BDE</h2>

<div class="container membres">
	<div class="row justify-content-center">
		<div class="col membre">
			<center><img class="imageMembre" src="img/xavier.png"/></center>
			<center><strong>Président</strong><br></center>
			<center><a>Xavier LABARBE</a><br></center>
			<center><a>A2 Exia</a></center>
		</div>
		<div class="col membre">
			<center><img class="imageMembre" src="img/pierre.png"/></center>
			<center><strong>Vice-Président</strong><br></center>
			<center><a>Pierre FORQUES</a><br></center>
			<center><a>A2 Exia</a></center>
		</div>
		<div class="col membre">
			<center><img class="imageMembre" src="img/axel.png"/></center>
			<center><strong>Vice-Vice-Président</strong><br></center>
			<center><a>Axel GALAND</a><br></center>
			<center><a>A2 Exia</a></center>
		</div>
	</div>
	<div class="row">
		<div class="col membre">
			<center><img class="imageMembre" src="img/quentin.png"/></center>
			<center><strong>Secrétaire</strong><br></center>
			<center><a>Quentin LAURENSON</a><br></center>
			<center><a>A2 Exia</a></center>
		</div>
		<div class="col membre">
			<center><img class="imageMembre" src="img/arthur.png"/></center>
			<center><strong>Trésorier</strong><br></center>
			<center><a>Arthur COPPEY</a><br></center>
			<center><a>A2 Exia</a></center>
		</div>
	</div>
</div>

<h2 class="titresApropos">Les Associations</h2>

<div class="container associations">
	<div class="row justify-content-center">
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/root-me.png" width="200px"></center>
			<center><strong>Root-Me</strong><br></center>
		</div>
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/robotique.png" width="200px"/></center>
			<center><strong>Robotique</strong><br></center>
		</div>
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/photo.png" width="200px"/></center>
			<center><strong>Photo</strong><br></center>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/escalade.png" width="200px"/></center>
			<center><strong>Escalade</strong><br></center>
		</div>
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/muscu.png" width="200px"/></center>
			<center><strong>Musculation</strong><br></center>
		</div>
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/basket.png" width="200px"/></center>
			<center><strong>Basket-Ball</strong><br></center>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/eloquence.png" width="200px"/></center>
			<center><strong>Eloquence</strong><br></center>
		</div>
		<div class="col asso">
			<center><img class="imageAsso" src="img/assos/games.png" width="200px"/></center>
			<center><strong>AC/DC</strong><br></center>
		</div>
	</div>
</div>

@endsection('main')
