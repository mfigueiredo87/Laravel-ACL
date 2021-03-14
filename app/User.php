<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //retorna todas as funcoes, papeis e regras associadas ao usuario logado
    public function roles(){
        return $this->belongsToMany(\App\Role::class);
    }

    //criar o metodo hasPermission
    public function hasPermission(Permission $permission){
        //recuperar primeiramente as funcoes atribuidas as roles
        //dd($permission->roles);
        return $this->hasAnyRoles($permission->roles);
    }
    //verificar se o usuario logado existe e tem a funcao especifica
    public function hasAnyRoles($roles){
        if( is_array($roles) || is_object($roles) ){
            return !! $roles->intersect($this->roles)->count();//verifica se o usuario ta vinculado ao perfil logado e retornar a quantidade
                // foreach( $roles as $role ) {
                //   // dd($role->name);
                //   //verificar a regra
                //     return $this->hasAnyRoles($role);
                // } 
        }
        return $this->roles->contains('name', $roles);
    }
}
