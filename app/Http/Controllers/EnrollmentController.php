<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return response()->json($enrollments,200); 
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
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
            ,'student_id' => 'required|numeric'
            , 'group_id' => 'required|numeric'
            , 'student_grade' => 'nullable|numeric'
        ]);

        $enrollments = Enrollment::create([
            'id' => $request->id
            ,'student_id' => $request->student_id
            , 'group_id' => $request->group_id
            , 'student_grade' => $request->student_grade
        ]);

        return response()->json([
            'message' => 'Inscripcion realizada correctamente'
            , 'data' => $enrollments
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($enrollment)
    {
        $enrollmentShowed = Enrollment::findOrFail($enrollment);
        return response()->json(['data' => $enrollmentShowed],201);
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
    public function update(Request $request, $enrollmentRequested)
    {
        $enrollment = Enrollment::findOrFail($enrollmentRequested);
        $request->validate([
            'id' => 'required|numeric'
            ,'student_id' => 'required|numeric'
            , 'group_id' => 'required|numeric'
            , 'student_grade' => 'nullable|numeric'
        ]);

        $enrollment->update([
            'id' => $request->id
            ,'student_id' => $request->student_id
            , 'group_id' => $request->group_id
            , 'student_grade' => $request->student_grade
        ]);

        return response()->json([
            'message' => 'Inscripcion actualizada correctamente'
            , 'data' => $enrollment
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($enrollmentRequested)
    {
        $enrollment = Enrollment::findOrFail($enrollmentRequested);

        $enrollment->delete();

        return response()->json([
            'message' => 'Se ha dado de baja la inscripcion'
            , 'data' => $enrollment
        ], 201);
    }

    public function assignGrade(Request $grade, $enrollmentRequested){
        $enrollment = Enrollment::findOrFail($enrollmentRequested);

        $grade->validate(['grade' => 'required|numeric']);

        $enrollment->update(['student_grade' => $grade->student_grade]);

        return response()->json([
            'message' => 'Se ha asignado la calificacion a un alumno'
            , 'data' => $enrollment
        ], 201);

    }
}
