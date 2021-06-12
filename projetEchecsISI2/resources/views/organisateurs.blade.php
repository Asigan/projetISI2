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
    <form action="{{ route('organisateurs.create') }}" method="get">
        <button class="btn btn-success" type="submit">Ajouter un organisateur</button>
    </form>
</div>
@endauth

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici nos organisateurs</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($organisateurs as $organisateur)
                        <tr>
                            <td> {{ $organisateur->nom }} </td>
                            <td><a class="btn btn-primary" href="{{route('organisateurs.show', $organisateur->id) }}">Tournois</a></td>
                            @auth
                            <td>
                                <form action="{{ route('organisateurs.destroy', $organisateur->id) }}" method="post">
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