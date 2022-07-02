<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        return [

          //'image' => $this->faker->image('public/storage/categories', 640, 480 , null, false) // Esto no funciona con faker/php

          //generar imagenes usando Faker-LoremFlickr Provider for Faker
          'image' => 'categories/' . $faker->image('public/storage/categories', 640, 480, null, false)

        ];
    }
}
