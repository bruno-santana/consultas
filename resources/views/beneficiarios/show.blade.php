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
        <div class="p-2">CADASTRO:</div>
        <div class="p-2 flex-grow-1">
          {{ $data['signatario']->signatario_cadastro }}
        </div>
      </div>
      <div class="d-flex">
        <div class="p-2">OBREIRO:</div>
        <div class="p-2 flex-grow-1">
          {{ Str::upper($data['signatario']->signatario_nome) }}
        </div>
      </div>
      <div class="d-flex">
        <div class="p-2">PROTOCOLO:</div>
        <div class="p-2 flex-grow-1">
          {{ $data['signatario']->signatario_protocolo }}
        </div>
      </div>
      <div class="d-flex">
        <div class="p-2">DATA DE REGISTRO:</div>
        <div class="p-2 flex-grow-1">
          {{ date('d/m/Y', strtotime($data['signatario']->signatario_data )) }}
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-fixed mtop16">
          <thead>
            <tr>
              <th scope="col" class="col-9">Beneficiário</th>
              <th scope="col" class="col-3">Parentesco</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data['beneficiarios'] as $item)
              <tr>
                <td scope="row" class="col-9">
                  {{ $item->beneficiario_nome }}
                </td>
                <td class="col-3">
                  {{ $item->beneficiario_parentesco }}
                </td>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection