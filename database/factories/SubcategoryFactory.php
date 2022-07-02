<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
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
            //
            //generar imagenes usando Faker-LoremFlickr Provider for Faker
          'image' => 'subcategories/' . $faker->image('public/storage/subcategories', 640, 480, null, false)
        ];
    }
}
