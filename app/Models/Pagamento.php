<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pagamento extends Model
{
  use HasFactory;
  protected $connection='pgsql';
  protected $table='obreiro';

  public function ultimoPagamento($id)
  {
    $pagamento = DB::table('obreiro')
                ->join('dados_maconico', 'obreiro.dados_maconico_id', '=', 'dados_maconico.iddados_maconico')
                ->join('pessoa', 'obreiro.pessoa_id', '=', 'pessoa.idpessoa')
                ->join('unidade', 'obreiro.unidade_id', '=' , 'unidade.idunidade')
                ->select('unidade.nr_loja', 'unidade.nm_unidade', 'pessoa.nm_pessoa', 'dados_maconico.nr_cadastro', 'obreiro.dt_utl_pag', 'obreiro.dt_realiz_utl_pag')
                ->where('dados_maconico.nr_cadastro', '=', $id)
                ->get();
    return $pagamento;
  }

  public function listagemModelo1($id)
  {
    return DB::table('kit_pagamento')
    ->join('obreiro', 'obreiro.idobreiro', '=', 'kit_pagamento.obreiro_id')
    ->join('dados_maconico', 'dados_maconico.iddados_maconico', '=', 'obreiro.dados_maconico_id')
    ->join('pessoa', 'pessoa.idpessoa', '=', 'obreiro.pessoa_id')
    ->where('dados_maconico.nr_cadastro', '=', $id)
    ->orderBy('kit_pagamento.ano_ref', 'asc')
    ->orderBy('kit_pagamento.mes_ref', 'asc')
    ->get();
  }

  public function listagemModelo2($id)
  {
    return DB::table('mensalidade_obreiro')
    ->join('obreiro', 'obreiro.idobreiro', '=', 'mensalidade_obreiro.obreiro_id')
    ->join('pessoa', 'obreiro.pessoa_id', '=', 'pessoa.idpessoa')
    ->join('dados_maconico', 'obreiro.dados_maconico_id', '=' , 'dados_maconico.iddados_maconico')
    ->select('pessoa.nm_pessoa', 'mensalidade_obreiro.dt_ref_menssalidade', 'mensalidade_obreiro.is_pago', 'mensalidade_obreiro.vl_pago', 'mensalidade_obreiro.qtd_parc_paga', 'mensalidade_obreiro.nosso_numero_boleto', 'mensalidade_obreiro.vl_taxa_extra')
    ->where('dados_maconico.nr_cadastro', '=', $id)
    ->where('mensalidade_obreiro.is_pago', '=', 't')
    ->orderBy('mensalidade_obreiro.dt_ref_menssalidade', 'asc')
    ->get();
  }
}
