@extends('layout.template')

@section('titulo', 'Tipos de Documentos')

@section('conteudo')
  <h2 class="d-flex justify-content-center" style="margin: 18px 0;">
    Listagem dos tipos de documentos
  </h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Tipo de Documento</th>
        <th scope="col">Situação</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tipoDocumentos as $item)
      <tr>
        <th scope="row">{{$item->dsc_tipo_documento}}</th>
        <td>{{$item->flg_ativo}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection