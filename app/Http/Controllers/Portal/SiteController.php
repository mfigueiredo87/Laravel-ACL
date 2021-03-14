<?php

namespace App\Http\Controllers\Portal;

use App\Requests;
use Illuminate\Http\Request;
use App\Post;
use Gate;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
       // $posts = $post->all();//exibindo todos os posts
        //$posts = $post->where('user_id', auth()->user()->id)->get();//lista o post de acordo ao user que cadastrou, ou seja, pelo id do utilizador
        
       // return view('home', compact('posts'));
       return view('portal.home.index');
    }

    public function update($idPost){

        $post = Post::find($idPost);

       // $this->authorize('update-post', $post);//update-post vem do authservice
       //esta verificacao é muito importante para indicar quem pode fazer o que!

       if(Gate::denies('update-post', $post))
                abort(403, 'Unauthorized');

        return view ('post-update', compact('post'));
    }
    //metodo para Debug

    public function rolesPermissions(){
       //pegando as informacoes do usuario logado
       $nameUser = auth()->user()->name;
       //var_dump("<h1>{$nameUser}</h1>");
       echo "<h1>{$nameUser}</h1>";
        //listar todos os perfis dos utilizadores logados

        foreach( auth()->user()->roles as $role ){
            echo "$role->name -> ";

            //recuperando as permissoes
            $permissions = $role->permissions;
            foreach( $permissions as $permission){
                echo " $permission->name, ";
            }
            echo '<hr>';
        }
    }
}
