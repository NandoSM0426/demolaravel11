<?php

use App\Models\Task;

it('una tarea tiene un path o url', function () {
    $task = Task::factory()->create();

    expect($task->path())->toBe('/tasks/'. $task->id);
});
