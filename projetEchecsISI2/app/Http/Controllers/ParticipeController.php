<?php

namespace App\Http\Controllers;

use App\Models\Participe;
use Illuminate\Http\Request;

class ParticipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Participe::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participe  $participe
     * @return \Illuminate\Http\Response
     */
    public function show(Participe $participe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participe  $participe
     * @return \Illuminate\Http\Response
     */
    public function edit(Participe $participe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participe  $participe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participe $participe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participe  $participe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participe $participe)
    {
        //
    }
}
