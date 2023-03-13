<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'notes' => fake()->text(),
            'country' => fake()->countryCode(),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'postcode' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
