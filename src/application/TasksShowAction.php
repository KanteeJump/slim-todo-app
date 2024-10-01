<?php

declare(strict_types=1);

namespace kantee\application;

use kantee\domain\TaskModel;
use kantee\domain\TaskRepository;

class TasksShowAction {

    private TaskRepository $repository;

    public function __construct(TaskRepository $repository) {
        $this->repository = $repository;
    }

    public function action(): array {
        $data = array_map(function (TaskModel $task) {
            return [
                "id" => $task->getId(),
                "title" => $task->getTitle(),
                "description" => $task->getDescription(),
                "completed" => $task->isCompleted()
            ];
        }, $this->repository->searchAll());

        return $data;
    }

}