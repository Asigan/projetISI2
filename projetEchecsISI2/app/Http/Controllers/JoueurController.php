<?php

namespace App\Http\Controllers;

use App\Models\Joueur;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        return view('joueurs', compact('joueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaux = Niveau::all();
        return view('create_joueur', compact('niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('joueurs')->insert([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'nationalite' => $request->nationalite,
            'niveau_id' => $request->niveau
        ]);
        return view('confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        $parties = $joueur->with('parties1')->get();
        $niveau = $joueur->niveau;
        return view('joueur', compact('joueur', 'parties', 'niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        return view('edit', compact('joueur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        $joueur->update($request->all());
        return redirect()->back()->with('info', 'le joueur a bien été modifié dans la base de données');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        $joueur->delete();
        return back()->with('info', 'le joueur a été correctement supprimé de la base de données');
    }
}
