<?php

namespace App\Http\Controllers;

use App\Models\Tournoi;
use App\Models\Niveau;
use App\Models\Organisateur;
use App\Models\Joueur;
use App\Http\Requests\TournoiRequest;
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
    public function store(TournoiRequest $request)
    {
        DB::table('tournois')->insert([
            'nom' => $request->nom,
            'date' => $request->date,
            'adresse' => $request->adresse,
            'classement' => $request->classement,
            'niveau_id' => $request->niveau_id,
            'organisateur_id' => $request->organisateur_id
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
        $joueursnoninscrits = new Joueur;

        $exception = $tournoi->joueurs->pluck('id')->toArray();
        $joueursNonInscrits = $joueursnoninscrits->whereNotIn('id', $exception)->get();
        
        return view('tournoi', compact('tournoi', 'organisateur', 'niveau', 'joueursNonInscrits'));
    }

    public function showJoueurs(Tournoi $tournoi)
    {
        $organisateur = $tournoi->organisateur;

        $joueursnoninscrits = new Joueur;
        $exception = $tournoi->joueurs->pluck('id')->toArray();
        $joueursNonInscrits = $joueursnoninscrits->whereNotIn('id', $exception)->get();
        
        return view('joueurs_tournoi', compact('tournoi','organisateur', 'joueursNonInscrits'));
    }

    public function showParties(Tournoi $tournoi)
    {
        $organisateur = $tournoi->organisateur;
        $parties = $tournoi->parties;
        $joueurs = $tournoi->joueurs;
        return view('parties_tournoi', compact('tournoi','organisateur', 'joueurs', 'parties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournoi $tournoi)
    {
        $niveaux = Niveau::all();
        $organisateurs = Organisateur::all();
        return view('edit_tournoi', compact('tournoi', 'niveaux', 'organisateurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournoi  $tournoi
     * @return \Illuminate\Http\Response
     */
    public function update(TournoiRequest $request, Tournoi $tournoi)
    {
        $tournoi->update($request->all());
        return redirect()->back()->with('info', 'Le tournoi a bien ??t?? modifi?? dans la base de donn??es');
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
        return back()->with('info', 'Le tournoi a ??t?? correctement supprim?? de la base de donn??es');
    }
}
