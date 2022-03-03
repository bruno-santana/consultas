<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentosController extends Controller
{
    public function show(Request $request)
    {
      $pagamento = (new Pagamento);
      $ultimo = $pagamento->ultimoPagamento($request->cim);
      $ultimo = $ultimo[0];

      $listagemModelo1 = $pagamento->listagemModelo1($request->cim);
      $listagemModelo2 = $pagamento->listagemModelo2($request->cim);

      $somatorio = $listagemModelo1->count() + $listagemModelo2->count();

      return view('pagamentos.last', compact('ultimo', 'listagemModelo1', 'listagemModelo2', 'somatorio'));
    }
}
