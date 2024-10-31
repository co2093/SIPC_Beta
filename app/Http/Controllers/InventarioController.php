<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class InventarioController extends Controller
{
    //
    public function index()
    {
        $facultades = DB::table('facultad')->get();
        $estados = DB::table('condicion_inventario')->get();

        return view('inventario.index', compact('facultades', 'estados'));
    }



    public function show()
    {

        $inventario = DB::table('inventario')
        ->leftjoin('condicion_inventario', 'inventario.idcondicioninventario', '=', 'condicion_inventario.idcondicioninventario')
        ->select('inventario.*', 'condicion_inventario.condicion')
        ->paginate(30);

        return view('inventario.show', compact('inventario'));
    }



    //Store

    public function store(Request $request){

        //dd($request);

        $inv = DB::table('inventario')
        ->where('codinventario', '=', $request->input('serie'))
        ->first();

        if($inv)
        {
            session()->flash('success', 'Ya existe un producto con el código: '.$request->input('serie'));
            return redirect()->route('inventario.show');
        }    
        else{
        
        DB::table('inventario')->insert([

            'codinventario' => $request->input('serie'),
            'idcondicioninventario' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descripcionbien' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'especificacion' => $request->input('especificaciones'),
            'serie' => $request->input('serie'),
            'valor' => $request->input('costo'),
            'facultad' => $request->input('facultad')

        ]);

        session()->flash('success', 'Se ha ingresado al inventario: '.$request->input('nombre'));

        return redirect()->route('inventario.show');


        }



    }    


    public function edit($codinventario)
    {


        $facultades = DB::table('facultad')->get();
        $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.edit', compact('inv', 'facultades','estados', 'codinventario'));
    }

    public function update(Request $request)
    {

        
        
        DB::table('inventario')
        ->where('codinventario', $request->input('serie'))
        ->update([
            'codinventario' => $request->input('serie'),
            'idcondicioninventario' => $request->input('estado'),
            'cantidad' => $request->input('cantidad'),
            'descripcionbien' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'especificacion' => $request->input('especificaciones'),
            'serie' => $request->input('serie'),
            'valor' => $request->input('costo'),
            'facultad' => $request->input('facultad')            
        ]);


                

        session()->flash('success', 'Producto actualizado exitosamente');
        return redirect()->route('inventario.show');

    }

    public function details($codinventario)
    {


        $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.details', compact('inv','estados'));
    }




    // Remove the specified task from storage
    public function destroyConfirm($codinventario)
    {

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.delete', compact('inv'));
    }


    // Remove the specified task from storage
    public function destroy($codinventario)
    {
        
        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->delete();


        session()->flash('success', 'Producto eliminado exitosamente');
        return redirect()->route('inventario.show');
    }

     public function reportepdf()
    {


        $inventario = DB::table('inventario')
        ->leftjoin('condicion_inventario', 'inventario.idcondicioninventario', '=', 'condicion_inventario.idcondicioninventario')
        ->select('inventario.*', 'condicion_inventario.condicion')
        ->get();


        $pdf = Pdf::loadView('inventario.pdf', compact('inventario'));
        return $pdf->download('inventario_actual'.time().'pdf'); // Puedes usar ->stream() para abrir en el navegador
    }



    public function exportarExcel()
    {
        $inventario = DB::table('inventario')
        ->leftjoin('condicion_inventario', 'inventario.idcondicioninventario', '=', 'condicion_inventario.idcondicioninventario')
        ->select('inventario.*', 'condicion_inventario.condicion')
        ->get();

        $data = $inventario->map(function ($item) {
            return [
                'Serie' => $item->serie,
                'Nombre' => $item->descripcionbien,
                'Facultad' => $item->facultad,
                'Condición' => $item->condicion, 
                'Cantidad' => $item->cantidad,
                'Costo unitario' => $item->valor,
                'Total' => $item->valor * $item->cantidad,
            ];
        })->toArray();

        $fechaActual = date('Y-m-d');

        $nombreArchivo = 'inventario_actual_' . $fechaActual . '.xlsx';

        return Excel::download(new class($data, $fechaActual) implements FromArray, WithHeadings, WithStyles, ShouldAutoSize {
            private $data;
            private $fecha;

            public function __construct(array $data, $fecha)
            {
                $this->data = $data;
                $this->fecha = $fecha;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    ['Secretaría de Investigaciones Científicas de la Universidad de El Salvador'],
                    ['Inventario actual'],
                    ['Fecha: ' . $this->fecha],
                    [], // Fila vacía
                    ['Serie', 'Nombre', 'Facultad', 'Condición', 'Cantidad', 'Costo unitario', 'Total'] // Encabezados de la tabla
                ];
            }

            public function styles(Worksheet $sheet)
            {
                                // Combina las celdas para los títulos
                $sheet->mergeCells('A1:G1'); // Primera fila
                $sheet->mergeCells('A2:G2'); // Segunda fila
                $sheet->mergeCells('A3:G3'); // Tercera fila

                // Establecer estilos para los títulos
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->setCellValue('A1', 'Secretaría de Investigaciones Científicas de la Universidad de El Salvador');

                $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(12);
                $sheet->setCellValue('A2', 'Inventario actual');

                $sheet->getStyle('A3')->getFont()->setBold(true);
                $sheet->setCellValue('A3', 'Fecha: ' . $this->fecha);

                // Fila vacía
                $sheet->setCellValue('A4', ''); // Fila vacía para separación


               
                // Estilo para los encabezados de la tabla
                $sheet->getStyle('A5:G5')->getFont()->setBold(true);

                // Estilo para los bordes
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'], // Color negro
                        ],
                    ],
                ];

                // Aplicar bordes a todas las celdas de datos
                $rowCount = count($this->data) + 5; // +5 para incluir las filas de encabezado
                $sheet->getStyle('A1:G' . $rowCount)->applyFromArray($styleArray);
            }
        }, $nombreArchivo);
    }
}
