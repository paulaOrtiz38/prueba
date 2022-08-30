<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva cotizacion</title>
</head>

<body>
    <div class="card">
        <div class="card-header">
          Información
        </div>
        <div class="card-body">
          <h3 class="card-title">Notifiación de nueva Cotizacion</h3>
          <p class="card-text">El usuario {{ $cotizacion->nombre_completo }}, se acaba de registrar en la plataforma una cotización.</p>
          <p class="card-text">Su correo electrónico es {{ $cotizacion->email }}.</p>
        </div>
      </div>
</body>
</html>