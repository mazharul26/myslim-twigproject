<?php



session_start();

require __DIR__.'/../vendor/autoload.php';

$app = new \Slim\App([
    'settings'=>[
        'displayErrorDetails'=>true,
    ]
]);

$container= $app->getContainer();



$container['view']=function($container){
    $views =new \Slim\Views\Twig(__DIR__.'/../resouces/views',[

        'cache'=>false,
    ]);
    $views->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    return $views;

};

/*
$container['HomeController']= function($container){
         $container->return new \App\Controller\HomeController


};

*/

require __DIR__.'/../app/routes.php';
