<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

//Modelos a utilizar
use App\Models\Aa_de_uu;
use App\Models\Persona;
use App\Models\GradoAcademico;
use App\Models\Carrera;
use App\Models\Cargo;
use App\Models\Pais;
use App\Models\UnidadDeInvestigacion;


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


    public function buscar($id_unidad)
    {                
        $personas = Persona::all();
        return view ('responsables.buscar',compact('personas','id_unidad'));      
    }


    public function buscarpersona(Request $request)
    {
        $DatosResponsable = Aa_de_uu::getPersona($request->post('nombre'));
        $DatosInvestigador = Aa_de_uu::getInvestigador($DatosResponsable[0]->id_persona);
        var_dump($DatosInvestigador);
    }

    public function seleccionarPersona(Request $request){
        $carreras = Carrera::all();
        $cargos = Cargo::all();
        $grados_academicos = GradoAcademico::all();

        $personaId = $request->input('persona_id_param');
        $id_unidad = $request->input('id_unidad_param');
        
        $persona = Persona::find($personaId);
        //dd($id_unidad);
        
        return view('responsables.create',
            compact(
                    'id_unidad',
                    'persona',
                    'carreras',
                    'cargos',
                    'grados_academicos'                    
                ));
    }

    //Formulario donde nosotros agregamos datos
    public function create($id_unidad)
    {

        $personas = Persona::all();
        $carreras = Carrera::all();
        $cargos = Cargo::all();
        $grados_academicos = GradoAcademico::all();
        //$unidad = UnidadDeInvestigacion::find($id_unidad);
            
        return view ('responsables.create', 
           compact(
               'personas',
               'carreras',
               'cargos',
               'grados_academicos',
               'id_unidad'
            )
        );
    }



    //Sirve para guardar datos en la BD
    public function store(Request $request)
    {
        
        //validacion de datos
        $validator = Validator::make($request->all(), [
            'id_g_acad' => 'required',
            'id_carrera' => 'required',
            'id_cargo' => 'required',
            'id_persona' => 'required',
            'id_unidad' => 'required'
        ]);

        $id_unidad = $request->input('id_unidad');
        //dd($id_unidad);

        //VERIFICAR SI APLICA O NO LA VALIDACION
        if ($validator->fails()) {
            //SI ES CIERTO PERMITA REDIRECCIONAR A LA VISTA DE CREATE
            return redirect()->route('responsable.create',['id_unidad'=>$id_unidad])
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        // aca se debera enviar la asociacion de la unidad de investigacion
        //$data['id_unidad'] = "1";

        // Muestra los datos para verificar
        //dd($data); 
        $nuevoResponsable = Aa_de_uu::create($data);

        if($nuevoResponsable) {
            return redirect()->route("responsable.index")->with("success", "Agregado con exito!");
        } else {
            return redirect()->route('responsable.create',['id_unidad'=>$id_unidad]);
        }
        
        
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
