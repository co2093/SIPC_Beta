<!DOCTYPE html>
<html>
<head>
    <title>Reporte</title>
    <style>
        /* Estilos para el encabezado */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 200px; /* Tamaño de la imagen */
            height: auto;
        }
        /* Estilos para el título y la fecha */
        .header h3 {
            margin: 5px 0;
        }
        .fecha {
            text-align: left;
        }
        .monto {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo">
        <h3>Inventario actual</h3>
        <h3 class="fecha">Fecha: {{ date('d/m/Y') }}</h3>
    </div>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Serie</th>
                <th scope="col">Nombre</th>
                <th scope="col">Facultad</th>
                <th scope="col">Condición</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Costo unitario</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
           @foreach($inventario as $i)
                <tr>
                    <td>{{ $i->serie }}</td>
                    <td>{{ $i->descripcionbien }}</td>
                    <td>{{ $i->facultad }}</td>
                    <td>{{ $i->condicion }}</td>
                    <td>{{ $i->cantidad }}</td>
                    <!-- Formato de dólar para los montos -->
                    <td class="monto">${{ number_format($i->valor, 2) }}</td>
                    <td class="monto">${{ number_format($i->valor * $i->cantidad, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
