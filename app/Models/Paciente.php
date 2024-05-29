<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'paciente';

    protected $fillable = ['nome', 'dtnasc', 'sexo'];

    public function listaPacientes($name) {

        if (!$name) {
            return DB::table('paciente')->get();
        }

        $paciente = DB::table('paciente')->where('name', 'LIKE', "%{$name}%")->get();
        return $paciente;

    }


}
