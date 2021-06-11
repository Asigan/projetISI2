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
            <h5 class="card-header-title">Tournois organisés par {{ $organisateur->nom }}</h5>
        </header>
        <div class="card-content">
            <div class="content">
            <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($tournois as $tournoi)
                        @if($tournoi->organisateur_id == $organisateur->id)
                        <tr>
                            <td> {{ $tournoi->nom }} </td>
                            <td> {{ $tournoi->date }} </td>
                            <td><a class="btn btn-primary" href="{{route('tournois.show', $tournoi->id) }}">Voir</a></td>
                        </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection