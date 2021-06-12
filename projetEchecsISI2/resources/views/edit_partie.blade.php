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
            <p class="card-text"> {{ session('info') }} </p>
        </div>
    </div>
@endif

<div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Voici les parties du tournoi</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Joueur 1</th>
                        <th>Joueur 2</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <form action="{{ route('parties.update', $party->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <br>
                            <td class="form-group">
                                
                                <select name="joueur1_id" id="joueur1_id" size="1">
                                    @if($party->statut>0)
                                        <option value="{{ $party->joueur1_id }}" selected>{{ $party->joueur1->nom}} {{ $party->joueur1->prenom}} </option>
                                    @else
                                        @foreach($joueurs as $joueur)
                                            <option value="{{ $joueur->id }}"
                                            @if($joueur->id==$party->joueur1_id)
                                                selected
                                            @endif 
                                            >{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                                        @endforeach
                                    @endif 
                                </select>
                                
                                @error('joueur1_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="form-group">
                                <select name="joueur2_id" id="joueur2_id" size="1">
                                    @if($party->statut>0)
                                    <option value="{{ $party->joueur2_id }}" selected>{{ $party->joueur2->nom}} {{ $party->joueur2->prenom}} </option>
                                    @else 
                                
                                        @foreach($joueurs as $joueur)
                                            <option value="{{ $joueur->id }}"
                                            @if($joueur->id==$party->joueur2_id)
                                                selected
                                            @endif 
                                            >{{ $joueur->nom }} {{ $joueur->prenom }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('statut')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="form-group">
                                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date', $party->date) }}" placeholder="Date de la partie" 
                                @if($party->statut>0)
                                    readonly
                                @endif
                                >
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="form-group">
                                <select name="statut" id="statut" size="1">
                                    <option value="0" 
                                    @if($party->statut == 0)
                                        selected 
                                    @endif
                                    >Plannifiée </option>
                                    <option value="1" 
                                    @if($party->statut == 1)
                                        selected 
                                    @endif
                                    >{{$party->joueur1->nom}} {{$party->joueur1->prenom}} victorieux</option>
                                    <option value="2" 
                                    @if($party->statut == 2)
                                        selected 
                                    @endif
                                    >{{$party->joueur2->nom}} {{$party->joueur2->prenom}} victorieux</option>
                                    <option value="3" 
                                    @if($party->statut == 3)
                                        selected 
                                    @endif
                                    >Nulle</option>
                                    <option value="4" 
                                    @if($party->statut == 4)
                                        selected 
                                    @endif
                                    >Annulée </option>
                                </select>
                                @error('statut')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </td>
                            <td>
                                <input type="hidden" name="tournoi_id" id="tournoi_id" value="{{ $tournoi->id }}" />
                                <button type="submit" class="btn btn-secondary">Modifier</button>
                            </td>
                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection