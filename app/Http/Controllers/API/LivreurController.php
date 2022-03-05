<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LivreursResource;
use App\Models\Shop\Livreur;
use Illuminate\Http\Request;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livreurs = Livreur::all();
        return response([ 'livreurs' => LivreursResource::collection($livreurs), 'message' => 'Retrieved successfully'],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $livreur = Livreur::create($request);

        return response(['livreur' => new LivreursResource($livreur), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livreur  $Livreur
     * @return \Illuminate\Http\Response
     */
    public function show($livreur)
    {
        return response(['livreur' => new LivreursResource($livreur), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livreur  $Livreur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livreur $livreur)
    {
        $livreur->update($request->all());

        return response(['livreur' => new LivreursResource($livreur), 'message' => 'Update successfully'], 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livreur  $Livreur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livreur $livreur)
    {
        $livreur->delete();

        return response(['message' => 'Deleted successfully']);
    }
}

