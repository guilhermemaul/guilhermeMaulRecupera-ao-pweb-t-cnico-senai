<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/addcarro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/addcarro/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'addcarro.phtml', $args);
    });

    $app->post('/addcarro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/addcarro/' route");

        $conexao = $container->get('pdo');

        $params = $request->getParsedBody();

        include_once('dependencies.php');
        $modelo = $_POST['modelo'];
        $marca = $_POST['marca'];
        $ano = $_POST['ano'];
        $dono = $_POST['dono'];
        
       
        $resultSet = $conexao->query ("INSERT INTO carro (modelo, marca, ano, dono) 
                                    VALUES ('$modelo', 
                                            '$marca', 
                                            '$ano',
                                            dono)");
        return $response->withRedirect('/carro/');
    });
};
