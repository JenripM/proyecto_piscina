<?php
use App\Http\Controllers\DiaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\PiscinaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\MontoController;
use App\Http\Controllers\MontoDescuentoController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AnulacionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
 return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




// Route::get('/dashboard', function () {
//  return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';


/*SECCION CARGO*/
Route::resource("cargo",CargoController::class);
Route::get("cargo/{id}/confirmar",[CargoController::class,"confirmar"])->name('cargo.confirmar');
Route::get("cancelar/cargo",function(){
    return redirect()->route('cargo.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.cargo');


/*SECCION DIAS*/
Route::resource("dia",DiaController::class);
Route::get("dia/{id}/confirmar",[DiaController::class,"confirmar"])->name('dia.confirmar');
Route::get("cancelar/dia",function(){
    return redirect()->route('dia.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.dia');


/*SECCION PERSONAL*/
Route::resource("personal",PersonalController::class);
Route::get("personal/{id}/confirmar",[PersonalController::class,"confirmar"])->name('personal.confirmar');
Route::get("cancelar/personal",function(){
    return redirect()->route('personal.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.personal');


/*SECCION PERIODO */
Route::get("periodo/{id}/activar",[PeriodoController::class,"activar"])->name('periodo.activar');
Route::resource("periodo",PeriodoController::class);
Route::get("periodo/{id}/confirmar",[PeriodoController::class,"confirmar"])->name('periodo.confirmar');
Route::get("cancelar/periodo",function(){
    return redirect()->route('periodo.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.periodo');


/*SECCION TURNO */
Route::resource("turno",TurnoController::class);
Route::get("turno/{id}/confirmar",[TurnoController::class,"confirmar"])->name('turno.confirmar');
Route::get("cancelar/turno",function(){
    return redirect()->route('turno.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.turno');


/*SECCION PISCINA */
Route::resource("piscina",PiscinaController::class);
Route::get("piscina/{id}/confirmar",[PiscinaController::class,"confirmar"])->name('piscina.confirmar');
Route::get("cancelar/piscina",function(){
    return redirect()->route('piscina.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.piscina');


/*SECCION NIVEL */
Route::resource("nivel",NivelController::class);
Route::get("nivel/{id}/confirmar",[NivelController::class,"confirmar"])->name('nivel.confirmar');
Route::get("cancelar/nivel",function(){
    return redirect()->route('nivel.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.nivel');


/*SECCION PROGRAMACION*/
Route::resource("programacion",ProgramacionController::class);
Route::get("programacion/{id}/confirmar",[ProgramacionController::class,"confirmar"])->name('programacion.confirmar');
Route::get("cancelar/programacion",function(){
    return redirect()->route('programacion.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.programacion');


/*SECCION MONTO*/
Route::resource("monto",MontoController::class);
Route::get("monto/{id}/confirmar",[MontoController::class,"confirmar"])->name('monto.confirmar');
Route::get("cancelar/monto",function(){
    return redirect()->route('monto.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.monto');

/*SECCION DESCUENTO */
Route::resource("descuento",MontoDescuentoController::class);
Route::get("descuento/{id}/confirmar",[MontoDescuentoController::class,"confirmar"])->name('descuento.confirmar');
Route::get("cancelar/descuento",function(){
    return redirect()->route('descuento.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.descuento');




/*SECCION VACANTE*/
Route::resource("vacante",VacanteController::class);
Route::get("vacante/{id}/confirmar",[VacanteController::class,"confirmar"])->name('vacante.confirmar');
Route::get("cancelar/vacante",function(){
    return redirect()->route('vacante.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.vacante');


/*SECCION VOUCHER*/
Route::get("voucher/{id}",[VoucherController::class,"create2"])->name('voucher.create2');
Route::resource("voucher",VoucherController::class);
Route::get("voucher/{id}/confirmar",[VoucherController::class,"confirmar"])->name('voucher.confirmar');
Route::get("cancelar/voucher",function(){
    return redirect()->route('voucher.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.voucher');

/*SECCION CLIENTE */
Route::post("cliente/registtrar",[ClienteController::class,"store2"])->name('cliente.store2');
Route::resource("cliente",ClienteController::class);
Route::get("cliente/{id}/confirmar",[ClienteController::class,"confirmar"])->name('cliente.confirmar');
Route::get("cancelar/cliente",function(){
    return redirect()->route('cliente.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.cliente');

/*SECCION  MATRCULA */
Route::resource("matricula",MatriculaController::class);
//Route::get("matricula/{id}/confirmar",[MatriculaController::class,"confirmar"])->name('matricula.confirmar');
Route::get("cancelar/matricula",function(){
    return redirect()->route('matricula.index')->with('datos','Acción Cancelada...!');
})->name('cancelar.matricula');

/*SECCION  ANULACIÓN */
Route::get("matricula/{id}/anular",[AnulacionController::class,"confirmaranulacion"])->name('matricula.anular');
Route::post("matricula/{id}/anulacion",[AnulacionController::class,"anulacion"])->name('anulacion');

Route::get("anulacion/{id}/eliminar",[AnulacionController::class,"eliminar"])->name('anulacion.eliminar');

Route::resource("anulacion",AnulacionController::class);

/*SECCION  USUAIRO */
Route::get("usuario/{id}/perfil",[UsuarioController::class,"perfil"])->name('usuario.perfil');
Route::resource("usuario",UsuarioController::class);





