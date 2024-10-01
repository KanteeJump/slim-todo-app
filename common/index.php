<?php

use Slim\Factory\AppFactory;
use Slim\Views\Twig;

require __DIR__ . "/../vendor/autoload.php";

session_start();

$app = AppFactory::create();
$twig = Twig::create(__DIR__ . "/templates", ["cache" => false]);

$middlewares = require __DIR__ . "/config/middlewares.php";
$middlewares($app, $twig);

$routes = require __DIR__ . "/config/routes.php";
$routes($app);

$app->run();