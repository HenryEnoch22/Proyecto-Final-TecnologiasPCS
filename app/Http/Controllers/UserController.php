<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users, 201);
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
            'roleId' => 'required|numeric',
            'matricula' => 'required|max:12',
            'nombre' => 'required|string',
            'apellido'=> 'required|string',
            'apellidoMaterno' => 'required|string',
            'correo' => 'required|email|string',
            'contrasena'=> 'required|string',
            'carreraUniversitaria' => 'nullable|string',
        ]);

        $user = User::create([
            'role_id' => $request->roleId,
            'tuition'=>$request->matricula,
            'name'=>$request->nombre,
            'last_name'=>$request->apellido,
            'mother_last_name'=>$request->apellidoMaterno,
            'email'=>$request->correo,
            'password'=>Hash::make($request->contrasena),
            'university_career'=>$request->carreraUniversitaria,
        ]);

        return response()->json([
            'message' => 'Usuario dado de alta exitosamente',
            'data' => $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        return response()->json($user, 201);

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
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);

        $request->validate([
            'roleId' => 'required|numeric',
            'matricula' => 'required|max:12',
            'nombre' => 'required|string',
            'apellido'=> 'required|string',
            'apellidoMaterno' => 'required|string',
            'correo' => 'required|email|string',
            'contrasena'=> 'required|string',
            'carreraUniversitaria' => 'nullable|string',
        ]);

        $user->update([
            'role_id' => $request->roleId,
            'tuition'=>$request->matricula,
            'name'=>$request->nombre,
            'last_name'=>$request->apellido,
            'mother_last_name'=>$request->apellidoMaterno,
            'email'=>$request->correo,
            'password'=>Hash::make($request->contrasena),
            'university_career'=>$request->carreraUniversitaria,
        ]);

        return response()->json([
            'message' => 'Usuario editado exitosamente.',
            'user' => $user
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user = User::findOfFail($user);
        $user->delete();

        return response()->json([
            'message' => 'Se ha eliminado el usuario.'
        ],201);
    }
}
