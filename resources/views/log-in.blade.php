@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')


<div class="container">
<br>




    <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Connecte toi !</h4>


        <form>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="Prénom" type="text">
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="" class="form-control" placeholder="Nom" type="text">
        </div> 

        
        <!-- form-group// -->                                      
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Validation</button>
        </div> 
        <!-- form-group// -->      
        <div class="text-center">
            <a>Tu n'es pas déjà inscrit ?</a><br>
            <a href="/sign-in">Créer toi un compte</a>    
        </div>
                                                                
    </form>
    </article>
    </div> 

</div> 


<br>




@endsection('main')
