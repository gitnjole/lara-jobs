<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::factory(9)->create();
        
        foreach ($users as $user) {
            Listing::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
