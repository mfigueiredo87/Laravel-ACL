<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\User;
use App\Permission;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
       // \App\Post::class=>\App\Policies\PostPolicy::class,//passando a politica de acesso

       //definindo as politicas pelos niveis e permissoes de acordo aos utilizadores
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        /*
        Gate::define('update-post', function(User $user, Post $post) {
            return $user->id == $post->user_id;//associa a informacao do post com o utilizador
        });
        */
        $permissions = Permission::with('roles')->get();//recupera todas as permissoes e carrega os objectos com todas as regras vinculadas
        //dd($permissions);//testar o array
        foreach ($permissions as $permission)
        {
            Gate::define($permission->name, function(User $user) use ($permission) { // passa o nome da permissao e associa ao utilizador logado
                return $user->hasPermission($permission);//verifica se o utilizador logado tem a devida permissao

            });

        }
        //verificar se for user Administrador atribuir todas as permissoes
        Gate::before(function (User $user, $hability){
            //se o usuario logado for administrador retorna true
            
            if ($user->hasAnyRoles('adm') )
            return true;
        });


         
    }
}
