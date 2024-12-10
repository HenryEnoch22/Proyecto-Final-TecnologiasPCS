<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups, 200);
    }

    /**
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
            'id' => 'required|numeric'
            ,'educational_experience_id' => 'required|numeric'
            ,'student_id' => 'required|numeric'
            ,'shift' => 'required|string|max:5'
            ,'period' => 'required|string|max:45'
            ,'student_grade' => 'nullable|numeric'
        ]);

        $group = Group::create([
            'id' => $request->id
            ,'educational_experience_id' => $request->educational_experience_id
            ,'student_id' => $request->student_id
            ,'shift' => $request->shift
            ,'period' => $request->period
            ,'student_grade' => $request->student_grade
        ]);

        return response()->json([
            'message' => 'Alumno registrado en el grupo exitosamente'
            ,'data' => $group
        ],201);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $groupRequested)
    {
        $group = Group::findOrFail($groupRequested);
        $request->validate([
            'id' => 'required|numeric'
            ,'educational_experience_id' => 'required|numeric'
            ,'student_id' => 'required|numeric'
            ,'shift' => 'required|string|max:5'
            ,'period' => 'required|string|max:45'
            ,'student_grade' => 'nullable|numeric'
        ]);

        $group->update([
            'id' => $request->id
            ,'educational_experience_id' => $request->educational_experience_id
            ,'student_id' => $request->student_id
            ,'shift' => $request->shift
            ,'period' => $request->period
            ,'student_grade' => $request->student_grade
        ]);


        return response()->json([
            'message' => 'Se ha editado el registro del alumno en el curso'
            ,'data' => $group
        ],201);



    }

    public function assignGrade(Request $grade, $groupRequested){
        $group = Group::findOrFail($groupRequested);
        $grade->validate([
            'grade' => 'required|numeric'
        ]);

        $group->update(['student_grade' => $grade->grade]);

        return response()->json([
            'message' => 'Se ha asignado la calificacion al alumno elegido'
            ,'data' => $group
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($groupRequested)
    {
        $group = Group::findOfFail($groupRequested);
        $group->delete();

        return response()->json([
            'message' => 'Se ha dado de baja al alumno del grupo'
            ,'data' => $group
        ],201);
    }
}
