<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use App\Models\Tournoi;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisateurs = Organisateur::all();
        return view('organisateurs', compact('organisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_organisateur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Organisateur::create($request->all());
        return view('confirm');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Organisateur $organisateur)
    {
        $tournois = Tournoi::all();
        return view('organisateur', compact('organisateur', 'tournois'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisateur $organisateur)
    {
        return view('edit', compact('organisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisateur $organisateur)
    {
        $organisateur->update($request->all());
        return redirect()->back()->with('info', "L'organisateur a bien été modifié dans la base de données");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisateur  $organisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisateur $organisateur)
    {
        $organisateur->delete();
        return back()->with('info', "L'organisateur a été correctement supprimé de la base de données");
    }
}
