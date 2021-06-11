<?php

namespace App\Http\Controllers;

use App\Models\Partie;
use App\Models\Joueur;
use App\Models\Tournoi;
use App\Models\Participe;
use Illuminate\Http\Request;

class PartieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Partie::all();
        return view('parties', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $joueurs = Joueur::all();
        $tournois = Tournoi::all();
        return view('create_partie', compact('joueurs', 'tournois'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Partie::create($request->all());
        return view('confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function show(Partie $party)
    {
        $participe = Participe::All();
        return view('partie', compact('party', 'participe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function edit(Partie $partie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partie $partie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partie $party)
    {
        $party->delete();
        return back()->with('info', 'La partie a été correctement supprimé de la base de données');
    }
}
