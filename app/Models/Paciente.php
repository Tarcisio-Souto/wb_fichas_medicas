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

    public function ficha() {

        return $this->belongsTo(Ficha::class);

    }

    public function listaPacientes($name) {

        if (!$name) {
            return DB::table('paciente as pac')
            ->select('pac.id',
                     'pac.nome',
                     'pac.dtnasc',
                     'pac.sexo',
                     'fic.dtvisita'
            )
            ->join('ficha as fic', 'fic.paciente_id', '=', 'pac.id')->get();
        }

        $paciente = DB::table('paciente as pac')
        ->select('pac.id',
                 'pac.nome',
                 'pac.dtnasc',
                 'pac.sexo',
                 'fic.dtvisita'
        )
        ->join('ficha as fic', 'fic.paciente_id', '=', 'pac.id')
        ->where('name', 'LIKE', "%{$name}%")->get();
        return $paciente;

    }


}
