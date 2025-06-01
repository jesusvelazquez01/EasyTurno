<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\SalaInformatica;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
public function dashboard()
{
$hoy = Carbon::today();
    $salas = SalaInformatica::all();
    $turnos = Turno::with('sala')
        ->whereDate('fecha', Carbon::today()) // Solo turnos de hoy
        ->orderBy('entrada')
        ->get();

    return view('dashboard', compact( 'salas','turnos'));
}




}
