<?php

namespace App\Http\Controllers;

use App\Models\SalaInformatica;
use Illuminate\Http\Request;

class SalaInformaticaController extends Controller
{
  

    public function index()
    {
        $salas = SalaInformatica::all();
        return view('salas.create', compact('salas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'equipos' => 'required|integer|min:0',
        ]);
    
        SalaInformatica::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'equipos' => $request->equipos,
            'disponibilidad' =>$request->disponibilidad,
        ]);
    
        return redirect()->route('salas.create')->with('success', '¡Sala registrada correctamente!');
    }
    public function edit(Request $request, SalaInformatica $sala)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'equipos' => 'required|integer',
            'disponibilidad' => 'required|string',
        ]);

        $sala->update($request->all());

        return redirect()->route('salas.create')->with('success', 'Sala actualizada correctamente.');
    }

    public function destroy(SalaInformatica $sala)
    {
        $sala->delete();

        return redirect()->route('salas.create')->with('success', 'Sala eliminada correctamente.');
    }
}
