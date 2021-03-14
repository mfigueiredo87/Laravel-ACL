<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;
class PermissionController extends Controller
{
    private $permission;
    //construtor
    public function __construct(Permission $permission){
        $this->permission = $permission;
        //verificando a permissao
        if(Gate::denies('adm'))
        return redirect()->back();
        //return abort(403, 'Nao autorizado!');
    }
    
    //metodo index

    public function index(){

       $permissions = $this->permission->paginate(10);

      // $this->checkPermission();
      if(Gate::denies('adm'))
        //return redirect()->back();
        return abort(403, 'Nao autorizado!');
       return view ('painel.permissions.index', compact('permissions'));
    }

    public function roles($id){
        //recupera as permissions pelo id
        $permission = $this->permission->find($id);
        //recuperar as permissoes
        $roles = $permission->roles()->get();

        //$this->checkPermission();
        if(Gate::denies('adm'))
        //return redirect()->back();
        return abort(403, 'Nao autorizado!');
     return view ('painel.permissions.roles', compact('permission','roles'));
    }
   

   

}
