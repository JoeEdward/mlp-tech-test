<?php

namespace Database\Seeders;

use Database\Seeders\Development\TaskSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        if (app()->environment() !== 'production') {
            $this->call(DevelopmentSeeder::class);
        }
    }
}
