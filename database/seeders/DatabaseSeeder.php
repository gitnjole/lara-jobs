<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::factory(30)->create();

/*         Listing::create([
            'title' => 'Laravel Senior Developer',
            'tags' => 'laravel, javascript, php, js',
            'company_name' => 'ACME Corp',
            'location' => 'Boston, MA',
            'contact_email' => 'email@email.com',
            'website' => 'https://www.acme.com',
            'description' => 'Est occaecat proident officia ut officia ex aliqua nostrud enim veniam anim exercitation irure mollit.'
        ]);

        Listing::create([
            'title' => 'Senior Full Stack developer',
            'tags' => 'laravel, javascript, php, js',
            'company_name' => 'OSRH',
            'location' => 'Zagreb, CRO',
            'contact_email' => 'email@email.com',
            'website' => 'https://www.osrh.com',
            'description' => 'Ad ut veniam id laboris incididunt Lorem velit adipisicing exercitation.'
        ]); */
    }
}
