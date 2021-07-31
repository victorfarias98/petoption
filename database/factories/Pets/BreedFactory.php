<?php

namespace Database\Factories\Pets;

use App\Models\Pets\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Breed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text()
        ];
    }
}