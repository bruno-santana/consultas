<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obreiro extends Model
{
  use HasFactory;
  protected $connection='pgsql';
  protected $table='obreiro';

  public function findByCim($cim)
  {
    $obreiro = DB::table('obreiro')
                ->join('dados_maconico', 'obreiro.dados_maconico_id', '=', 'dados_maconico.iddados_maconico')
                ->join('pessoa', 'obreiro.pessoa_id', '=', 'pessoa.idpessoa')
                ->join('unidade', 'obreiro.unidade_id', '=' , 'unidade.idunidade')
                ->select('unidade.nr_loja', 'unidade.nm_unidade', 'pessoa.nm_pessoa', 'dados_maconico.nr_cadastro')
                ->where('dados_maconico.nr_cadastro', '=', $cim)
                ->get();
    return $obreiro;
  }
}
