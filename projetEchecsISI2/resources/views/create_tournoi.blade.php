@extends('layout')

@section('contenu')
<br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Ajouter un tournoi</h4>
            <div class="card-body">
                <form action="{{ route('tournois.store') }}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" placeholder="Nom du tournoi">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Date du tournoi">  
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" placeholder="Adresse du tournoi">  
                        @error('adresse')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('classement') is-invalid @enderror" name="classement" id="classement" placeholder="Classement du tournoi">  
                        @error('classement')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        Niveau du tournoi : <select name="niveau" id="niveau" size="1">
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        Organisateur du tournoi : <select name="organisateur" id="organisateur" size="1">
                            @foreach($organisateurs as $organisateur)
                                <option value="{{ $organisateur->id }}">{{ $organisateur->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Créer</button>
                </form>
            </div>        
        </div>
    </div>
@endsection