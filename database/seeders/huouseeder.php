<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class huouseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //https://github.com/fzaninotto/Faker
    public function run()
    {
        foreach(range(1,10) as $item)
        {
            DB::table('huous')->insert([
                'name' => " $item",
                'title' => " $item",
                'description' => " $item" 
            ]);
        }
    }
}
