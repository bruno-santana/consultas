@extends('layout.template')

@section('titulo', 'Último pagamento')

@section('conteudo')
  <h2 class="d-flex justify-content-center" style="margin-top: 18px;">
    Último Pagamento
  </h2>
  <hr>
  <div class="row">
    <div class="container">
      <div class="d-flex">
        <div class="p-2">LOJA:</div>
        <div class="p-2 flex-grow-1">{{ $ultimo->nm_unidade }}</div>
      </div>
      <div class="d-flex">
        <div class="p-2">NOME DO OBREIRO:</div>
        <div class="p-2 flex-grow-1">{{ $ultimo->nm_pessoa }}</div>
      </div>

      <div class="d-flex">
        <div class="p-2">MATRÍCULA:</div>
        <div class="p-2 flex-grow-1">{{ $ultimo->nr_cadastro }}</div>
      </div>

      <div class="d-flex">
        <div class="p-2">REFERÊNCIA DO PAGAMENTO:</div>
        <div class="p-2 flex-grow-1">
          {{ date('d/m/Y', strtotime($ultimo->dt_utl_pag)) }}
        </div>
      </div>

      <div class="d-flex">
        <div class="p-2">REALIZAÇÃO DO PAGAMENTO:</div>
        <div class="p-2 flex-grow-1">
          {{ date('d/m/Y', strtotime($ultimo->dt_realiz_utl_pag)) }}
        </div>
      </div>
    </div>
  </div>

  <h2 class="d-flex justify-content-center" style="margin-top: 18px;">
    Listagem de Pagamentos
  </h2>
  <h5 class="d-flex justify-content-center" style="text-decoration-color: green">Total de mensalidades: {{ $somatorio }}</h5>
  
  <hr>
  <div class="row">
    <div class="container">
      <div class="d-flex">
        <div style="flex: 1;text-align: center;margin-right: 0.3em;">
          1º PERÍODO DE APURAÇÃO - Qtd. registros: {{ count($listagemModelo1) }}
          <div class="table-responsive">
            <table class="table table-striped table-fixed">
              <thead>
                <tr>
                  <th scope="col">Valor</th>
                  <th scope="col">Baixa Realizada</th>
                  <th scope="col">Mês/Ano</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listagemModelo1 as $item)
                <tr>
                  <td scope="row">
                    {{ 'R$ '.number_format($item->vl_pago, 2, ',', '.') }}
                  </td>
                  @if ($item->baixa_realizada == 'S')
                    <td>
                      SIM
                    </td>
                  @else
                    <td>
                      NÃO
                    </td>
                  @endif
                  <td>
                    {{ $item->mes_ref }}/{{ $item->ano_ref }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div style="flex: 1;text-align: center;margin-left: 0.3em;">
          2º PERÍODO DE APURAÇÃO - Qtd. registros: {{ count($listagemModelo2) }}
          <div class="table-responsive">
            <table class="table table-striped table-fixed">
              <thead>
                <tr>
                  <th scope="col">Mensalidade</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Nosso Número</th>
                  <th scope="col">Taxa Extra</th>
                </tr>
              </thead>
              <tbody>
                @foreach($listagemModelo2 as $item)
                <tr>
                  <td scope="row">
                    {{ date('d/m/Y', strtotime($item->dt_ref_menssalidade)) }}
                  </td>
                  <td>
                    {{ 'R$ '.number_format($item->vl_pago, 2, ',', '.') }}
                  </td>
                  <td>
                    {{ $item->qtd_parc_paga }}
                  </td>
                  <td>
                    {{ $item->nosso_numero_boleto }}
                  </td>
                  <td>
                    {{ 'R$ '.number_format($item->vl_taxa_extra, 2, ',', '.') }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection