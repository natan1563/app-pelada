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

    $router->post('/login', 'UsuarioController@login');

    $router->post('/cadastro/usuario', 'UsuarioController@store');

    $router->post('/cadastro/pelada', 'PeladaController@store');

    $router->put('/vinculo/pelada/{id_pelada}', 'PeladaController@update');

    $router->put('/pelada/convite/{id_usuario}', 'PeladaController@inviteToPelada');

});
