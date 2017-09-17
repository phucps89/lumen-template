<?php

$router->group(['namespace' => 'Account', 'prefix' => 'account'], function(\Laravel\Lumen\Routing\Router $router){

    $router->group(['prefix' => 'user'], function(\Laravel\Lumen\Routing\Router $router){
        $router->get('/', [
            'as' => 'account.user.index',
            'uses' => 'UserController@index'
        ]);

        $router->group(['middleware' => 'jwt.auth'], function(\Laravel\Lumen\Routing\Router $router){
            $router->get('/profile', [
                'as' => 'account.user.profile',
                'uses' => 'UserController@profile'
            ]);
        });
    });
});