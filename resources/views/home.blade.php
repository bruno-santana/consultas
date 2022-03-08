@extends('layout.template')

@section('titulo', 'Consultas')

@section('conteudo')
  <div class="row justify-content-center" style="margin: 12px 0;">
    <img src="{{ url('static/images/glmece.png') }}" style="max-width: 10%;height: auto;">
  </div>
  <h2 class="d-flex justify-content-center" style="margin: 10px 0;">
    Consultas GLMECE
  </h2>
  <div class="justify-content-center">
    <div class="card shadow-lg p-2 mb-4 bg-body rounded" style="margin: 0 3em; border: 1px solid rgba(0,0,0,0.2);">
      <div class="container">
        <h3>Documentos</h3>
        
        <form action="{{ route('documentos.list') }}" method="GET" style="margin: 1.2em">
          {{ csrf_field() }}
          <div class="row">
            <div class="col" style="margin-bottom: 1.2em">
              <label for="tipoDocumento">Tipo de Documento</label>
              <select class="form-control" name="tipoDocumento" id="tipoDocumento">
                @foreach ($tipoDocumentos as $item)
                <option value="{{ $item->idtipo_documento }}">
                  {{ $item->dsc_tipo_documento }}
                </option>
                @endforeach
              </select>
            </div>
            <div class="col" style="margin-bottom: 1.2em">
              <label for="unidade">Emitido por:</label>
              <select class="form-control" name="unidade" id="unidade">
                @foreach ($unidades as $item)
                <option value="{{ $item->idunidade }}">
                  {{ $item->nm_unidade }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row align-items-end">
            <p>Informe as datas de início e fim de sua pesquisa:</p>
            <div class="col">
              <label for="dtInicio" class="form-label">Data Inicial</label>
              <input type="date" class="form-control" id="dtInicio" name="dtInicio">
            </div>
            <div class="col">
              <label for="dtFim" class="form-label">Data Final</label>
              <input type="date" class="form-control" id="dtFim" name="dtFim">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="card shadow-lg p-2 mb-3 bg-body rounded" style="margin: 0 3em; border: 1px solid rgba(0,0,0,0.2);">
      <div class="container">
        <h3>Pagamentos</h3>
        <p>Informe o número de cadastro do Irmão que deseja buscar:</p>
        
        <form action="{{ route('pagamentos.show') }}" method="GET" style="margin: 1.2em">
          <div class="row align-items-end">
            <div class="col">
              <label for="cim" class="form-label">Número de Cadastro</label>
              <input type="text" class="form-control" id="cim" name="cim">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection