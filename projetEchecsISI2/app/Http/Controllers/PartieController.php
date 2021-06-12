<?php

namespace App\Http\Controllers;

use App\Models\Partie;
use App\Models\Joueur;
use App\Models\Tournoi;
use App\Models\Participe;
use App\Http\Requests\PartieRequest;

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
    public function store(PartieRequest $request)
    {
        Partie::create($request->all());
        return redirect()->back()->with('info', 'le changement a bien été effectué');
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
        $status = $party->status();
        return view('partie', compact('party', 'participe', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function edit(Partie $party)
    {
        $tournoi = $party->tournoi;
        $joueurs = $tournoi->joueurs;
        return view('edit_partie', compact('party', 'tournoi', 'joueurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function update(PartieRequest $request, Partie $party)
    {
        $party->update([
            'date'=>$request->date,
            'statut'=> $request->statut,
            'joueur1_id' => $request->joueur1_id,
            'joueur2_id' => $request->joueur2_id,
            'tournoi_id' => $request->tournoi_id
        ]);
        return redirect()->back()->with('info', 'La modification a bien été effectuée');
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
