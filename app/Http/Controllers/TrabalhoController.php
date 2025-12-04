<?php

namespace App\Http\Controllers;

use App\Models\Trabalho;
use Illuminate\Http\Request;

class TrabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabalho = trabalho::all();
        
        return view('trabalho.index',['trabalhos' => $trabalho]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trabalho.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacao = $request->validate([
            'name' => 'required|string|min:8',
            'description' => 'required|string|min:15']); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Trabalho $trabalho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabalho $trabalho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabalho $trabalho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabalho $trabalho)
    {
        //
    }
}
