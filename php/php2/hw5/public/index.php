<?php

include $_SERVER['DOCUMENT_ROOT'] .
    '/../services/Autoload.php';
include $_SERVER['DOCUMENT_ROOT'] .
    '/../vendor/autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'];

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new \App\services\renders\TmplRenderServices());
    $controller->run($actionName);
}

$loader = new \Twig\Loader\ArrayLoader([
    'index' => 'Hello {{ name }}!',
]);
$a = new \Twig\Environment($loader);


    $twig = new \App\services\renders\TwigRenderServices();

return $twig->renderTmpl('layouts/main.php',['content'=>'hello']);


