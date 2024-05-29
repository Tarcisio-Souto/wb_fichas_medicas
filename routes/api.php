<?php

use App\Http\Controllers\API\{
    PacienteController,
    FichaController,
    JsonController
};
use Illuminate\Support\Facades\Route;


Route::apiResource('paciente', PacienteController::class);
Route::apiResource('ficha', FichaController::class);

Route::post('enviar-json', [JsonController::class, 'storeJson']);

Route::get('/', function () {
    return response()->json(['success' => 'Bem-vindo(a) =)']);
});