@extends('layout.template')

@section('titulo', 'Listagem de Beneficiários')

@section('conteudo')
  <div class="bottom-0 end-0" style="position: fixed; margin: 1%; z-index: 1000;">
    <a href="/">
      <i class="fa fa-home fa-2x" aria-hidden="true"></i>
    </a>
  </div>
  <h2 class="d-flex justify-content-center" style="margin-top: 18px;">
    Listagem de Beneficiários
  </h2>
  <hr>
  <div class="row">
    <div class="container">
      <div class="d-flex">
        <div class="p-2">LOJA:</div>
        <div class="p-2 flex-grow-1">{{ $obreiro['loja'] }}</div>
      </div>
      <div class="d-flex">
        <div class="p-2">OBREIRO:</div>
        <div class="p-2 flex-grow-1">{{ $obreiro['nome'] }}</div>
      </div>
      <div class="d-flex">
        <div class="p-2">CADASTRO:</div>
        <div class="p-2 flex-grow-1">{{ $obreiro['cadastro'] }}</div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-fixed mtop16">
          <thead>
            <tr>
              <th scope="col" class="col-2">Beneficiário - %</th>
              <th scope="col" class="col-7">Parentesco</th>
              <th scope="col" class="col-2">Data de registro</th>
              <th scope="col" class="col-1">Protocolo</th>
            </tr>
          </thead>
          <tbody>
            @foreach($beneficiarios as $item)
              <tr>
                <td scope="row" class="col-2">
                  {{ $item->beneficiario }}
                </td>
                <td class="col-7">
                  {{ $item->parentesco }}
                </td>
                <td class="col-2">
                  {{ date('d/m/Y - H:m', strtotime($item->dt_registro)) }}
                </td>
                <td class="col-1">
                  {{ $item->protocolo }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection