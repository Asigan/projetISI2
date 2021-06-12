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
    <form action="{{ route('tournois.create') }}" method="get">
        <button class="btn btn-success" type="submit">Ajouter un tournoi</button>
    </form>
</div>

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici nos tournois</h5>
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
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($tournois as $tournoi)
                        <tr>
                            <td> {{ $tournoi->nom }} </td>
                            <td> {{ $tournoi->date }} </td>
                            <td><a class="btn btn-primary" href="{{route('tournois.show', $tournoi->id) }}">Voir</a></td>
                            <td><a class="btn btn-warning" href="{{route('tournois.edit', $tournoi->id) }}">Modifier</a></td>
                            <td>
                                <form action="{{ route('tournois.destroy', $tournoi->id) }}" method="post">
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