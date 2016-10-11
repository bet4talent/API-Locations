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

$app->get('/', function () use ($app) {
    $response = array(
        'status' => 'error',
        'message' => ''
    );

    $response['status'] = 'success';

    return response()->json($response);
});

$app->get('/unauthorized', ['as' => 'unauthorized', function () {
    $response = array(
        'status' => 'error',
        'message' => ''
    );

    $response['message'] = 'Access unauthorized';

    return response()->json($response, 401);
}]);
