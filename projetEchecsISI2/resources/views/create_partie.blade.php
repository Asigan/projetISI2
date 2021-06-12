@extends('layout')

@section('contenu')
@auth
<br>
    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif
    <h5>Cette page a été supprimée...</h5>
@else
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4>Vous n'avez pas accès à cette page.</h4>
            <br>
            <p>Connectez-vous ou inscrivez-vous dans la barre du haut</p>
        </div>
    </div>
@endauth
@endsection