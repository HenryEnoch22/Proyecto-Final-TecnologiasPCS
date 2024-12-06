<?php

namespace App\Http\Controllers;

use App\Models\EducationalExperience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EducationalExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationalExperiences = EducationalExperience::all();
        return response()->json($educationalExperiences, 200);
    }

    /**
     * //
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'maestroID' => 'required|numeric',
            'nrc' => 'required|string|max:5',
            'nombre' => 'required|string',
            'modalidad' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $educationalExperience = EducationalExperience::create([
            'teacher_id' => $request->maestroID,
            'nrc' => $request->nrc,
            'name' => $request->nombre,
            'modality' => $request->modalidad,
            'description' => $request->descripcion,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json([
           'message' => "Experiencia educativa creada exitosamente",
            'data' => $educationalExperience,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $educationalExperience)
    {
        $educationalExp = EducationalExperience::findOrFail($educationalExperience);
        $request->validate([
            'maestroID' => 'required|numeric',
            'nrc' => 'required|string|max:5',
            'nombre' => 'required|string',
            'modalidad' => 'required|string',
            'descripcion' => 'nullable|string'
        ]);

        $educationalExp->update([
            'teacher_id' => $request->maestroID,
            'nrc' => $request->nrc,
            'name' => $request->nombre,
            'modality' => $request->modalidad,
            'description' => $request->descripcion,
            'updated_at' => Carbon::now(),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json([
            'message' => "Experiencia editada exitosamente",
            'data' => $educationalExp,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($educationalExperience)
    {
        $educationalExp = EducationalExperience::findOrFail($educationalExperience);
        $educationalExp->delete();

        return response()->json([
            'message' => 'Experiencia educativa eliminada exitosamente'
        ], 201);

    }
}
