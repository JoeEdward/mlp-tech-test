<?php

namespace Tests\Unit\Models;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_complete_attribute(): void
    {
        $completeTask = Task::factory()->completed()->create();

        $this->assertTrue($completeTask->is_complete);

        $inCompleteTask = Task::factory()->create();

        $this->assertFalse($inCompleteTask->is_complete);
    }


    public function test_mark_as_complete_method(): void
    {
        $incompleteTask = Task::factory()->create();

        $this->assertFalse((bool) $incompleteTask->completed_at);

        $incompleteTask->markTaskAsComplete();

        $this->assertTrue((bool) $incompleteTask->completed_at);
    }
}
