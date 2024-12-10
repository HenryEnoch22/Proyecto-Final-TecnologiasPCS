<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Group;

class GroupControlller extends Controller
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
            ,'teacher_id' => 'required|numeric'
            ,'shift' => 'required|string|max:12'
            ,'period' => 'required|string|max:45'
        ]);

        $group = Group::create([
            'id' => $request->id
            ,'educational_experience_id' => $request->educational_experience_id
            ,'teacher_id' => $request->student_id
            ,'shift' => $request->shift
            ,'period' => $request->period
        ]);

        return response()->json([
            'message' => 'Grupo creado exitosamente'
            ,'data' => $group
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($group)
    {
        $groupShowed = Group::findOrFail($group);
        return response()->json(['data' => $groupShowed], 201);
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
            ,'teacher_id' => 'required|numeric'
            ,'shift' => 'required|string|max:12'
            ,'period' => 'required|string|max:45'
        ]);

        $group->update([
            'id' => $request->id
            ,'educational_experience_id' => $request->educational_experience_id
            ,'student_id' => $request->teacher_id
            ,'shift' => $request->shift
            ,'period' => $request->period
        ]);


        return response()->json([
            'message' => 'Se ha editado el grupo'
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
            'message' => 'Se ha eliminado el grupo'
            ,'data' => $group
        ],201);
    }
}
