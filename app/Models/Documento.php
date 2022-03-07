<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documento extends Model
{
    use HasFactory;

    public function list($data)
    {
      $inicio = date( "Y-m-d", strtotime($data['dtInicio']) );
      $fim = date( "Y-m-d", strtotime($data['dtFim']) );

      $query = DB::table('documento')
                ->select('documento.iddocumento', 'documento.nu_documento', 'documento.nu_documento_privado', 'documento.dsc_ementa', 'documento.dsc_conteudo', 'documento.dt_hr_publicacao')
                ->where('documento.dt_hr_publicacao', '>=', $inicio)
                ->where('documento.dt_hr_publicacao', '<=', $fim);
      
      if ( $data['tipoDocumento'] ) {
        $query->where('documento.tipo_documento_id', '=', $data['tipoDocumento']);
      }

      if ( $data['unidade'] ) {
        $query->where('documento.unidade_id', '=', $data['unidade']);
      }
      
      return $query->paginate(20)->appends(request()->query());
    }

    public function findById($id)
    {
      return DB::table('documento')
      ->select('documento.iddocumento', 'documento.nu_documento', 'documento.nu_documento_privado', 'documento.dsc_ementa', 'documento.dsc_conteudo', 'documento.dt_hr_publicacao')
      ->where('documento.iddocumento', '=', $id)
      ->get();
    }


}
