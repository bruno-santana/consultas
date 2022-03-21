<?php

namespace App\Http\Controllers;

use App\Models\Documento;
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
    $placets = [19, 32, 33];
    $documento =  (new Documento())->findById($request->id);
    
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    $dt_hr_extenso = strftime( '%d do mês de %B do ano de %Y', strtotime($documento->dt_hr_publicacao));

    if( in_array($documento->idtipo_documento, $placets)) {
      $nm_pessoa = explode('EM FAVOR DE', $documento->dsc_ementa);
      $nm_pessoa = $nm_pessoa[1];
    } else {
      $nm_pessoa = null;
    }

    $documento = [
      'nu_documento' => $documento->nu_documento,
      'idtipo_documento' => $documento->idtipo_documento,
      'nu_documento_privado' => $documento->nu_documento_privado,
      'dt_hr_publicacao' => $documento->dt_hr_publicacao,
      'dt_hr_publicacao_extenso' => $dt_hr_extenso,
      'dsc_ementa' => $documento->dsc_ementa,
      'dsc_conteudo' => $documento->dsc_conteudo,
      'nm_unidade' => $documento->nm_unidade,
      'nm_pessoa' => $nm_pessoa
    ];

    if(strtotime($documento['dt_hr_publicacao']) < strtotime('01/06/2019')){
      $documento['gestao'] = '2016-2019';
      $documento['grao-mestre'] = 'SILVIO DE PAIVA RIBEIRO';
      $documento['assinaturas'] = view('layout.assinaturas2016');
    } else {
      $documento['gestao'] = '2019-2022';
      $documento['grao-mestre'] = 'NARCISO DORTA ERNANDES FILHO';
      $documento['assinaturas'] = view('layout.assinaturas2019');
    }

    if($documento['idtipo_documento'] === 21) {
      $documento['dsc_conteudo'] = view('documentos.atoRegularizacao', compact('documento'));
    }
    
    if(in_array($documento['idtipo_documento'], $placets)) {
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
