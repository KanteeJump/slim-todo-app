<?php

declare(strict_types=1);

namespace kantee\infrastructure;

use kantee\application\TasksShowAction;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

final class TasksController {

    private MemTaskRepository $repository;
    private TasksShowAction $showAction;

    public function __construct() {
        $this->repository = new MemTaskRepository();
        $this->showAction = new TasksShowAction($this->repository);
    }

    public function index(Request $request, Response $response, array $args): Response {
        $view = Twig::fromRequest($request);
        $data = [
            "tasks" => $this->showAction->action()
        ];

        return $view->render($response, "index.page.twig", $data);
    }

}