<?php

namespace Database\Factories\Pets;

use App\Models\Pets\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name(),
            'description' => $this->faker->text(),
            'thumb' => $this->faker->imageUrl(),
            'found_on' => $this->faker->dateTime('now')
        ];
    }
}