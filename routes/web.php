<?php



//rota para o directorio painel
Route::group(['prefix'=>'painel'], function(){
   
    //PostController
    Route::get('posts','Painel\PostController@index');

    //PermissionController
    Route::get('permissions','Painel\PermissionController@index');
    //mostrar as roles
    Route::get('permission/{id}/roles','Painel\PermissionController@roles');
  
    //RoleController
    Route::get('roles','Painel\RoleController@index');
 
     //RoleController para mostrar as permissoes
     Route::get('roles/{id}/permissions','Painel\RoleController@permissions');
 
    //UserController
    Route::get('users','Painel\UserController@index');

    Route::get('novo', 'Painel\UserController@novo');

    //{{url("/painel/user/$user->id/roles")}}


      //mostrar as funcoes que um determinado usuario tem no sistema
      Route::get('user/{id}/roles','Painel\UserController@roles');

    //PainelController
 Route::get('/','Painel\PainelController@index');

});

Auth::routes();

Route::get('/', 'Portal\SiteController@index');

Route::get('/logout', function()
	{
	Auth::logout();
	Session::flush();
		return Redirect::to('/');
	});