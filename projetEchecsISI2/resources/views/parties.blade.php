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

    <div class="card-body">
        <form action="{{ route('parties.create') }}" method="get">
            <button class="btn btn-success" type="submit">Ajouter une partie</button>
        </form>
    </div>

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici les parties</h5>
        </header>
        <div class="card-content">
            <div class="content">
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
                    @foreach($parties as $partie)
                        <tr>
                            <td> {{ $partie->joueur1->nom }} {{ $partie->joueur1->prenom }}</td>
                            <td> {{ $partie->joueur2->nom }} {{ $partie->joueur2->prenom }}</td>
                            <td> {{ $partie->date }} </td>
                            <td><a class="btn btn-primary" href="{{route('parties.show', $partie->id) }}">Voir</a></td>
                            <td>
                                <form action="{{ route('parties.destroy', $partie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection