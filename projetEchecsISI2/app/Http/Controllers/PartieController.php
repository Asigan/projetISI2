<?php

namespace App\Http\Controllers;

use App\Models\Partie;
use App\Models\Joueur;
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
        return view('create_partie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partie  $partie
     * @return \Illuminate\Http\Response
     */
    public function show(Partie $partie)
    {
        return view('partie', compact('partie'));
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
    public function destroy(Partie $partie)
    {
        //
    }
}
