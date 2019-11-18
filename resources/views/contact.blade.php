<title>BDE CESI Bordeaux : Contacte</title>

@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')

@section('main')

<h2 class="contact-title">Nous Contacter</h2>

<table class="contact-table">
     <tbody>
          <tr class="text-contact">
               <td class="contact-item adresse">
                    <i class="icones-contact fas fa-map-marker-alt"></i>
                    <p>
                         Campus CESI Bordeaux <br>
                         Quartier des Chartrons <br>
                         264 Boulevard Godard <br>
                         33000 Bordeaux <br>
                    </p>
               </td>

               <td class="contact-item tel">
                    <i class="icones-contact fas fa-phone"></i>
                    <p>
                         <strong>Président Du BDE</strong><br>
                         Xavier LABARBE : 06.95.13.27.46<br>
                         <strong>Vice-Président</strong><br>
                         Pierre FORQUES : 07.50.30.49.41<br>
                         <strong>Vice-Vice-Président</strong><br>
                         Axel GALAND : 06.78.00.47.82<br>
                         <strong>Secrétaire</strong><br>
                         Quentin LAURENSON : 07.82.45.91.43<br>
                         <strong>Trésorier</strong><br>
                         Arthur COPPEY : 07.82.46.33.61<br>
                    </p>
               </td>

               <td class="contact-item mail">
                    <i class="icones-contact far fa-envelope"></i>
                    <p>
                         <strong>Xavier LABARBE</strong><br>
                         xavier.labarbe@viacesi.fr<br>
                         <strong>Pierre FORQUES</strong><br>
                         pierre.forques@viacesi.fr<br>
                         <strong>Axel GALAND</strong><br>
                         axel.galand@viacesi.fr<br>
                         <strong>Quentin LAURENSON</strong><br>
                         quentin.laurenson@viacesi.fr<br>
                         <strong>Arthur COPPEY</strong><br>
                         arthur.coppey@viacesi.fr<br>
                    </p>
               </td>
          </tr>    
     </tbody>
</table>
<div class="imagesCesi">
     <center>
          <span><img class="responsive imageCampus" src="img/campusBdx.jpg"></span>
          <span><img class="responsive imageCampus" src="img/cesiBdxMap.png"></span>
     </center>
</div>

@endsection('main')
