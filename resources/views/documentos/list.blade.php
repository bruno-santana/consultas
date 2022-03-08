@extends('layout.template')

@section('titulo', 'Documentos')

@section('conteudo')
  <div class="bottom-0 end-0" style="position: fixed; margin: 1%; z-index: 1000;">
    <a href="/">
      <i class="fa fa-home fa-2x" aria-hidden="true"></i>
    </a>
  </div>
  <h2 class="d-flex justify-content-center" style="margin: 18px 0;">
    Listagem de documentos
  </h2>
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped table-fixed mtop16">
        <thead>
          <tr>
            <th scope="col" class="col-2">Nº do documento</th>
            <th scope="col" class="col-7">Ementa</th>
            <th scope="col" class="col-2">Data da publicação</th>
            <th scope="col" class="col-1">Ação</th>
          </tr>
      </thead>
      <tbody>
        @foreach($docs as $item)
          <tr>
            <td scope="row" class="col-2">
              {{ $item->nu_documento_privado }}/{{ $item->nu_documento }}
            </td>
            <td class="col-7">
              {{ $item->dsc_ementa }}
            </td>
            <td class="col-2">
              {{ date('d/m/Y - H:m', strtotime($item->dt_hr_publicacao)) }}
            </td>
            <td class="col-1">
              <a href="{{ route('documentos.show', ['id' => $item->iddocumento]) }}" data-toggle="tooltip" data-placement="top" title="Visualizar documento" target="_blank">
                <i class="fa fa-eye" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $docs->appends(request()->query())->links() }}
      </div>
    </div>
  </div>
@endsection