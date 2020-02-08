<?php
$container = $app->getContainer();
// Register component on container
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../src/templates', [
        'cache' => false
    ]);

    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};
