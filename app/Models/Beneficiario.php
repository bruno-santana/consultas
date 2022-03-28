<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Beneficiario extends Model
{  
  use HasFactory;

  public function buscarSignatarioPorCim($cim)
  {
    $connection = DB::connection('sqlite-beneficiarios');
    return $connection->table('signatarios AS s')
    ->select('s.id AS signatario_id', 's.cadastro AS signatario_cadastro', 's.nome AS signatario_nome', 's.protocolo AS signatario_protocolo', 's.data AS signatario_data')
    ->where('s.cadastro', '=', $cim)
    ->first();
  }

  public function buscarBeneficiarioPorCim($id)
  {
    $connection = DB::connection('sqlite-beneficiarios');
    return $connection->table('beneficiarios AS b')
    ->select('b.nome AS beneficiario_nome', 'b.parentesco AS beneficiario_parentesco')
    ->where('b.signatario_id', '=', $id)
    ->get();
  }
}
