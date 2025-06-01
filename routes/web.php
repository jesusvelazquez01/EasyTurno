<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\SalaInformaticaController;
//Routes de salas permiten crear, editar, eliminar y ver salas
Route::get('/salas/create', [SalaInformaticaController::class, 'index'])->name('salas.create');//este router es el que permite ver las salas
Route::post('/salas/create', [SalaInformaticaController::class, 'store'])->name('salas.store');//este router es el que permite guardar una sala
Route::put('/salas/{sala}/', [SalaInformaticaController::class, 'edit'])->name('salas.edit');//este router es el que permite editar una sala
Route::delete('/salas/create/{sala}', [SalaInformaticaController::class, 'destroy'])->name('salas.destroy');//este router es el que permite eliminar una sala
//Routes de turnos permiten crear, editar, eliminar y ver turnos



//Este router permite modificar un turno 
Route::get('/turnos/create', [TurnoController::class, 'create'])->name('turnos.create'); //este router es el que permite listar los turnos|
Route::post('/turnos/create', [TurnoController::class, 'store'])->name('turnos.store');//este router es el que permite guardar un turno
Route::put('/turnos/{turno}', [TurnoController::class, 'edit'])->name('turnos.edit');//este router es el que permite editar un turno
Route::delete('/turnos/{turno}', [TurnoController::class, 'destroy'])->name('turnos.destroy'); //este router es el que permite eliminar un turno
Route::post('/turnos/enviar/{id}', [TurnoController::class, 'enviar'])->name('turnos.enviar'); //este router es el que permite enviar un turno por correo


//Ruta para mostrar el dashboard con las salas y turnos del día
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');



require __DIR__.'/auth.php';
//