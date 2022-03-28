<?php

namespace App\Http\Controllers;

use App\Models\Obreiro;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiariosController extends Controller
{
  public function show(Request $request)
  {
    $data = $this->beneficiariosPorCim($request->cim);
    return view('beneficiarios.show', compact('data'));
  }
  
  protected function beneficiariosPorCim($cim)
  {
    $signatario = (new Beneficiario())->buscarSignatarioPorCim($cim);
    $beneficiarios = (new Beneficiario())->buscarBeneficiarioPorCim($signatario->signatario_id);
    return [
      'signatario' => $signatario,
      'beneficiarios' => $beneficiarios
    ];
  }
}
