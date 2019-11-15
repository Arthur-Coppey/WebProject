@extends('layouts.index')
@section('navbar')

     @include('layouts/partials/_navbar')
     

@endsection('navbar')
@section('main')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create an event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ 'create-event' }}">
                        @csrf

                        <div class="form-group row">
                            <label for="label" class="col-md-4 col-form-label text-md-right">{{ __("Nom de l'évènement") }}</label>

                            <div class="col-md-6">
                                <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ old('label') }}" required autocomplete="first_name" autofocus>

                                @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de Salle') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="last_name" autofocus>

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row input-group ">
                            <label for="ocurrences" class="col-md-4 col-form-label text-md-right">{{ __('Ocurrences') }}</label>
                            <div class="col-md-6">
                                <select id="ocurrences" type="text" name="ocurrences" class="custom-select"  required>
                                    
                                    <option value="" class="form-control" disabled selected>Nombre d'ocurrences</option>
                                    @for ($nombres_ocurrences = 1; $nombres_ocurrences <= 50; $nombres_ocurrences++)
                                        <option value="{{$nombres_ocurrences}}" class="form-control" >{{$nombres_ocurrences}}</option>
                                    @endfor
                                    
                    
                                </select> 
                            </div>
                        </div> <!-- form-group end.// --> 

                        <div class="form-group row input-group ">
                            <label for="frequency" class="col-md-4 col-form-label text-md-right">{{ __('Fréquence') }}</label>
                            <div class="col-md-6">
                                <select id="frequency" type="text" name="frequency" class="custom-select"  required>
                                
                                    <option value="" class="form-control" disabled selected>Fréquence de l'évènement</option>
                                    @for ($nombres_frequency = 1; $nombres_frequency <= 7; $nombres_frequency++)
                                        <option value="{{$nombres_frequency}}" class="form-control" >{{$nombres_frequency}}</option>;
                                    @endfor
                                </select> 
                            </div>
                        </div> <!-- form-group end.// --> 

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="last_name" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="last_name" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Valider') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('main')