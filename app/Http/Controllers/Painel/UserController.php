<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class UserController extends Controller
{
    private $user;
    //construtor
    public function __construct(User $user){
        $this->user = $user;
         //verificando a permissao
         if(Gate::denies('user'))
         return redirect()->back();
         //return abort(403, 'Nao autorizado!');
    }

    //metodo index

    public function index(){

       $users = $this->user->paginate(10);

    //    if(Gate::denies('user'))

    //    //redireciona para a ultima rota em vez de mostrar o erro
    //    return redirect()->back();

       return view ('painel.users.index', compact('users'));
    }

    public function roles($id){
        //recupera o usuario pelo id
        $user = $this->user->find($id);
        //recuperar a as funcoes ou roles
        $roles = $user->roles()->get();

     return view ('painel.users.roles', compact('user','roles'));
    }

    public function novo(){

        return "pagina de cadastro de utilizadores";
    }
}
