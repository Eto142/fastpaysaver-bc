<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first_name'   => fake()->firstName(),
            'last_name'    => fake()->lastName(),
            'email'        => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address'      => fake()->address(),
            'country'      => fake()->country(),
            'account_type' => 'savings',
            'currency'     => 'USD',
            'a_number'     => mt_rand(1000000000, 9999999999),
            'account_pin'  => '1234',
            'is_activated' => 1,
            'password'     => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_activated' => 0,
        ]);
    }
}
