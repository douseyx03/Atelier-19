<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatureRequest;
use App\Http\Requests\UpdateCandidatureRequest;
use App\Models\Candidature;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Candidature::where('estArchive', false)->get());
    }

    public function candidatureEnvoyer()
    {
        $demandes = Candidature::join('users', 'candidatures.formateur_id', '=', 'users.id')
            ->where('candidat_id', Auth::user()->id)
            ->get();

        return response()->json($demandes);
    }

    public function candidatureRecu()
    {
        $demandes = Candidature::join('users', 'demandes.candidat_id', '=', 'users.id')
            ->where('formateur_id', Auth::user()->id)
            ->get();

        return response()->json($demandes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidatureRequest $request)
    {
        $candidature = new candidature();
        $candidature->formateur_id ;
        $candidature->candidat_id = Auth::user()->id;
        $candidature->save();

        return response()->json($candidature);    
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        return response()->json($candidature);
    }

    public function accepterCandidature(Candidature $candidature)
    {
        $candidature->est_accepter = true;
        $candidature->update();

        return response()->json($candidature);
    }

    public function refuserCandidature(Candidature $candidature)
    {
        $candidature->est_accepter = false;
        $candidature->update();

        return response()->json($candidature);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidatureRequest $request, Candidature $candidature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        $candidature->est_archiver = true;
        $candidature->update();

        return response()->json("votre candidature est annulee avec success");    }
}
