@extends('layout')

@section('contenu')
@auth
<br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Ajouter un joueur</h4>
            <div class="card-body">
                <form action="{{ route('joueurs.store') }}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Nom du joueur">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" id="prenom" placeholder="Prénom du joueur">  
                        @error('prenom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nationalite') is-invalid @enderror" name="nationalite" id="nationalite" placeholder="Nationalité du joueur">  
                        @error('nationalite')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        Niveau du joueur : <select name="niveau" id="niveau" size="1">
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
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