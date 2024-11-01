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

        /* Estilos para la tabla */
        table {
            width: 100%; /* Ajusta la tabla al 100% del ancho de la página */
            border-collapse: collapse; /* Elimina espacios entre celdas */
            word-wrap: break-word; /* Ajusta el contenido para que no desborde */
            table-layout: fixed; /* Asegura que las columnas se ajusten de manera uniforme */
        }
        th, td {
            padding: 8px;
            border: 1px solid #000;
            font-size: 12px;
        }
        th {
            font-weight: bold;
            background-color: #f2f2f2;
            text-align: center;
        }

        /* Ajusta el ancho de la primera columna */
        th:first-child, td:first-child {
            width: 30%; /* Aumenta el ancho de la primera columna al 25% del total */
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo">
        <h3>Proyectos de investigación</h3>
        <h3 class="fecha">Fecha: {{ date('d/m/Y') }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Área de conocimiento</th>
                <th scope="col">Investigador</th>
                <th scope="col">Financiamiento externo</th>
                <th scope="col">Financiamiento SIC UES</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $p)
                <tr>
                    <td>{{ $p->tituloproyecto }}</td>
                    <td>{{ $p->nombreareaconocimiento }}</td>
                    <td>{{ $p->name }}</td>
                    <td class="monto">${{ number_format($p->total_financiamiento, 2) }}</td>
                    <td class="monto">${{ number_format($p->presupuesto, 2) }}</td>
                    <td>{{ $p->nombreestadoproyecto }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
