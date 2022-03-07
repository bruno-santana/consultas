<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Barryvdh\DomPDF\PDF as DomPDF;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
  public function list(Request $request)
  {
    $dtInicio = $request->dtInicio;
    if ( !$request->dtFim ){
      $dtFim = date("Y-m-d");
    } else {
      $dtFim = $request->dtFim;
    }
    
    $data = [
      'tipoDocumento' => $request->tipoDocumento,
      'dtInicio' => $dtInicio,
      'dtFim' => $dtFim,
    ];
    
    $docs =  (new Documento())->list($data);
    
    return view('documentos.list', compact('docs'));
  }

  public function show(Request $request)
  {
    $documento =  (new Documento())->findById($request->id);
    $documento = $documento[0];
    
    return view('documentos.show', compact('documento'));
  }
}
