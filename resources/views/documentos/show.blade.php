@extends('layout.template')

@section('titulo', 'Visualização de documento')

@section('conteudo')
  <h2 class="d-flex justify-content-center" style="margin: 18px 0;">
    Visualização do documento {{ $documento->nu_documento_privado }}/{{ $documento->nu_documento }}
  </h2>
  <hr>
  <div class="row">
    
  </div>
@endsection