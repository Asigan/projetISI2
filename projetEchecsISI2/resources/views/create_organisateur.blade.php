@extends('layout')

@section('contenu')
@auth
<br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Ajouter un organisateur</h4>
            <div class="card-body">
                <form action="{{ route('organisateurs.store') }}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Nom de l'organisateur">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Créer</button>
                </form>
            </div>        
        </div>
    </div>
@else
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4>Vous n'avez pas accès à cette page.</h4>
            <br>
            <p>Connectez-vous ou inscrivez-vous dans la barre du haut</p>
        </div>
    </div>
@endauth
@endsection