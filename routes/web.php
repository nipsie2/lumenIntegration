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

$router->get('/', ['uses' => 'HomeController@index']);
$router->get('/hello', ['uses' => 'HomeController@hello']);
$router->get('/home', ['middleware' => 'auth', 'uses' => 'HomeController@home']);

$router->group(['prefix' => 'users'], function() use ($router){
    $router->post('/default', ['uses' => 'HomeController@defaultUser']);
    $router->post('/new', ['uses' => 'HomeController@createUser']);
    $router->get('/all', ['uses' => 'HomeController@getUsers']);
});

$router->group(['prefix' => 'auth'], function() use ($router){
    $router->post('/register', ['uses' => 'AuthController@register']);
    $router->post('/login', ['uses' => 'AuthController@login']);
});

$router->get('/home', ['middleware' => 'jwt.auth', 'uses' => 'HomeController@home']);

// $router->get('/get', function () {
//     return 'GET';
// });

// $router->get('/getDaftarMhs', 'abcController@getDaftarMhsBayar');

// $router->put('/putRestriksi/idMHS', 'abcController@updateRestriksi');

// $router->post('/post', function () {
//     return 'POST';
// });
    
// $router->put('/put', function () {
//     return 'PUT';
// });

// $router->patch('/patch', function () {
//     return 'PATCH';
// });
    
// $router->delete('/delete', function () {
//     return 'DELETE';
// });
   
// $router->options('/options', function () {
//     return 'OPTIONS';
// });

$router->get('/auth/login', ['as' => 'route.auth.login', function () {
    return 'Anda telah login.';
}]);

$router->get('/profile', function () {
    return redirect()->route('route.auth.login');
    });

$router->get('/user/{id}', function ($id){
    return 'User Id = ' . $id;
});

$router->get('/post/{postId}/comments/{commentId}', function ($postId, $commentId){
    return 'Post ID = ' . $postId . ' Comments ID = ' . $commentId;
});

$router->get('/users[/{userId}]', function ($userId = null){
    return $userId === null ? 'Data semua users' : 'Data user dengan id ' . $userId;
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', function () { // menjadi /users/, /users => prefix, / => path
    return "GET /users";
    });
    });

$router->get('/admin/home/', ['middleware' => 'age', function (){
    return 'Dewasa';
}]);

$router->get('/fail', function () {
    return 'Dibawah umur';
});