@extends('layout')

@section('titrePage')
    Les echecs
@endsection

@section('titreItem')
    <h1>Tout sur les echecs</h1>
@endsection

@section('contenu')

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">{{ $joueur->nom }} {{ $joueur->prenom }}</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Niveau : {{ $niveau->eloMin }} - {{ $niveau->eloMax }}</p>
                <h5>Voici les parties jouées par ce joueur</h5>
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Joueur 1</th>
                        <th>Joueur 2</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($joueur->parties1 as $partie)
                        <tr>
                            <td> {{ $partie->joueur1->nom }} {{ $partie->joueur1->prenom }}</td>
                            <td> {{ $partie->joueur2->nom }} {{ $partie->joueur2->prenom }}</td>
                            <td> {{ $partie->date }} </td>
                            <td><a class="btn btn-primary" href="{{route('parties.show', $partie->id) }}">Voir</a></td>
                        </tr>
                    @endforeach
                    @foreach($joueur->parties2 as $partie)
                        <tr>
                            <td> {{ $partie->joueur1->nom }} {{ $partie->joueur1->prenom }}</td>
                            <td> {{ $partie->joueur2->nom }} {{ $partie->joueur2->prenom }}</td>
                            <td> {{ $partie->date }} </td>
                            <td><a class="btn btn-primary" href="{{route('parties.show', $partie->id) }}">Voir</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection