<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'password' => Hash::make('password'),
            'location' => fake()->city(),            
            'email' => fake()->unique()->safeEmail(),
            'contact_email' => fake()->unique()->safeEmail(),
            'website' => fake()->url()
        ];
    }
}
