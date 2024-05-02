<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Creo permiso
        //Permission::create(['name' => 'edit4']);
        Permission::create(['name' => 'propuesta']); //Candidato

        Permission::create(['name' => 'experienciaCientifica']); //investigador
        Permission::create(['name' => 'formacionAcademica']);
        Permission::create(['name' => 'otrasCompetencias']);
        Permission::create(['name' => 'proyectos']);
        Permission::create(['name' => 'redInvestigador']);
        Permission::create(['name' => 'recursos']); //Investigador

        Permission::create(['name' => 'GesPIC']); //gestorSeguimiento o gestorDeInvestigacion
        
        Permission::create(['name' => 'AsignaProTic']); //DirectorEjecutivo

        Permission::create(['name' => 'revisionProTic']); //ReferenteDeInvestigacion

        Permission::create(['name' => 'evaluacion']); //parEvaluadro

        Permission::create(['name' => 'estadosDeInvestigacion']); //secretarioDeInvestigacion

        Permission::create(['name' => 'proyectosInvestigacion']); //unidadDeInvestigacion

        Permission::create(['name' => 'usuario']); //administrador
        Permission::create(['name' => 'role']); //administrador



        //Creo Rol
		//$role = Role::create(['name' => 'admin4']);
        $candidato = Role::Create(['name' => 'candidato']);
        $investigador = Role::Create(['name' => 'investigador']);
        $gestorSeguimiento = Role::create(['name' => 'gestorSeguimiento']);//GestorDeInvestigacion
        $directorEjecutivo = Role::create(['name' => 'directorEjecutivo']);
        $referenteDeInvestigacion = Role::create(['name' => 'referenteDeInvestigacion']);
        $parEvaluador = Role::create(['name' => 'parEvaluador']);
        $secretarioDeInvestigacion = Role::create(['name' => 'secretarioDeInvestigacion']);
        $unidadDeInvestigacion = Role::create(['name' => 'UnidadDeInvestigacion']);
        $administrador = Role::create(['name' => 'administrador']);

        //Asigno permiso a rol
		//$role->givePermissionTo('edit4');
        $candidato->givePermissionTo('propuesta');
        $investigador->syncPermissions(['experienciaCientifica', 'formacionAcademica', 'otrasCompetencias', 'proyectos', 'redInvestigador', 'recursos']);
        $gestorSeguimiento->givePermissionTo('GesPIC');
        $directorEjecutivo->givePermissionTo('AsignaProTic');
        $referenteDeInvestigacion->givePermissionTo('revisionProTic');
        $parEvaluador->givePermissionTo('evaluacion');
        $secretarioDeInvestigacion->givePermissionTo('estadosDeInvestigacion');
        $unidadDeInvestigacion->givePermissionTo('proyectosInvestigacion');
        $administrador->givePermissionTo('usuario');
        $administrador->givePermissionTo('role');
        
    }
}

