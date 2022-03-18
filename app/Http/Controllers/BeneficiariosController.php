<?php

namespace App\Http\Controllers;

use App\Models\Obreiro;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
  public function show(Request $request)
  {
    $obreiro =  (new Obreiro())->findByCim($request->cim);
    $obreiro = [
      'loja' => $obreiro[0]->nm_unidade,
      'nome' => $obreiro[0]->nm_pessoa,
      'cadastro' => $obreiro[0]->nr_cadastro
    ];
    $beneficiarios = $this->beneficiariosPorCim($request->cim);
    
    return view('beneficiarios.show', compact('obreiro', 'beneficiarios'));
  }
  
  protected function beneficiariosPorCim($cim)
  {
    dd((new Beneficiario())->findByCim($cim));
    return (new Beneficiario())->findByCim($cim);
  }
}
