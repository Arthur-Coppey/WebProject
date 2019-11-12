@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')


<div class="container">
<br>




    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Inscris toi !</h4>


        <form>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="Prénom" type="text" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="Nom" type="text" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
            </div>
            <input name="" class="form-control" placeholder="Email address" type="email" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" placeholder="Centre"><i class="fas fa-globe-europe" ></i></i></span>
            </div>
            <select class="custom-select" width="50%" required>
                    
                <option value="" required disabled selected>Centre</option>
                <option value="1">Aix-en-Provence</option>
                <option value="2">Angoulème</option>
                <option value="3">Arras</option>
                <option value="4">Bordeaux</option>
                <option value="5">Brest</option>
                <option value="6">Caen</option>
                <option value="7">Châteauroux</option>
                <option value="8">Dijon</option>
                <option value="9">Grenoble</option>
                <option value="10">La Rochelle</option>
                <option value="11">Le mans</option>
                <option value="12">Lille</option>
                <option value="13">Lyon</option>
                <option value="14">Montpellier</option>
                <option value="15">Nancy</option>
                <option value="16">Nantes</option>
                <option value="17">Nice</option>
                <option value="18">Orléans</option>
                <option value="19">Paris Nanterre</option>
                <option value="20">Pau</option>
                <option value="21">Reims</option>
                <option value="22">Rouen</option>
                <option value="23">Saint Nazaire</option>
                <option value="24">Strasbourg</option>
                <option value="25">Toulouse</option>

            </select>

        </div> <!-- form-group end.// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Mot de passe" type="password" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Repeat password" type="password" required>
        </div> 
        
        <!-- form-group// -->                                      
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Validation</button>
        </div> 
        <!-- form-group// -->      
        <div class="text-center">
                <a>Tu possèdes déjà un compte ?</a><br>
                <a href="/log-in">Connecte toi</a>    
        
        </div>
                                                                
    </form>
    </article>
    </div> 

</div> 


<br>




@endsection('main')
