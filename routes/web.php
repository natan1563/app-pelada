<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api'], function() use ($router) {

    $router->post('login', 'UsuarioController@login');

    $router->post('cadastro/usuario', 'UsuarioController@store');

    $router->group(['middleware' => 'autenticador'], function () use ($router) {
        $router->get('peladas', 'PeladaController@index');

        $router->post('cadastro/pelada', 'PeladaController@store');

        $router->post('vinculo/pelada', 'PeladaUsuarioController@store');

        $router->put('vinculo/pelada/{id}', 'PeladaUsuarioController@update');

        $router->delete('vinculo/pelada/{id}', 'PeladaUsuarioController@cancel');

        $router->post('pelada/convite', 'PeladaUsuarioController@convidaPelada');
    });

});
