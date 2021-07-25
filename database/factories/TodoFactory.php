
<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'start_place'=> $faker->city,
        'from_date'=>$faker->date,
        'to_date'=>$faker->date,
        'price'=>$faker->numberBetween($min = 10000, $max = 600000),
        'status'=> $faker->sentence(3),
        'transport'=> $faker->sentence(7),
        'type'=> $faker->sentence(10),
        'image'=>$faker->$faker->imageUrl($width = 200, $height = 200),
    ];
});