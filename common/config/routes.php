<?php

use kantee\infrastructure\TasksController;
use Slim\App;

return function (App $app) {
    $app->get("/", [TasksController::class, "index"]);
};