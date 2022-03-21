<!DOCTYPE html>
<!--suppress CssUnknownTarget -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
  
  <head>
    @section('titulo', 'Visualização de documento')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <style type="text/css">
      @media print {
        html,
        body {
          page-break-inside: avoid;
        }

        @page {
          margin: 0.8;
        }
      }
    </style>
  </head>

  <body>
    <div style="position:relative;width:893px;height:1240px;">
      <!-- <img width="893" height="1240" src={{ url('static/images/target001.png') }} alt="background image" /> -->

      <p style="position:absolute;top:210px;left:125px;white-space:nowrap">
        PLACET Nº {{ $documento['nu_documento'] }} / {{ $documento['nu_documento_privado'] }}, GESTÃO {{ $documento['gestao'] }}<br>FORTALEZA, {{ date('d/m/Y - H:m', strtotime($documento['dt_hr_publicacao'] )) }} - E.·.V.·.
      </p>

      <div style="position:absolute;top:210px;left:530px;right:40px;text-align:justify;">
        {{ $documento['dsc_ementa'] }}
      </div>

      <div style="position:absolute;top:400px;left:132px;right:40px;text-align:justify;">

        <p class="d-flex justify-content-center">
          PLACET Nº {{ $documento['nu_documento'] }} / {{ $documento['nu_documento_privado'] }}
        </p>

        <p style="margin-top: 64px;" class="d-flex justify-content-center">
          O SERENÍSSIMO GRÃO-MESTRE DA MUI RESPEITÁVEL GRANDE LOJA MAÇÔNICA DO ESTADO DO CEARÁ, AUTORIZA PELO PRESENTE PLACET, A {{ $documento['nm_unidade'] }} DESTA JURISDIÇÃO, A PROMOVER A {{ $documento['cerimonia'] }} DO PROFANO {{ $documento['nm_pessoa'] }}, CUJO PROCESSO CORREU SEUS TRAMITES LEGAIS, SENDO REGULARMENTE APROVADO.
        <br/>
        <p style="margin-top: 64px;" class="d-flex justify-content-center">
          ORIENTE DE FORTALEZA, {{ date('d/m/Y - H:m', strtotime($documento['dt_hr_publicacao'] )) }}, E.·.V.·.
        </p>
        <br/>
        {!! $documento['assinaturas'] !!}
      </div>
    </div>
  </body>
</html>