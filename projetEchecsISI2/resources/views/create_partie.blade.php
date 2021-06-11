@extends('layout')

@section('contenu')
<br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">Ajouter une partie</h4>
            <div class="card-body">
                <form action="{{ route('parties.store') }}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        Joueur n°1 : <select name="joueur1_id" id="joueur1_id" size="1">
                            @foreach($joueurs as $joueur)
                                <option value="{{ $joueur->id }}">{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        Joueur n°2 : <select name="joueur2_id" id="joueur2_id" size="1">
                            @foreach($joueurs as $joueur)
                                <option value="{{ $joueur->id }}">{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        Tournoi : <select name="tournoi_id" id="tournoi_id" size="1">
                            @foreach($tournois as $tournoi)
                                <option value="{{ $tournoi->id }}">{{ $tournoi->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        Date : <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Date de la partie">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Créer</button>
                </form>
            </div>        
        </div>
    </div>
@endsection