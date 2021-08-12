<?php

namespace Database\Factories\Common;

use App\Models\User;
use App\Models\Pets\Pet;
use App\Models\Common\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('name', 'Victor Farias')->first();
        return [
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'district' => 'Rosa Elze',
            'zip_code' => $this->faker->postcode(),
            'city' => 'São cristóvão',
            'state' => 'Sergipe',
            'country' => 'Brasil',
            'addressable_id'=> $user->id,
            'addressable_type' => 'user'
        ];
    }
}