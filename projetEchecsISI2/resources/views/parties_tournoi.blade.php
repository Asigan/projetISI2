@extends('layout')

@section('titrePage')
    Les echecs
@endsection

@section('titreItem')
    <h1>Tout sur les echecs</h1>
@endsection

@section('contenu')

@if(session()->has('info'))
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-body">
            <p class="card-text">{{ session('info') }}</p>
        </div>
    </div>
@endif

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici les parties du tournoi</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Joueur 1</th>
                        <th>Joueur 2</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($parties as $partie)
                        <tr>
                            <td> {{ $partie->joueur1->nom }} {{ $partie->joueur1->prenom }}</td>
                            <td> {{ $partie->joueur2->nom }} {{ $partie->joueur2->prenom }}</td>
                            <td> {{ $partie->date }} </td>
                            <td> {{ $partie->status()}} </td>
                            <td><a class="btn btn-primary" href="{{route('parties.show', $partie->id) }}">Voir</a></td>
                            @auth
                            <td><a class="btn btn-warning" href="{{route('parties.edit', $partie->id)}}">Modifier</a></td>
                            <td>
                                <form action="{{ route('parties.destroy', $partie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
                    @auth
                    <form action="{{ route('parties.store') }}" method="POST">
                            @csrf
                            <br>
                            <td class="form-group">
                                <select name="joueur1_id" id="joueur1_id" size="1">
                                    @foreach($joueurs as $joueur)
                                        <option value="{{ $joueur->id }}">{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                                    @endforeach
                                </select>
                                @error('joueur1_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="form-group">
                                <select name="joueur2_id" id="joueur2_id" size="1">
                                    @foreach($joueurs as $joueur)
                                        <option value="{{ $joueur->id }}">{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                                    @endforeach
                                </select>
                                @error('joueur2_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="form-group">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" placeholder="Date de la partie">
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="hidden" name="statut" id="statut" value="0" />
                                <input type="hidden" name="tournoi_id" id="tournoi_id" value="{{ $tournoi->id }}" />
                                <button type="submit" class="btn btn-success">Créer</button>
                            </td>
                        </form>
                        @endauth
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection