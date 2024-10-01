<?php

namespace kantee\domain;

interface TaskRepository {

    public function search(string $name): array;

    public function searchAll(): array;

    public function create(TaskModel $task): void;

    public function update(TaskModel $task): void;

    public function delete(string $id): void;

}