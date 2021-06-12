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
                <p>Classement : {{ $tournoi->classement }}</p>
                <p>Niveau : {{ $niveau->eloMin }} - {{ $niveau->eloMax }}</p>
                <p>Organisateur : {{ $organisateur->nom }}</p>
                <a class="btn btn-primary" href="{{ route('joueurs_tournoi', $tournoi->id) }}">Voir les joueurs</a>
                <a class="btn btn-primary" href="{{ route('parties_tournoi', $tournoi->id) }}">Voir les parties</a>
            </div>
        </div>
    </div>
@endsection