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

    @auth
    <div class="card-body">
        <form action="{{ route('joueurs.create') }}" method="get">
            <button class="btn btn-success" type="submit">Ajouter un joueur</button>
        </form>
    </div>
    @endauth

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici nos joueurs</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nationalite</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($joueurs as $joueur)
                        <tr>
                            <td> {{ $joueur->nom }} </td>
                            <td> {{ $joueur->prenom }} </td>
                            <td> {{ $joueur->nationalite }} </td>
                            <td><a class="btn btn-primary" href="{{route('joueurs.show', $joueur->id) }}">Voir</a></td>
                            @auth
                            <td><a class="btn btn-warning" href="{{route('joueurs.edit', $joueur->id) }}">Modifier</a></td>
                            <td>
                                <form action="{{ route('joueurs.destroy', $joueur->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection