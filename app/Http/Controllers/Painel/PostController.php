<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    private $post;
    //construtor
    public function __construct(Post $post){
        $this->post = $post;
         //verificando a permissao
         if(Gate::denies('view_post'))
         return redirect()->back();
        // return abort(403, 'Nao autorizado!');
    }

    //metodo index

    public function index(){
    
       $posts = $this->post->paginate(5);

    // //    negando o acesso do post pela url, ja foi definido na view /post
    //    if(Gate::denies('view_post'))

    //    //redireciona para a ultima rota em vez de mostrar o erro
    //    return redirect()->back();
    //   // abort(403, 'Nao permitido a listar os posts');

       return view ('painel.posts.index', compact('posts'));
    }
}
