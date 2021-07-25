<?php

namespace Database\Seeders;

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
        // $this->call(Travel::class);
        // $this->call(TodoTableSeeder::class);
        // $this->call(TodoSeeder::class);
         $this->call(huouseeder::class);
         $this->call(TravelSeeder::class);

    }
}
