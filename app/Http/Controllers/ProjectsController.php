<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectsController extends Controller
{
    //


    public function index($cod)
    {

        $areas = DB::table('area_conocimiento')->get();

        $tipo = DB::table('tipo_proyecto')->get();



        $proyectos = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)
        ->first();

        $tp = DB::table('tipo_proyecto')
        ->where('idtipoproyecto', '=', $proyectos->idtipoproyecto)
        ->first();

        $ar = DB::table('area_conocimiento')
        ->where('idareaconocimiento', '=', $proyectos->idareaconocimiento)
        ->first();

        $facultades = DB::table('facultad')
        ->orderby('nombrefacultad')
        ->get();

        


        return view('projects.index', compact('areas', 'cod','proyectos', 'tipo', 'tp', 'ar', 'facultades'));
    }

    public function iniciar()
    {
        $areas = DB::table('area_conocimiento')
        ->orderby('nombreareaconocimiento')
        ->get();
        $tipo = DB::table('tipo_proyecto')
        ->orderby('tipoproyecto')
        ->get();
        $facultades = DB::table('facultad')
        ->orderby('nombrefacultad')
        ->get();

        return view('projects.iniciar', compact('areas', 'tipo', 'facultades'));
    }



    public function show()
    {

        $convocatorias = DB::table('convocatoria')->get();

       // $estados = DB::table('estado_proyecto')->get();

        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->leftjoin('facultad', 'facultad.idfacultad', '=', 'proyecto.idfacultad')
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento', 'facultad.nombrefacultad')
        ->where('proyecto.usuario', '=', Auth::user()->email)
        ->paginate(10);

        return view('projects.show', compact('proyectos', 'convocatorias'));
    }


    public function store(Request $request){


       // dd($request);


         $convocatoria = DB::table('convocatoria')
        ->where('estado', '=', 1)
        ->first();

 
        DB::table('proyecto')->insert([
            'idestadoproyecto' => 1,
            'idareaconocimiento' => $request->input('area'),
            'idconvocatoria' => $convocatoria->idconvocatoria,
            'idtipoproyecto' => $request->input('tipo'),
          //  'codproyecto' => $convocatoria->anoconvocatoria,
            'tituloproyecto' => $request->input('titulo'),
            'antiguo' => false,
            'tiempo' =>$request->input('tiempo'),
            'idfacultad' =>$request->input('facultad'),
            'usuario' => $request->input('usuario')


        ]);

    session()->flash('success', 'Se ha iniciado un nuevo proyecto exitosamente.');

    return redirect()->route('projects.show');

    }    


        public function edit($cod)
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

       // dd($request->input('idproyecto'));
        DB::table('proyecto')
        ->where('idproyecto', $request->input('idproyecto'))
        ->update([
            'tituloproyecto' => $request->input('titulo'),
            'idareaconocimiento' => $request->input('area'),
            'idtipoproyecto' => $request->input('tipo'),
             'idfacultad' => $request->input('facultad'),
            'tiempo' => $request->input('tiempo')        ]);

        DB::table('pasos_registro')
        ->where('idproyecto', $request->input('idproyecto'))
        ->update([
            'titulo' => 1    

        ]);

                

        session()->flash('success', 'Proyecto actualizado exitosamente.');
        return redirect()->to('/projects/registro/pasos/'.$request->input('idproyecto'));

    }

    public function details($cod)
    {


       // $estados = DB::table('condicion_inventario')->get();

        //dd($codinventario);
         $proyecto = DB::table('proyecto')
        ->where('idproyecto', '=', $cod)
        ->first();

    
        
        return view('projects.details', compact('proyecto'));
    }




    // Remove the specified task from storage
    public function destroyConfirm($cod)
    {

        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->first();

    
        
        return view('inventario.delete', compact('inv'));
    }


    // Remove the specified task from storage
    public function destroy($cod)
    {
        
        //dd($codinventario);
         $inv = DB::table('inventario')
        ->where('codinventario', '=', $codinventario)
        ->delete();


        session()->flash('success', 'Producto eliminado exitosamente');
        return redirect()->route('inventario.show');
    }



    public function objetivos()
    {
        return view('projects.objetivos');
    }


    public function prueba($cod)
    {

        $convocatorias = DB::table('convocatoria')->get();

        $estados = DB::table('estado_proyecto')->get();

        $pasos = DB::table('pasos_registro')
        ->where('idproyecto', '=', $cod)
        ->first();

        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento')
        ->where('idproyecto', '=', $cod)
        ->first();

        if($pasos) {
            // code...
        }else{

            DB::table('pasos_registro')->insert([
            'idproyecto' => $cod,
            'titulo' => 0,
            'objetivos' => 0,
            'actividades' => 0,
            'presupuesto' => 0,
            'colaboradores' => 0,
            'protocolo' =>0

        ]);

        $pasos = DB::table('pasos_registro')
        ->where('idproyecto', '=', $cod)
        ->first();
        
        }


        $c = DB::table('pasos_registro')
             ->select(DB::raw('sum(titulo+objetivos+actividades+presupuesto+colaboradores+protocolo)'))
             ->where('idproyecto', '=', $cod)
             ->first();
        
        $completado = round(($c->sum*16.666677),0);

      //  dd($completado);


        return view('projects.prueba', compact('proyectos', 'convocatorias', 'estados', 'cod', 'pasos', 'completado'));

    }

    public function protocolo($cod)
    {
        return view('projects.protocolo', compact('cod'));
    }

    public function enviar($cod)
    {
        return view('projects.enviar', compact('cod'));
    }

    public function updateProtocolo(Request $request){

        $attachment = null;
        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->store('attachments');
        }

        $cod = $request->input('cod');

        DB::table('proyecto')
        ->where('idproyecto', $request->input('cod'))
        ->update([
            'documentodefinicion' => $attachment,
            'idestadoproyecto' => 4      
        ]);

        session()->flash('success', 'Proyecto enviado a revisión exitosamente.');

        return redirect()->to('/projects/show/');

    }




public function archivadosshow(Request $request)
{
    // Obtener los datos de filtros
    $convocatorias = DB::table('convocatoria')->select('idconvocatoria', 'numeroconvocatoria')->get();
    $areas = DB::table('area_conocimiento')->select('idareaconocimiento', 'nombreareaconocimiento')->get();
    $estados = DB::table('estado_proyecto')->select('idestadoproyecto', 'nombreestadoproyecto')->get();

    // Construir consulta de proyectos
    $query = DB::table('proyecto')
        ->leftJoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftJoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftJoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->leftJoin('convocatoria', 'convocatoria.idconvocatoria', '=', 'proyecto.idconvocatoria')
        ->where('proyecto.idestadoproyecto', '!=', 1)
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento', 'convocatoria.numeroconvocatoria');

    // Filtrar según la búsqueda y los filtros seleccionados
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($subquery) use ($search) {
            $subquery->where('proyecto.tituloproyecto', 'LIKE', "%$search%")
                     ->orWhere('area_conocimiento.nombreareaconocimiento', 'LIKE', "%$search%")
                     ->orWhere('estado_proyecto.nombreestadoproyecto', 'LIKE', "%$search%");
        });
    }
    if ($request->filled('convocatoria')) {
        $query->where('proyecto.idconvocatoria', $request->convocatoria);
    }
    if ($request->filled('area')) {
        $query->where('proyecto.idareaconocimiento', $request->area);
    }
    if ($request->filled('estado')) {
        $query->where('proyecto.idestadoproyecto', $request->estado);
    }

    $proyectos = $query->paginate(10);

    return view('projects.archivadosshow', compact('proyectos', 'convocatorias', 'areas', 'estados'));
}



    public function archivadosindex()
    {
        return view('projects.archivadosindex');
    }

    public function archivadosnuevo(){

        $areas = DB::table('area_conocimiento')->get();
        $tipo = DB::table('tipo_proyecto')->get();
        $convocatorias = DB::table('convocatoria')->get();
        $estados = DB::table('estado_proyecto')->get();

        return view('projects.archivados', compact('areas', 'tipo', 'convocatorias', 'estados'));

    }

    public function archivadosstore(Request $request){

        $areas = DB::table('area_conocimiento')->get();
        $tipo = DB::table('tipo_proyecto')->get();
        $convocatorias = DB::table('convocatoria')->get();


        DB::table('proyecto')->insert([
            'idestadoproyecto' => $request->input('idestado'),
            'idareaconocimiento' => $request->input('area'),
            'idconvocatoria' => $request->input('idconvocatoria'),
            'idtipoproyecto' => $request->input('tipo'),
            'tituloproyecto' => $request->input('titulo'),
            'antiguo' => true,
            'tiempo' =>$request->input('tiempo')

        ]);






        session()->flash('success', 'Se ha iniciado un nuevo proyecto.');

        return redirect()->route('archivados.show');
    }

    public function end($cod){


        DB::table('pasos_registro')
        ->where('idproyecto', $cod)
        ->update([
            'protocolo' => 1    

        ]);

        session()->flash('success', 'Protocolo completado.');
        return redirect()->to('/projects/registro/pasos/'.$cod);

    }


    public function reportes()
    {

        $proyectos = DB::table('proyecto')
        ->leftjoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->select('proyecto.*', 'estado_proyecto.nombreestadoproyecto', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento')
        ->paginate(10);

        $convocatorias = DB::table('convocatoria')->select('idconvocatoria', 'numeroconvocatoria')->orderby('numeroconvocatoria')
        ->get();
        $areas = DB::table('area_conocimiento')->select('idareaconocimiento', 'nombreareaconocimiento')
        ->orderby('nombreareaconocimiento')->get();
        $estados = DB::table('estado_proyecto')->select('idestadoproyecto', 'nombreestadoproyecto')->orderby('nombreestadoproyecto')
        ->get();
        $facultades = DB::table('facultad')->orderby('nombrefacultad')->get();


        return view('projects.reportes', compact('proyectos', 'convocatorias', 'areas', 'estados', 'facultades'));
    }

   public function proyectosreportes(Request $request)
    {

      // Guarda los filtros en la sesión
    session([
        'convocatoria' => $request->convocatoria,
        'area' => $request->area,
        'estado' => $request->estado,
        'facultad' => $request->facultad,
    ]);


    $query = DB::table('proyecto')
        ->leftJoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
        ->leftJoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->leftJoin('users', 'users.email', '=', 'proyecto.usuario')
        ->leftJoin('convocatoria', 'convocatoria.idconvocatoria', '=', 'proyecto.idconvocatoria')
        ->leftJoin('pre_fuente', 'pre_fuente.idproyecto', '=', 'proyecto.idproyecto')
        ->leftjoin('facultad', 'facultad.idfacultad', '=','proyecto.idfacultad')
        ->select(
            'proyecto.tituloproyecto',
            'estado_proyecto.nombreestadoproyecto',
            'area_conocimiento.nombreareaconocimiento',
            'users.name',
            'convocatoria.presupuesto',
            'facultad.nombrefacultad',
            DB::raw('SUM(pre_fuente.financiamiento) as total_financiamiento')
        )
        ->groupBy(
            'proyecto.idproyecto',
            'proyecto.tituloproyecto',
            'estado_proyecto.nombreestadoproyecto',
            'area_conocimiento.nombreareaconocimiento',
            'users.name',
            'convocatoria.presupuesto',
            'facultad.nombrefacultad',
        );

    // Aplicar filtros si se han enviado
    if ($request->filled('convocatoria')) {
        $query->where('convocatoria.idconvocatoria', $request->convocatoria);
    }

    if ($request->filled('facultad')) {
        $query->where('facultad.idfacultad', $request->facultad);
    }

    if ($request->filled('area')) {
        $query->where('area_conocimiento.idareaconocimiento', $request->area);
    }

    if ($request->filled('estado')) {
        $query->where('estado_proyecto.idestadoproyecto', $request->estado);
    }

    // Ejecutar la consulta y paginar los resultados
    $proyectos = $query->paginate(10);

    return view('projects.generar', compact('proyectos'));
    }


    public function proyectospdf()
    {
        $convocatoria = session('convocatoria', 'todas');
        $area = session('area', 'todas');
        $estado = session('estado', 'todas');
        $facultad = session('facultad', 'todas');


        $proyectos = DB::table('proyecto')
            ->leftJoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
            ->leftJoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
            ->leftJoin('users', 'users.email', '=', 'proyecto.usuario')
            ->leftJoin('convocatoria', 'convocatoria.idconvocatoria', '=', 'proyecto.idconvocatoria')
            ->leftJoin('pre_fuente', 'pre_fuente.idproyecto', '=', 'proyecto.idproyecto')
            ->leftjoin('facultad', 'facultad.idfacultad', '=','proyecto.idfacultad')
            ->select(
                'proyecto.tituloproyecto',
                'estado_proyecto.nombreestadoproyecto',
                'area_conocimiento.nombreareaconocimiento',
                'users.name',
                'convocatoria.presupuesto',
                'facultad.nombrefacultad',
                DB::raw('SUM(pre_fuente.financiamiento) as total_financiamiento')
            )
            ->when($convocatoria && $convocatoria != 'todas', function ($query) use ($convocatoria) {
                return $query->where('convocatoria.idconvocatoria', $convocatoria);
            })
            ->when($facultad && $facultad != 'todas', function ($query) use ($facultad) {
                return $query->where('facultad.idfacultad', $facultad);
            })
            ->when($area && $area != 'todas', function ($query) use ($area) {
                return $query->where('area_conocimiento.idareaconocimiento', $area);
            })
            ->when($estado && $estado != 'todas', function ($query) use ($estado) {
                return $query->where('estado_proyecto.idestadoproyecto', $estado);
            })
            ->groupBy(
                'proyecto.idproyecto',
                'proyecto.tituloproyecto',
                'estado_proyecto.nombreestadoproyecto',
                'area_conocimiento.nombreareaconocimiento',
                'users.name',
                'convocatoria.presupuesto', 
                'facultad.nombrefacultad',
            )
            ->get();

        $pdf = Pdf::loadView('projects.pdfpro', compact('proyectos'));
        return $pdf->download('reporte_proyectos'.time().'.pdf');
    }



    public function graficos(){

        return view('projects.graficos');


    }

    public function graficosfacultad(){

    return view('projects.graficosfacultad');


    }

    public function graficosfinanciamientos(){

    return view('projects.graficosfinanciamiento');


    }

    public function graficosinvestigadores(){

    return view('projects.graficosinvestigadores');


    }

    public function obtenerdatosinicial()
    {
        $datos = DB::table('convocatoria')
        ->select('numeroconvocatoria', 'presupuesto')
        ->orderBy('anoconvocatoria', 'desc')
        ->limit(5)
        ->get();

        return response()->json($datos);
    }

    public function obtenerdatosfacultad()
    {
        $datos = DB::table('proyecto')
        ->join('facultad', 'facultad.idfacultad', '=', 'proyecto.idfacultad') // Unimos con la tabla facultad
        ->select('facultad.nombrefacultad', DB::raw('COUNT(proyecto.idproyecto) as cantidad_proyectos'))
        ->groupBy('facultad.nombrefacultad') // Agrupamos por el nombre de la facultad
        ->get();

        return response()->json($datos);
    }

    public function obtenerdatosfinanciamientos()
    {
        $datos = DB::table('proyecto')
        ->join('facultad', 'facultad.idfacultad', '=', 'proyecto.idfacultad') // Unimos con la tabla facultad
        ->join('pre_fuente', 'pre_fuente.idproyecto', '=', 'proyecto.idproyecto') // Unimos con la tabla pre_fuente
        ->select('facultad.nombrefacultad', DB::raw('SUM(pre_fuente.financiamiento) as total_financiamiento')) 
        ->groupBy('facultad.nombrefacultad') // Agrupamos por el nombre de la facultad
        ->get();


        return response()->json($datos);
    }

    public function obtenerdatosinvestigadores()
    {
        $datos = DB::table('proyecto')
            ->join('facultad', 'facultad.idfacultad', '=', 'proyecto.idfacultad') // Unimos con la tabla facultad
            ->join('colaboradores', 'colaboradores.idproyecto', '=', 'proyecto.idproyecto') // Unimos con la tabla colaboradores
            ->select(
                'facultad.nombrefacultad',
                DB::raw("SUM(CASE WHEN colaboradores.sexo = '1' THEN 1 ELSE 0 END) as total_hombres"),
                DB::raw("SUM(CASE WHEN colaboradores.sexo = '2' THEN 1 ELSE 0 END) as total_mujeres")
            )
            ->groupBy('facultad.nombrefacultad') // Agrupamos por el nombre de la facultad
            ->get();



        return response()->json($datos);
    }


public function proyectosexcel()
{
        $convocatoria = session('convocatoria', 'todas');
        $area = session('area', 'todas');
        $estado = session('estado', 'todas');
        $facultad = session('facultad', 'todas');


        $proyectos = DB::table('proyecto')
            ->leftJoin('estado_proyecto', 'estado_proyecto.idestadoproyecto', '=', 'proyecto.idestadoproyecto')
            ->leftJoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
            ->leftJoin('users', 'users.email', '=', 'proyecto.usuario')
            ->leftJoin('convocatoria', 'convocatoria.idconvocatoria', '=', 'proyecto.idconvocatoria')
            ->leftJoin('pre_fuente', 'pre_fuente.idproyecto', '=', 'proyecto.idproyecto')
            ->leftjoin('facultad', 'facultad.idfacultad', '=','proyecto.idfacultad')
            ->select(
                'proyecto.tituloproyecto',
                'estado_proyecto.nombreestadoproyecto',
                'area_conocimiento.nombreareaconocimiento',
                'users.name',
                'convocatoria.presupuesto',
                'facultad.nombrefacultad',
                DB::raw('SUM(pre_fuente.financiamiento) as total_financiamiento')
            )
            ->when($convocatoria && $convocatoria != 'todas', function ($query) use ($convocatoria) {
                return $query->where('convocatoria.idconvocatoria', $convocatoria);
            })
            ->when($facultad && $facultad != 'todas', function ($query) use ($facultad) {
                return $query->where('facultad.idfacultad', $facultad);
            })
            ->when($area && $area != 'todas', function ($query) use ($area) {
                return $query->where('area_conocimiento.idareaconocimiento', $area);
            })
            ->when($estado && $estado != 'todas', function ($query) use ($estado) {
                return $query->where('estado_proyecto.idestadoproyecto', $estado);
            })
            ->groupBy(
                'proyecto.idproyecto',
                'proyecto.tituloproyecto',
                'estado_proyecto.nombreestadoproyecto',
                'area_conocimiento.nombreareaconocimiento',
                'users.name',
                'convocatoria.presupuesto', 
                'facultad.nombrefacultad',
            )
            ->get();

    $data = $proyectos->map(function ($item) {
        return [
            'Título' => $item->tituloproyecto,
            'facultad' => $item->nombrefacultad,
            'Área de conocimiento' => $item->nombreareaconocimiento,
            'Investigador' => $item->name,
            'Financiamiento externo' => $item->total_financiamiento,
            'Financiamiento SIC UES' => $item->presupuesto,
            'Estado' => $item->nombreestadoproyecto,
        ];
    })->toArray();

    $fechaActual = date('Y-m-d');
    $nombreArchivo = 'proyectos_investigacion_' . $fechaActual . '.xlsx';

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
                ['Proyectos de Investigación'],
                ['Fecha: ' . $this->fecha],
                [], // Fila vacía
                ['Título', 'Facultad','Área de conocimiento', 'Investigador', 'Financiamiento externo', 'Financiamiento SIC UES', 'Estado'] // Encabezados de la tabla
            ];
        }

        public function styles(Worksheet $sheet)
        {
            // Combina las celdas para los títulos
            $sheet->mergeCells('A1:G1'); // Primera fila
            $sheet->mergeCells('A2:G2'); // Segunda fila
            $sheet->mergeCells('A3:G3'); // Tercera fila

            // Establece estilos para los títulos
            $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(12);
            $sheet->setCellValue('A1', 'Secretaría de Investigaciones Científicas de la Universidad de El Salvador');

            $sheet->getStyle('A2')->getFont()->setBold(true)->setSize(12);
            $sheet->setCellValue('A2', 'Proyectos de Investigación');

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
            $rowCount = count($this->data) + 6; // +5 para incluir las filas de encabezado
            $sheet->getStyle('A1:G' . $rowCount)->applyFromArray($styleArray);
        }
    }, $nombreArchivo);
}


}
