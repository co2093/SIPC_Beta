<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    public function userRol()
    {
        $roles = Role::all();
        $usuarios = User::all();
        $usuario = User::leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')->select('users.id', 'users.name as name_user', 'users.email', 'roles.name as name_rol')->get();
        return view('roles.userRol', compact(['usuario']));
    }
    public function userRolCU(Request $request)
    {
        $id = $request-> id;
        $usuario = User::find($id);       
        $roles = Role::all();

        return view('roles.userRolCU', compact(['usuario','roles']));
    }
    public function userRolAsig(Request $request)
    {
        $rol = $request-> rol;
        $id = $request-> id;
        $usuario = User::find($id);

        $existe = DB::table('model_has_roles')->select('model_id')->where('model_id', $id)->first();

        if($existe){
            DB::table('model_has_roles')->where('model_id', $id)->update(['model_id' => $usuario->id, 'model_type'=>'App\Models\User', 'role_id'=> $rol]);
        }
        else{
            DB::table('model_has_roles')->insert(['model_id' => $usuario->id, 'model_type'=>'App\Models\User', 'role_id'=> $rol]);
        }

        

        return $this->userRol();
    }

}
