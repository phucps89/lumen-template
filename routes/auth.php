<?php

$router->group(['namespace' => 'Auth', 'prefix' => 'auth'], function(\Laravel\Lumen\Routing\Router $router){
    $router->get('/login', [
        'as' => 'auth.login.index',
        'uses' => 'LoginController@index'
    ]);

    $router->post('/login', [
        'as' => 'auth.login.post',
        'uses' => 'LoginController@post'
    ]);

});