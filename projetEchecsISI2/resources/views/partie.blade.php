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
            <h5 class="card-header-title">{{ $partie }} vs. {{ $partie }}</h5>
        </header>
        <div class="card-content">
            <div class="content">
            </div>
        </div>
    </div>
@endsection