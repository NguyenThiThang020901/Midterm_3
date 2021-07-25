<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Travel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'=> $this->faker->name,
        'start_place'=> $this->faker->city,
        'from_date'=>$this->faker->date,
        'to_date'=>$this->faker->date,
        'price'=>$this->faker->numerify(),
        'status'=> $this->faker->sentence(3),
        'transport'=> $this->faker->sentence(7),
        'type'=>$this-> faker->sentence(10),
        'image'=>$this->faker->imageUrl($width = 200, $height = 200) ,
        ];
    }
}
