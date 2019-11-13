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

 
    <form action = "user" method = "post">
        {{ csrf_field() }}
         <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="first_name" class="form-control" placeholder="Prénom" type="text" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="last_name" class="form-control" placeholder="Nom" type="text" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
            </div>
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
        </div> 

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" placeholder="Centre"><i class="fas fa-globe-europe" ></i></i></span>
            </div>
            <select name="center" class="custom-select" width="50%" required>
                    
                <option value=""  disabled selected>Centre</option>
                @php
                    $centers = App\Center::all();
                @endphp
                @foreach ($centers as $center){
                    
                  <option value={{$center->id}} >{{$center->name}} </option>;
                }
                @endforeach

            </select> 

        </div> <!-- form-group end.// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input id="password1" name = "password" class="form-control" placeholder="Mot de passe" type="password" required>
        </div> 

        <a id="errorMsg"><a>

        <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input value="" id="password2" name = "password_confirm" class="form-control" placeholder="Verificaion mot de passe" type="password" required>
        </div>  
        
        <!-- form-group// -->                                      
        <div class="form-group">
            <button value="" type="submit" id="submitBut" class="btn btn-primary btn-block">Validation</button>
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

@endsection('main');