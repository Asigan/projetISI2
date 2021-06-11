<?php

namespace App\Http\Controllers;

use App\Models\Tournoi;
use App\Models\Niveau;
use App\Models\Organisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TournoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournois = Tournoi::all();
        return view('tournois', compact('tournois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveaux = Niveau::all();
        $organisateurs = Organisateur::all();
        return view('create_tournoi', compact('niveaux', 'organisateurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tournois')->insert([
            'nom' => $request->nom,
            'date' => $request->date,
            'adresse' => $request->adresse,
            'classement' => $request->classement,
            'niveau_id' => $request->niveau,
            'organisateur_id' => $request->organisateur
        ]);
        return view('confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function show(Tournoi $tournoi)
    {
        $organisateur = $tournoi->organisateur;
        $niveau = $tournoi->niveau;
        return view('tournoi', compact('tournoi', 'organisateur', 'niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournoi $tournoi)
    {
        return view('edit', compact('tournoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournoi $tournoi)
    {
        $tournoi->update($request->all());
        return redirect()->back()->with('info', 'Le tournoi a bien été modifié dans la base de données');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournoi $tournoi)
    {
        $tournoi->delete();
        return back()->with('info', 'Le tournoi a été correctement supprimé de la base de données');
    }
}
