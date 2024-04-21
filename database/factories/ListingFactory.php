<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /**
         * Need to be generated and seeded before ListingFactory is called!
         */
        $listableOptions = [User::all(), Company::all()];
        $listableType = $listableOptions[rand(0, 1)];
        $listable = $listableType->random();
        

        return [
            'title' => $this->faker->sentence(),
            'tags' => 'laravel, api, js',
            'description' => $this->faker->paragraph(6),
            'listable_type' => get_class($listable),
            'listable_id' => $listable->getKey(),
        ];
    }
}
