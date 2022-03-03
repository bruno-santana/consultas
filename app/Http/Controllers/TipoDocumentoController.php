<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
  public function index(Request $request)
  {
    $tipoDocumentos = TipoDocumento::all();
    return view('tipoDocumentos', compact('tipoDocumentos'));
  }
}
