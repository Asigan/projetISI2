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
            <h5 class="card-header-title">{{ $party->joueur1->nom }} {{ $party->joueur1->prenom }} vs. {{ $party->joueur2->nom }} {{ $party->joueur2->prenom }} </h5>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Date de la partie : {{ $party->date }}</p>
                <p>Tournoi correspondant :  <a href="{{route('tournois.show', $party->tournoi->id) }}">{{ $party->tournoi->nom }}</a></p>
                <p>Statut: {{ $status}}</p>
                @auth
                <p><a class="btn btn-secondary" href="{{ route('parties.edit', $party->id )}}">Modifier</a></p>
                @endauth
            </div>
        </div>
    </div>
@endsection