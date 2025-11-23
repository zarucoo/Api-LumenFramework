<?php

$router->get('/', function () use ($router) {
    return response()->json([
        'message' => 'API de Productos con Lumen',
        'version' => $router->app->version(),
        'endpoints' => [
            'GET /api/products' => 'Listar todos los productos',
            'GET /api/products/{id}' => 'Ver un producto',
            'POST /api/products' => 'Crear producto',
            'PUT /api/products/{id}' => 'Actualizar producto',
            'DELETE /api/products/{id}' => 'Eliminar producto'
        ]
    ]);
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('products', 'ProductController@index');
    $router->get('products/{id}', 'ProductController@show');
    $router->post('products', 'ProductController@store');
    $router->put('products/{id}', 'ProductController@update');
    $router->delete('products/{id}', 'ProductController@destroy');
});