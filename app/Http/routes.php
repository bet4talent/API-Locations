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

$app->get('/', ['middleware' => 'auth', function (Request $request) {
    $response = array(
        'status' => 'error',
        'message' => ''
    );

    $response['status'] = 'success';

    return json_encode($response);
}]);

//function () use ($app) {
//
//});
