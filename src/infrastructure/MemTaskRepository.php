<?php

declare(strict_types=1);

namespace kantee\infrastructure;

use kantee\domain\TaskModel;
use kantee\domain\TaskRepository;

class MemTaskRepository implements TaskRepository {

    public function __construct() {
        if (!isset($_SESSION["tasks"])) {
            $_SESSION["tasks"] = [];
        }
        
        $_SESSION["tasks"] = [
            new TaskModel("1", "Buy milk", "Milk is the best drink", false),
            new TaskModel("2", "Buy bread", "Bread is the best food", false),
            new TaskModel("3", "Buy eggs", "Eggs are the best food", true),
            new TaskModel("4", "Buy cheese", "Cheese is the best food", false),
        ];
    }

    public function searchAll(): array {
        return $_SESSION["tasks"];
    }

    public function create(TaskModel $task): void {
        $_SESSION["tasks"][] = $task;
    }

    public function update(TaskModel $task): void {
        $this->delete($task->getId());
        $this->create($task);
    }

    public function delete(string $id): void {
        $_SESSION["tasks"] = array_filter($_SESSION["tasks"], function (TaskModel $task) use ($id) {
            return $task->getId() !== $id;
        });
    }

    public function search(string $name): array {
        return array_filter($_SESSION["tasks"], function (TaskModel $task) use ($name) {
            return $task->getTitle() === $name;
        });
    }

}