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
            <h5 class="card-header-title">{{ $tournoi->nom }}</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Date : {{ $tournoi->date }}</p>
                <p>Adresse : {{ $tournoi->adresse }}</p>
                <p>Organisateur : {{ $organisateur->nom }}</p>
                <h5>Voici l'ensemble des joueurs ayant participé à ce tournoi</h5>
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nationalite</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($tournoi->joueurs as $joueur)
                        <tr>
                            <td> {{ $joueur->nom }} </td>
                            <td> {{ $joueur->prenom }} </td>
                            <td> {{ $joueur->nationalite }} </td>
                            <td><a class="btn btn-primary" href="{{route('joueurs.show', $joueur->id) }}">Voir</a></td>
                        </tr>
                    @endforeach
                </table>

                <h5>Voici l'ensemble des joueurs n'ayant pas participé à ce tournoi</h5>
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nationalite</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($joueursNonInscrits as $joueur)
                        <tr>
                            <td> {{ $joueur->nom }} </td>
                            <td> {{ $joueur->prenom }} </td>
                            <td> {{ $joueur->nationalite }} </td>
                            @auth
                            <td><form action="{{ route('participes.store') }}" method="POST">
                                @csrf 
                                <input type="hidden" name="tournoi_id" value="{{ $tournoi->id }}" />
                                <input type="hidden" name="joueur_id" value="{{$joueur->id}}" />
                                <button class="btn btn-success" type="submit">Inscrire</button>
                                </form>
                            </td>
                            @endauth
                            <td><a class="btn btn-primary" href="{{route('joueurs.show', $joueur->id) }}">Voir</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection