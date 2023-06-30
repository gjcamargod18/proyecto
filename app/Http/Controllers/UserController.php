<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
Class UserController{

    public function vistaRegistrar(){
        return view('admin.vistas.register');
    }
    public function vistaEditar($user){
        $user = User::find($user);
        return view('admin.vistas.actualizar', ['user'=>$user]);
    }
    public function index ()
    {
        $users = User::select('users.*','roles.name as rol')
        ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')->get();

       return view('admin.usuarios', ['users'=>$users]);
    }


    public function createUser(Request $request)
    {
        $documento = $request->input('documento');
        $doc = User::select('documento')->where('documento', '=', $documento)->get();
        if(count($doc)>=1){
            session()->flash('status', 'El usuario ya existe');
            return to_route('usuarios');
        }else if($request->input('tipo_documento')==0){

            session()->flash('status', 'Debe asignar un tipo de documento');
            return to_route('usuarios');
        }else if($request->input('rol')==0){
            session()->flash('status', 'Debe asignar un rol');
            return to_route('usuarios');
        }else{
            $user = new User;
            $user->name = $request->input('name');
            $user->tipo_documento = $request->input('tipo_documento');
            $user->documento = $documento;
            $user->password = Hash::make($request->input('documento'));
            $user->save();

            $role = $request->input('rol');
            $user->assignRole($role);

            return to_route('usuarios');
        }
    }

    public function borrarUser(User $user){
        $user->delete();
        return to_route('usuarios');
    }

    public function actualizarUser(Request $request)
    {
        if($request->input('tipo_documento') == 0){
            $id = $request->input('id');
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->documento = $request->input('documento');
            $user->save();

            session()->flash('status', '¡Usuario Actualizado!');

            return to_route('usuarios');
        }else{
            $id = $request->input('id');
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->tipo_documento = $request->input('tipo_documento');
            $user->save();

            session()->flash('status', '¡Usuario Actualizado!');

            return to_route('usuarios');
        }
    }
}
