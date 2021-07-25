<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Travel;
class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tra = Travel::factory()->count(30)->create();
        
    }
}
