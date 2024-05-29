<?php

use App\Http\Controllers\API\{
    PacienteController,
    FichaController
};
use Illuminate\Support\Facades\Route;


Route::apiResource('paciente', PacienteController::class);
Route::apiResource('ficha', FichaController::class);


Route::get('/', function () {
    return response()->json(['success' => 'Bem-vindo(a) =)']);
});