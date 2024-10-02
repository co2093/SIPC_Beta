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
        $section->addTextBreak(5);
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
        $table->addCell(2900)->addText('Resultados esperados', ['bold' => true]);
        $table->addCell(1700)->addText('Fecha de inicio', ['bold' => true]);
        $table->addCell(1700)->addText('Fecha de fin', ['bold' => true]);




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
        
        $table->addRow();
        $table->addCell(2300)->addText('');
        $table->addCell(2900)->addText('');
        $table->addCell(1000)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(1000)->addText('');
       
        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText('');


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
        $table->addCell(2900)->addText('Funciones', ['bold' => true]);
        $table->addCell(1000)->addText('Horas laborales', ['bold' => true]);
        $table->addCell(2000)->addText('Pago por hora (USD)', ['bold' => true]);       
        $table->addCell(1000)->addText('Salario total (USD)', ['bold' => true]);

        $table->addRow();
        $table->addCell(2300)->addText('');
        $table->addCell(2900)->addText('');
        $table->addCell(1000)->addText('');
        $table->addCell(2000)->addText('');
        $table->addCell(1000)->addText('');
       
        $table->addRow();
        $table->addCell(8200)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1000)->addText('');



        $section->addTextBreak(2);
        $section->addTitle('8.3. Viajes locales', 2);
        $section->addTextBreak(2);
        $section->addTitle('8.4. Viajes al exterior', 2);
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
        $table->addCell(1500)->addText('Costo(USD)', ['bold' => true]);

        $table->addRow();
        $table->addCell(2300)->addText('');
        $table->addCell(5200)->addText('');
        $table->addCell(1500)->addText('');

        $table->addRow();
        $table->addCell(7500)->addText('Total (USD)', ['bold' => true]);
        $table->addCell(1500)->addText('');



        $section->addTitle('8.7. Otros bienes o servicios', 2);  
        $section->addTextBreak(2);
        $section->addTitle('8.7. Resumen del presupuesto', 2);    


        $section->addPageBreak();
        $section->addTitle('9. Consideraciones éticas', 1);

        $section->addPageBreak();
        $section->addTitle('10. Referencias bibliográficas', 1);

        $section->addPageBreak();
        $section->addTitle('11. Anexos', 1);        


        //

        // Define the file name
        $fileName = 'sample.docx';

        // Save the file temporarily
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($temp_file);

        // Return the file as a response for download
        return response()->download($temp_file, $fileName)->deleteFileAfterSend(true);


    }
}
