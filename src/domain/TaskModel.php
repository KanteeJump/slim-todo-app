<?php

declare(strict_types=1);

namespace kantee\domain;

class TaskModel {

    private string $id;
    private string $title;
    private string $description;
    private bool $completed;

    public function __construct(string $id, string $title, string $description, bool $completed) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->completed = $completed;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function isCompleted(): bool {
        return $this->completed;
    }
}
