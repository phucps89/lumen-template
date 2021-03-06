<?php

require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv\Dotenv(__DIR__ . '/../'))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->configure('view');
$app->configure('repository');
$app->configure('auth');
$app->configure('jwt');
$app->configure('filesystems');
$app->configure('mail');
$app->configure('queue');
$app->configure('swagger-lume');
$app->configure('entrust');

$app->instance('path.config', app()->basePath() . DIRECTORY_SEPARATOR . 'config');

$app->withFacades(true, [
    /**
     * Class alias here
     */
    App\Services\Response\ResponseFacade::class => 'RS',
    App\Services\S3\S3Facade::class => 'S3',
    Zizaco\Entrust\EntrustFacade::class => 'Entrust',
    Illuminate\Support\Facades\Notification::class => 'Notification',
]);

$app->alias('mailer', \Illuminate\Contracts\Mail\Mailer::class);

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//    App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'jwt.auth' => Tymon\JWTAuth\Http\Middleware\Authenticate::class,
    'jwt.refresh' => \Tymon\JWTAuth\Http\Middleware\RefreshToken::class,
    'role' => \Zizaco\Entrust\Middleware\EntrustRole::class,
    'permission' => \Zizaco\Entrust\Middleware\EntrustPermission::class,
    'ability' => \Zizaco\Entrust\Middleware\EntrustAbility::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

$app->register(App\Providers\AppServiceProvider::class);

app('queue.connection');

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group(['namespace' => 'App\Http\Controllers'], function (\Laravel\Lumen\Routing\Router $router) {
    require __DIR__ . '/../routes/web.php';
    require __DIR__ . '/../routes/auth.php';
    require __DIR__ . '/../routes/account.php';
});

return $app;
