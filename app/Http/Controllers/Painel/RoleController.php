<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Gate;
class RoleController extends Controller
{
    private $role;
    //construtor
    public function __construct(Role $role){
        $this->role = $role;

         //verificando a permissao
         if(Gate::denies('view_post'))
         return redirect()->back();
         //return abort(403, 'Nao autorizado!');
    }

    //metodo index
    public function index(){

       $roles = $this->role->paginate(10);

    //    if(Gate::denies('adm'))

    //    //redireciona para a ultima rota em vez de mostrar o erro
    //    return redirect()->back();
    if(Gate::denies('adm'))
    //return redirect()->back();
    return abort(403, 'Nao autorizado!');

       return view ('painel.roles.index', compact('roles'));
    }

    //metodo para listar as roles
    public function permissions($id){
        //recupera as roles pelo id
        $role = $this->role->find($id);
        //recuperar as permissoes
        $permissions = $role->permissions()->get();
        if(Gate::denies('adm'))
        //return redirect()->back();
        return abort(403, 'Nao autorizado!');
     return view ('painel.roles.permissions', compact('role','permissions'));
    }
}
