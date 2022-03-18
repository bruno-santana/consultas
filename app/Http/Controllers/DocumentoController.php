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
      'unidade' => $request->unidade
    ];
    
    $docs = (new Documento())->list($data);
    
    return view('documentos.list', compact('docs'));
  }

  public function show(Request $request)
  {
    $documento =  (new Documento())->findById($request->id);

    $nm_pessoa = explode('EM FAVOR DE', $documento[0]->dsc_ementa);
    $nm_pessoa = $nm_pessoa[1];

    $documento = [
      'nu_documento' => $documento[0]->nu_documento,
      'idtipo_documento' => $documento[0]->idtipo_documento,
      'nu_documento_privado' => $documento[0]->nu_documento_privado,
      'dt_hr_publicacao' => $documento[0]->dt_hr_publicacao,
      'dsc_ementa' => $documento[0]->dsc_ementa,
      'nm_unidade' => $documento[0]->nm_unidade,
      'nm_pessoa' => $nm_pessoa
    ];

    if($documento['idtipo_documento'] != 1) {
      switch ($documento['idtipo_documento']) {
        case '33':
          $documento['cerimonia'] = 'ELEVAÇÃO';
          break;
        case '32':
          $documento['cerimonia'] = 'EXALTAÇÃO';
          break;
        default:
        $documento['cerimonia'] = 'INICIAÇÃO';
      }

      return view('documentos.placet', compact('documento'));
    } else {
      return view('documentos.show', compact('documento'));
    }
  }
}
