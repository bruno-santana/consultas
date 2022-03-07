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
    <img width="893" height="1240" src={{ url('static/images/target001.png') }} alt="background image" />

    <p style="position:absolute;top:210px;left:125px;white-space:nowrap">
      ATO Nº {{ $documento->nu_documento }} / {{ $documento->nu_documento_privado }}, GESTÃO 2019/2022<br>FORTALEZA, {{ date('d/m/Y - H:m', strtotime($documento->dt_hr_publicacao)) }} - E.·.V.·.
    </p>

    <div style="position:absolute;top:210px;left:530px;right:40px;text-align:justify;">
      {{ $documento->dsc_ementa }}
    </div>

    <div style="position:absolute;top:400px;left:132px;right:40px;text-align:justify;">

      {!! $documento->dsc_conteudo !!}

      <div style="margin-top: 64px" class="d-flex justify-content-center">
        <div style="margin: 32px">
          <img width="200" height="100" src={{ url('static/images/9475.png') }} alt="assinatura grao mestre" />
          <p class="ft14">
            <i><b>Narciso Dorta Ernandes Filho</b></i>
          </p>
          <p class="ft12">
            Grão Mestre
          </p>
        </div>
        
        <div style="margin: 32px">
          <img width="200" height="100" src={{ url('static/images/6393.png') }}
          alt="background image" />
          <p class="ft14">
            <i><b>João Carlos de Oliveira Uchoa</b></i>
          </p>
          <p class="ft12">
            Grande Secretário Geral
          </p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>