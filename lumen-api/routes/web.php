<?php

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

$router->group(['prefix'=>'api'], function() use($router){
    $router->get('/informes', 'InformeController@index');
    $router->post('/informe', 'InformeController@create');
    $router->get('/informe/{id}', 'InformeController@show');
    $router->put('/informe/{id}', 'InformeController@update');
    $router->delete('/informe/{id}', 'InformeController@destroy');
});
