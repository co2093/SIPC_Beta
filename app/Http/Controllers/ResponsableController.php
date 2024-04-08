<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

//Modelos a utilizar
use App\Models\Aa_de_uu;
use App\Models\Persona;
use App\Models\GradoAcademico;
use App\Models\Carrera;
use App\Models\Cargo;
use App\Models\Pais;


class ResponsableController extends Controller
{

    //Pagina de Inicio
    public function index()
    {                
        $aa_de_uus = Aa_de_uu::all();
        return view ('responsables.index')
        -> with(
            'aa_de_uus', 
            $aa_de_uus);
            
    }


    public function buscar()
    {                
        
        return view ('responsables.buscar');      
    }


    public function buscarpersona(Request $request)
    {
        $DatosResponsable = Aa_de_uu::getPersona($request->post('nombre'));
        $DatosInvestigador = Aa_de_uu::getInvestigador($DatosResponsable[0]->id_persona);
        var_dump($DatosInvestigador);
    }

    //Formulario donde nosotros agregamos datos
    public function create()
    {

        $personas = Persona::all();
        $carreras = Carrera::all();
        $cargos = Cargo::all();
        $grados_academicos = GradoAcademico::all();
            
        return view ('responsables.create', 
           compact(
               'personas',
               'carreras',
               'cargos',
               'grados_academicos'
            )
        );
    }



    //Sirve para guardar datos en la BD
    public function store(Request $request)
    {
        
        //validacion de datos
        $request->validate([
            'nombre_persona' => 'required|string|min:5|max:150',
            'apellido_persona' => 'required|string|min:5|max:150',
            'telefono_persona' => 'required|max:8',
            'correo_persona' => 'required',
        ]);

        
        // Crear una nueva persona ---metodo <find>
        
       /*  $persona = new Persona();
        $persona->nombre_persona = $request->input('nombre_persona');
        $persona->apellido_persona = $request->input('apellido_persona');
        $persona->telefono_persona = $request->input('telefono_persona');
        $persona->correo_persona = $request->input('correo_persona');

        // Guardar la persona en la base de datos
        $persona->save(); */

     
        // Crear un nuevo investigador y asociarlo a la persona guardada

      //Buscar persona si existe
      
 
      
        $responsable = new Aa_de_uu();
        /* $responsable-> id_persona = $persona->id_persona; //Asociar el ID de la persona creada */
        $responsable->id_persona = $request->input('id_persona');
        $responsable->id_g_acad = $request->input('id_g_acad');
        $responsable->id_carrera = $request->input('id_carrera');
        $responsable->id_carrera = $request->input('id_cargo');
        // Guardar el responsable en la base de datos
        $responsable->save();

        return redirect()->route("responsables.index")->with("success", "Agregado con exito!");
        
  
    }



    //Servira para obtener un registro de nuestra Tabla
    public function show(aa_de_uu $responsable)
    {
        
        return view('responsables/delete');
    }

    

    //Este metodo sirve para traer los datos que se van a editar y los coloca en un formulario
    public function edit(aa_de_uu $responsable)
    {
        
        return view('responsables/edit');
    
    
    }

    
    //Este metodo actualiza los datos en BD
    public function update(Request $request, aa_de_uu $responsable)
    {
        
    }

   

    //Elimina un registro
    public function destroy(aa_de_uu $responsable)
    {
        
    }
}
