<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documento extends Model
{
    use HasFactory;

    public function list($dtInicio, $dtFim)
    {
      $inicio = date( "Y-m-d", strtotime($dtInicio) );
      $fim = date( "Y-m-d", strtotime($dtFim) );

      return DB::table('documento')
      ->select('documento.iddocumento', 'documento.nu_documento', 'documento.nu_documento_privado', 'documento.dsc_ementa', 'documento.dsc_conteudo', 'documento.dt_hr_publicacao')
      ->where('documento.dt_hr_publicacao', '>=', $inicio)
      ->where('documento.dt_hr_publicacao', '<=', $fim)
      ->paginate(10);
    }

    public function findById($id)
    {
      return DB::table('documento')
      ->select('documento.iddocumento', 'documento.nu_documento', 'documento.nu_documento_privado', 'documento.dsc_ementa', 'documento.dsc_conteudo', 'documento.dt_hr_publicacao')
      ->where('documento.iddocumento', '=', $id)
      ->get();
    }


}
