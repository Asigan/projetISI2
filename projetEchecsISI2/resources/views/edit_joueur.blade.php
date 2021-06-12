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
            <h4 class="card-header">Modifier un joueur</h4>
            <div class="card-body">
                <form action="{{ route('joueurs.update', $joueur->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" id="nom" value="{{ old('nom', $joueur->nom) }}" placeholder="Nom du joueur">
                        @error('nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" id="prenom" value="{{ old('prenom', $joueur->prenom) }}" placeholder="Prénom du joueur">  
                        @error('prenom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('nationalite') is-invalid @enderror" name="nationalite" id="nationalite" value="{{ old('nationalite', $joueur->nationalite) }}" placeholder="Nationalité du joueur">  
                        @error('nationalite')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror               
                    </div>
                    <br>
                    <div class="form-group">
                        Niveau du joueur : <select name="niveau_id" id="niveau_id" size="1">
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" 
                                @if($niveau->id==$joueur->niveau->id)
                                    selected 
                                @endif 
                                >{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Modifier</button>
                </form>
            </div>        
        </div>
    </div>
@endsection