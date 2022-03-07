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

  public function pdf($data)
  {
    $dsc_conteudo = strip_tags($data->dsc_conteudo);

    $pdf = DomPDF::loadView('documento', [
      'nu_documento' => $data->nu_documento,
      'nu_documento_privado' => $data->nu_documento_privado,
      'dsc_ementa' => $data->dsc_ementa,
      'dsc_conteudo' => $dsc_conteudo,
      'dt_hr_publicacao' => $data->dt_hr_publicacao
    ]);
    return $pdf->stream('documento.pdf');
  }
}
