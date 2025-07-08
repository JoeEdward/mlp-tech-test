<?php

namespace Database\Seeders;

use Database\Seeders\Development\TaskSeeder;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TaskSeeder::class);
    }
}
