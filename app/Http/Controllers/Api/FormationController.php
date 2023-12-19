<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use App\Models\Formation;
use App\Http\Controllers\Controller;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Formation::where('est_archiver', false)->get());

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
    public function store(StoreFormationRequest $request)
    {
        $formation = Formation::create($request->validated());
    
        return response()->json([
        'message' => 'Formation created successfully.',
        'formation' => $formation
        ]);
        // $validatedData = $request->validated();

        // Formation::create([
        //     'libele' => $request->libele,
        //     'description' => $request->description,
        //     'duree' => $request->duree
        // ]);
        // $formation = new Formation();
        // $formation->libele = $validatedData['libele'];
        // $formation->description = $validatedData['description'];
        // $formation->duree = $validatedData['duree'];
        // $formation->save($validatedData);
    
        // return response()->json();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        $formation = Formation::find($formation);

        return response()->json($formation);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormationRequest $request, Formation $formation)
    {
        $request->validated($request->all());

        
        $formation->libele =  $request->get('libele');
        $formation->description = $request->get('description');
        $formation->duree = $request->get('duree');
        $formation->update();
       
        return response()->json($formation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        
        $formation->est_archiver = true;
        $formation->update();

        return response()->json($formation);
    }
}
