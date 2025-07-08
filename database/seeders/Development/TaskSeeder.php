<?php

namespace Database\Seeders\Development;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::factory()->count(3)->create();

        Task::factory()->count(2)->completed()->create();
    }
}
