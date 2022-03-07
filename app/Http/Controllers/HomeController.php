<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use App\Models\Unidade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $tipoDocumentos = TipoDocumento::all();
    $unidades = Unidade::all()->sortBy('idunidade');
    return view('home', compact('tipoDocumentos', 'unidades'));
  }
}
