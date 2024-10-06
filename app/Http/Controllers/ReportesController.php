<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\TOC;
use Illuminate\Support\Facades\DB;
use flash;
use Auth;

class ReportesController extends Controller
{
    //
    public function exportPrueba($cod){
        
        $usuario = Auth::user();


         $proyecto = DB::table('proyecto')
        ->leftjoin('tipo_proyecto', 'tipo_proyecto.idtipoproyecto', '=', 'proyecto.idtipoproyecto')
        ->leftjoin('area_conocimiento', 'area_conocimiento.idareaconocimiento', '=', 'proyecto.idareaconocimiento')
        ->select('proyecto.*', 'tipo_proyecto.tipoproyecto', 'area_conocimiento.nombreareaconocimiento')
        ->where('proyecto.idproyecto', '=', $cod)
        ->first();

        $obj = DB::table('objetivo')
        ->where('idproyecto', '=', $cod)
        ->where('tipo', '=', 1)
        ->first();


        $objetivos = DB::table('objetivo')
        ->where('idproyecto', '=', $cod)
        ->where('tipo', '=', 2)
        ->get();
      

        $act = DB::table('actividad')
        ->leftjoin('tipo_actividad', 'actividad.idtipoactividad','=','tipo_actividad.idtipoactividad')
        ->select('actividad.*', 'tipo_actividad.nombretipoactividad')
        ->where('actividad.idproyecto', '=', $cod)
        ->get();


        $recursos = DB::table('pre_recurso')
        ->leftjoin('unidad_medida', 'pre_recurso.idunidadmedida', '=', 'unidad_medida.idunidadmedida')
        ->leftjoin('tipo_recurso', 'pre_recurso.idtiporecurso', '=', 'tipo_recurso.idtiporecurso')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_recurso.idfuente')
        ->select('pre_recurso.*', 'unidad_medida.nombreunidadmedida', 'tipo_recurso.nombretiporecurso', 'pre_fuente.descripcionfuente')    
        ->where('pre_recurso.idproyecto', '=', $cod)
        ->get();



        $personal = DB::table('pre_contratacion')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
        ->leftjoin('tipo_contratacion', 'tipo_contratacion.idtipocontratacion', '=', 'pre_contratacion.idtipocontratacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_contratacion.idfuente')
        ->select('pre_contratacion.*', 'actividad.nombreactividad', 'actividad.idproyecto', 'tipo_contratacion.nombretipocontratacion', 'pre_fuente.descripcionfuente')
        ->where('actividad.idproyecto', '=', $cod)
        ->get();



        $viajes = DB::table('pre_viaje_local')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_local.idactividad')
        ->leftjoin('departamento', 'departamento.iddepartamento', '=', 'pre_viaje_local.iddepartamento')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_local.idfuente')
        ->select('pre_viaje_local.*', 'actividad.nombreactividad', 'departamento.departamento')
        ->where('pre_viaje_local.idproyecto', '=', $cod)
        ->get();

         $publicaciones = DB::table('pre_publicacion')
        ->leftjoin('tipo_publicacion', 'tipo_publicacion.idtipopublicacion', '=', 'pre_publicacion.idtipopublicacion')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_publicacion.idfuente')
        ->select('pre_publicacion.*', 'tipo_publicacion.nombretipopublicacion', 'pre_fuente.descripcionfuente')
        ->where('pre_publicacion.idproyecto', '=', $cod)
        ->get();


         $viajext = DB::table('pre_viaje_exterior')
        ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_viaje_exterior.idactividad')
        ->leftjoin('pais', 'pais.idpais', '=', 'pre_viaje_exterior.idpais')
        ->leftjoin('pre_fuente', 'pre_fuente.idfuente', '=', 'pre_viaje_exterior.idfuente')
        ->select('pre_viaje_exterior.*', 'actividad.nombreactividad', 'pais.nombrepais')
        ->where('pre_viaje_exterior.idproyecto', '=', $cod)
        ->first();

        //dd($viajext);

        $totalPersonal = DB::table('pre_contratacion')
            ->leftjoin('actividad', 'actividad.idactividad', '=', 'pre_contratacion.idactividad')
            ->where('actividad.idproyecto', '=', $cod)
            ->sum('total');


        $totalRecursos = DB::table('pre_recurso')
            ->where('idproyecto', $cod)
            ->sum('subtotalrecurso');

        $totalViajes = DB::table('pre_viaje_local')
            ->where('idproyecto', $cod)
            ->sum('totalplanviaje');

        $totalViajext = DB::table('pre_viaje_exterior')
            ->where('idproyecto', $cod)
            ->sum('totalplanviajeext');    

        $totalPublicacion = DB::table('pre_publicacion')
            ->where('idproyecto', $cod)
            ->sum('montopublicacion');


        //dd($usuario->email);



        // Create a new PhpWord object
        $phpWord = new PhpWord();
        $phpWord->addTitleStyle(1, ['name' => 'Arial', 'size' => 16, 'bold' => true]);
        $phpWord->addTitleStyle(2, ['name' => 'Arial', 'size' => 14, 'bold' => true]);

        // Add a new section to the document
        $section = $phpWord->addSection();


        $section->addImage('img/logo.png', [
        'width' => 150,  // Ancho de la imagen
        'height' => 50, // Altura de la imagen
        'alignment' => 'left' // Alineación de la imagen
        ]);
        $section->addTextBreak(3);

        // Add text to the section
        $section->addText('PROYECTO DE INVESTIGACIÓN.');
        $section->addTextBreak(1);
        $textRun = $section->addTextRun();
        
        $textRun->addText('TÍTULO DEL PROYECTO: ');
        $textRun->addText($proyecto->tituloproyecto); 
        
        $section->addTextBreak(1);
        $textRun = $section->addTextRun();

        $textRun->addText('ÁREA DEL CONOCIMIENTO: ');
        $textRun->addText($proyecto->nombreareaconocimiento); 
        
        $section->addTextBreak(1);
        $textRun = $section->addTextRun();
        
        $textRun->addText('INVESTIGADOR PRINCIPAL: ');
        $textRun->addText($usuario->name); 
       
        $section->addTextBreak(1);
        $section->addText('TELÉFONO: ');
        $section->addTextBreak(1);
        $textRun = $section->addTextRun();
        
        $textRun->addText('EMAIL: ');
        $textRun->addText($usuario->email); 
       

        $section->addTextBreak(1);
        $section->addText('DIRECCIÓN: ');
        $section->addTextBreak(1);
        $section->addText('FACULTAD: ');
//        $section->addTextBreak(1);
//        $section->addText('INVESTIGADORES ASOCIADOS: ');
        $section->addTextBreak(1);
        $section->addText('FECHA PROBABLE DE INICIO: ');
        $section->addTextBreak(1);
        
        $textRun = $section->addTextRun();
        $textRun->addText('TIEMPO DE EJECUCIÓN: ');
        $textRun->addText($proyecto->tiempo); 
        $textRun->addText(' horas ');


        $section->addTextBreak(1);
        $section->addText('MONTO DEL PRESUPUESTO SOLICITADO AL SIC-UES: ');
        $section->addTextBreak(1);
        $section->addText('COLABORACIÓN EXTERNA:  ');
        $section->addTextBreak(1);
        $section->addText('FINANCIAMIENTO EXTERNO: ');
        $section->addTextBreak(1);
        $section->addText('FINANCIAMIENTO DE LA FACULTAD: ');
        $section->addTextBreak(1);
        $section->addText('MONTO TOTAL DEL PRESUPUESTO:  ');
        
        $section->addPageBreak();
        $section->addTextBreak(1);
        $section->addTOC(
            [
                'tabLeader' => TOC::TAB_LEADER_DOT, // Líder de pestañas (puntos entre el título y el número de página)
                'size' => 12, // Tamaño del texto en el TOC
                'name' => 'Arial', // Fuente del TOC
            ]
        );

        $section->addPageBreak();
        $section->addTitle('RESUMEN:', 1);
      
        $section->addPageBreak();
        $section->addTitle('1. Introducción', 1);
        $section->addTextBreak(5);
        $section->addTitle('1.1. Antecedentes', 2);
        $section->addTextBreak(5);
        $section->addTitle('1.2. Justificación', 2);
        $section->addTextBreak(5);
        $section->addTitle('1.3. Planteamiento del problema', 2);


        $section->addPageBreak();
        $section->addTitle('2. Objetivos', 1);
        $section->addTextBreak(1);
        $section->addTitle('2.1. General', 2);
        
        $section->addTextBreak(1);

        $textRun = $section->addTextRun();
        $textRun->addText($obj->descripcion); 



        $section->addTextBreak(5);
        $section->addTitle('2.2. Específicos', 2);

        //$section = $phpWord->addSection();

        foreach ($objetivos as $o) {
            $section->addTextBreak(1);
            $section->addListItem($o->descripcion); // Cada texto se añade en una nueva línea
        }


        $section->addPageBreak();
        $section->addTitle('3. Marco teórico', 1);


        $section->addPageBreak();
        $section->addTitle('4. Diseño metodológico', 1);
        $section->addTextBreak(2);
        $section->addTitle('4.1. Tipo de estudio', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.2. Área de estudio', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.3. Definición y medición de variables', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.4. Universo y muestra', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.5. Hipótesis de trabajo', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.6. Métodos, técnicas e instrumentos de recolección de datos', 2);
        $section->addTextBreak(2);
        $section->addTitle('4.7. Plan de análisis y tratamiento estadístico de los dato', 2);        

        $section->addPageBreak();
        $section->addTitle('5. Resultados esperados', 1);


        $section->addPageBreak();
        $section->addTitle('6. Supuestos y riesgos', 1);
        $section->addTextBreak(2);


        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);
        // Añadir la primera fila
        $table->addRow();
        $table->addCell(1000)->addText('N°', ['bold' => true]);
        $table->addCell(2500)->addText('Supuestos', ['bold' => true]);
        $table->addCell(2500)->addText('Riesgos', ['bold' => true]);
        $table->addCell(2500)->addText('Precauciones', ['bold' => true]);
        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');
        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');
        $table->addRow();
        $table->addCell(1000)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');
        $table->addCell(2500)->addText('');

        $section->addPageBreak();
        $section->addTitle('7. Cronograma de actividades', 1);
        $section->addTextBreak(2);

        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);
        // Añadir la primera fila
        $table->addRow();
        $table->addCell(2900)->addText('Descripción de la actividad', ['bold' => true]);
        $table->addCell(2900)->addText('Tipo de actividad', ['bold' => true]);
        $table->addCell(1700)->addText('Fecha de inicio', ['bold' => true]);
        $table->addCell(1700)->addText('Fecha de fin', ['bold' => true]);

        //dd($act);

        foreach ($act as $a) {
            $table->addRow();
            $table->addCell(2900)->addText($a->nombreactividad);
            $table->addCell(2900)->addText($a->nombretipoactividad);
            $table->addCell(1700)->addText($a->fechainicioactividad);
            $table->addCell(1700)->addText($a->fechafinactividad);
        }



        $section->addPageBreak();
        $section->addTitle('8. Presupuesto y financiamiento', 1);
        $section->addTextBreak(2);
        $section->addTitle('8.1. Equipos', 2);
        $section->addTextBreak(2);

        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(2300)->addText('Nombre del bien', ['bold' => true]);
        $table->addCell(2900)->addText('Especificaciones técnicas', ['bold' => true]);
        $table->addCell(1000)->addText('Cantidad', ['bold' => true]);
        $table->addCell(2000)->addText('Costo unitario (USD)', ['bold' => true]);       
        $table->addCell(1000)->addText('Total', ['bold' => true]);
        


        foreach ($recursos as $r) {
            $table->addRow();
            $table->addCell(2300)->addText($r->nombrerecurso);
            $table->addCell(2900)->addText($r->especificacionestecnicas);
            $table->addCell(1000)->addText($r->cantidadrecurso);
            $table->addCell(2000)->addText($r->preciorecurso);
            $table->addCell(1000)->addText($r->subtotalrecurso);
        }

        //dd($totalRecursos);
       
        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText($totalRecursos);


        //$section->addTextBreak(2);
        //$section->addTitle('8.2. Materiales y suministros', 2);
        //$section->addTextBreak(2);
        //$section->addTitle('8.3. Reactivos', 2);
        $section->addTextBreak(2);
        $section->addTitle('8.2. Contratación de personal', 2);
        $section->addTextBreak(2);

        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(2300)->addText('Perfil', ['bold' => true]);
        $table->addCell(2900)->addText('Actividad', ['bold' => true]);
        $table->addCell(1000)->addText('Horas laborales', ['bold' => true]);
        $table->addCell(2000)->addText('Pago por hora (USD)', ['bold' => true]);       
        $table->addCell(1000)->addText('Salario total (USD)', ['bold' => true]);


        foreach ($personal as $p) {
            $table->addRow();
            $table->addCell(2300)->addText($p->nombretipocontratacion);
            $table->addCell(2900)->addText($p->nombreactividad);
            $table->addCell(1000)->addText($p->dias);
            $table->addCell(2000)->addText($p->pago);
            $table->addCell(1000)->addText($p->total);
        }

       
        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText($totalPersonal);



        $section->addTextBreak(2);
        $section->addTitle('8.3. Viajes locales', 2);
        $section->addTextBreak(2);

        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(2400)->addText('Departamento', ['bold' => true]);
        $table->addCell(2400)->addText('Destino', ['bold' => true]);
        $table->addCell(2400)->addText('Actividad', ['bold' => true]);
        $table->addCell(1000)->addText('Días', ['bold' => true]);       
        $table->addCell(1000)->addText('Total (USD)', ['bold' => true]);


        foreach ($viajes as $v) {
            $table->addRow();
            $table->addCell(2400)->addText($v->departamento);
            $table->addCell(2400)->addText($v->destinoviaje);
            $table->addCell(2400)->addText($v->nombreactividad);
            $table->addCell(1000)->addText($v->cantidaddias);
            $table->addCell(1000)->addText($v->totalplanviaje);
        }

       
        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText($totalViajes);


        $section->addTextBreak(2);

        $section->addTitle('8.4. Viajes al exterior', 2);
        $section->addTextBreak(2);


        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(2400)->addText('País', ['bold' => true]);
        $table->addCell(2400)->addText('Destino', ['bold' => true]);
        $table->addCell(2400)->addText('Actividad', ['bold' => true]);
        $table->addCell(1000)->addText('Boleto', ['bold' => true]);
        $table->addCell(1000)->addText('Inscripción', ['bold' => true]);
        $table->addCell(1000)->addText('Días', ['bold' => true]);        


            $table->addRow();
            $table->addCell(2400)->addText($viajext->nombrepais);
            $table->addCell(2400)->addText($viajext->destinoviaje);
            $table->addCell(2400)->addText($viajext->nombreactividad);
            $table->addCell(1000)->addText($viajext->costoboleto);
            $table->addCell(1000)->addText($viajext->inscripcionevento);
            $table->addCell(1000)->addText($viajext->numerodias);
        


        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText($totalViajext);





        $section->addTextBreak(2);

        $section->addTitle('8.5. Publicaciones', 2);  
        $section->addTextBreak(2);

        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(2300)->addText('Tipo', ['bold' => true]);
        $table->addCell(5200)->addText('Detalle', ['bold' => true]);      
        $table->addCell(1500)->addText('Costo (USD)', ['bold' => true]);


        foreach ($publicaciones as $pu) {
            $table->addRow();
            $table->addCell(2300)->addText($pu->nombretipopublicacion);
            $table->addCell(5200)->addText($pu->detallepublicacion);
            $table->addCell(1500)->addText($pu->montopublicacion);

        }

        $table->addRow();
        $table->addCell(7500)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1500)->addText($totalPublicacion);



        $section->addTextBreak(2);
        $section->addTitle('8.6. Resumen del presupuesto', 2);    
        $section->addTextBreak(2);



        $table = $section->addTable([
            'borderSize' => 6,     // Tamaño del borde
            'borderColor' => '999999', // Color del borde
            'cellMargin' => 50,    // Margen de la celda
        ]);

        $table->addRow();
        $table->addCell(7000)->addText('Detalle', ['bold' => true]);
        $table->addCell(2500)->addText('Monto', ['bold' => true]);


        $table->addRow();
        $table->addCell(7000)->addText('Recursos');
        $table->addCell(2500)->addText($totalRecursos);
        $table->addRow();
        $table->addCell(7000)->addText('Contrataciones');
        $table->addCell(2500)->addText($totalPersonal);

        $table->addRow();
        $table->addCell(7000)->addText('Viáticos nacionales');
        $table->addCell(2500)->addText($totalViajes);

        $table->addRow();
        $table->addCell(7000)->addText('Viáticos internacionales');
        $table->addCell(2500)->addText($totalViajext);

        $table->addRow();
        $table->addCell(7000)->addText('Publicaciones');
        $table->addCell(2500)->addText($totalPublicacion);
       
        $totalPr = $totalRecursos+$totalViajes+$totalPersonal+$totalPublicacion;

        $table->addRow();
        $table->addCell(7000)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(2500)->addText($totalPr, ['bold' => true]);
       




        $section->addTextBreak(2);

        $section->addPageBreak();
        $section->addTitle('9. Consideraciones éticas', 1);

        $section->addPageBreak();
        $section->addTitle('10. Referencias bibliográficas', 1);

        $section->addPageBreak();
        $section->addTitle('11. Anexos', 1);        


        //

        // Define the file name
        $fileName = 'protocolo_'.'proyecto_'.$cod.'_'.time().'.docx';

        // Save the file temporarily
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($temp_file);

        // Return the file as a response for download
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);


    }
}
