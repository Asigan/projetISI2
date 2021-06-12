@extends('layout')

@section('contenu')
    <br>
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Modifier un tournoi</h4>
            <div class="card-body">
                <form action="{{ route('tournois.update', $tournoi->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ old('nom', $tournoi->nom) }}" placeholder="Nom du tournoi">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date', $tournoi->date) }}" placeholder="Date du tournoi">  
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" id="adresse" value="{{ old('adresse', $tournoi->adresse) }}" placeholder="Adresse du tournoi">  
                        @error('adresse')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('classement') is-invalid @enderror" name="classement" id="classement" value="{{ old('classement', $tournoi->classement) }}" placeholder="Classement du tournoi">  
                        @error('classement')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        Niveau du tournoi : <select name="niveau_id" id="niveau_id" size="1">
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" 
                                @if($niveau->id==$tournoi->niveau->id)
                                    selected 
                                @endif 
                                >{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
                        @error('niveau_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <br>
                    <div class="form-group">
                        Organisateur du tournoi : <select name="organisateur_id" id="organisateur_id" size="1">
                            @foreach($organisateurs as $organisateur)
                                <option value="{{ $organisateur->id }}" 
                                @if($organisateur->id==$tournoi->organisateur->id)
                                    selected 
                                @endif 
                                >{{ $organisateur->nom }}</option>
                            @endforeach
                        </select>
                        @error('organisateur_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Modifier</button>
                </form>
            </div>        
        </div>
    </div>
@endsection