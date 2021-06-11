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
                <ul>
                @foreach($tournoi->joueurs as $joueur)
                    <li>{{ $joueur->id }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection