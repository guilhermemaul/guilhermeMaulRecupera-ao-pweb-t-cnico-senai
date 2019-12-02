<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();


    $app->get('/editar/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/editar/' route");



        $conexao = $container->get('pdo');

        
        
        $editar = $_POST;
      

        $resultSet = $conexao->query('UPDATE carro SET modelo = "'.$editar['modelo'].'", marca = "'.$editar['marca'].'",ano = "'.$editar['ano'].'"')->fetchAll();

        $args['editar'] = $resultSet;

        // Render index view
        return $container->get('renderer')->render($response, 'editar.phtml', $args);
    });
};
