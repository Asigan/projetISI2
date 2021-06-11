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
            <h5 class="card-header-title">Voici les niveaux d'échecs</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Elo minimum</th>
                        <th>Elo maximum</th>
                    </tr>
                    </thead>
                    @foreach($niveaux as $niveau)
                        <tr>
                            <td> {{ $niveau->nom }} </td>
                            <td> {{ $niveau->eloMin }} </td>
                            <td> {{ $niveau->eloMax }} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection