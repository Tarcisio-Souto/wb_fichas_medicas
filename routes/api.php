<?php

use App\Http\Controllers\API\{
    PacienteController,
    FichaController,
    JsonController,
    XmlController
};
use Illuminate\Support\Facades\Route;


Route::apiResource('paciente', PacienteController::class);
Route::apiResource('ficha', FichaController::class);

Route::post('enviar-json', [JsonController::class, 'storeJson']);
Route::post('enviar-xml', [XmlController::class, 'storeXml']);

/*Route::get('/', function () {
    return response()->json(['success' => 'Bem-vindo(a) =)']);
});*/