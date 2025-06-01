<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\SalaInformatica;
use App\Mail\TurnoConfirmado;
use Illuminate\Support\Facades\Mail;





class TurnoController extends Controller
{

public function enviar($id)
{
    $turno = Turno::with('sala')->findOrFail($id);

    // Asegurate que el turno tenga email o lo busques de alguna relación
    $email = $turno->email;

    if ($email) {
        Mail::to($email)->send(new TurnoConfirmado($turno));
        return back()->with('success', 'Turno enviado por correo.');
    } else {
        return back()->with('error', 'El turno no tiene correo asignado.');
    }
}


    public function create()
    {
    $turnos = Turno::with('sala')->get();
    $salas = SalaInformatica::all(); // Obtiene todas las salas
    
    return view('turnos.create', compact('turnos', 'salas'));

        
    }

    
    
    public function store(Request $request)
    {
        $request->validate([
            'nro_turno' => 'required|integer',
            'profesor' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'entrada' => 'required',
            'salida' => 'required',
            'fecha' => 'required|date',
            'sala_informatica_id' => 'required|exists:sala_informaticas,id',
        ]);
               
                $existe = Turno::where('fecha', $request->fecha)
    ->where('sala_informatica_id', $request->sala_informatica_id)
    ->where(function ($query) use ($request) {
        $query->where('entrada', '<', $request->salida)
              ->where('salida', '>', $request->entrada);
    })
    ->exists();
            if ($existe) {
                return redirect()->back()->with('error', 'El horario ya está ocupado por otro turno.');
            }   
                Turno::create($request->all());
                return redirect()->route('turnos.create')->with('success', 'Turno solicitado con éxito!');
          
    }

    
    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();
    
        return redirect()->route('turnos.create')->with('success', 'Turno eliminado correctamente.');
    }
public function edit(Request $request, Turno $turno)
{
    $validated = $request->validate([
        'nro_turno' => 'required|integer',
        'profesor' => 'required|string',
        'carrera' => 'required|string',
        'email' => 'required|email',
        'entrada' => 'required',
        'salida' => 'required',
        'fecha' => 'required|date',
        'sala_informatica_id' => 'required|exists:sala_informaticas,id',
    ]);

    $turno->update($validated);

    return redirect()->route('turnos.create')->with('success', 'Turno actualizado con éxito');
}

}