<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();


    $app->get('/carro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/carro/' route");



        $conexao = $container->get('pdo');


      
        $conexao = $container->get('pdo');
        

        $resultSet = $conexao->query('SELECT * FROM carro')->fetchAll();

        $args['carros'] = $resultSet;
       
           
      


        // Render index view
        return $container->get('renderer')->render($response, 'carro.phtml', $args);
    });
    $app->get('/limparcarro/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/limparcarro/' route");

      
          unset($_SESSION['carro']);
         

        
        return $response->withRedirect('/addcarro/');
    });

};
