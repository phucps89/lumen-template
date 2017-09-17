<?php

$router->group(['namespace' => 'Auth', 'prefix' => 'auth'], function(\Laravel\Lumen\Routing\Router $router){

    $router->group(['prefix' => 'login'], function (\Laravel\Lumen\Routing\Router $router){
        $router->get('/', [
            'as' => 'auth.login.index',
            'uses' => 'LoginController@index'
        ]);

        $router->post('/', [
            'as' => 'auth.login.post',
            'uses' => 'LoginController@post'
        ]);

        $router->group(['middleware' => 'jwt.auth'], function (\Laravel\Lumen\Routing\Router $router){
            $router->delete('/', [
                'as' => 'auth.login.logout',
                'uses' => 'LoginController@logout'
            ]);
        });
    });

});