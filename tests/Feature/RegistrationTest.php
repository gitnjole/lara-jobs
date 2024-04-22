<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_registration(): void
    {
        $userEnteredData = $this->buildUserRegistrationData();

        $response = $this->post('/register', $userEnteredData);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => $userEnteredData['name'],
            'location' => $userEnteredData['location']
        ]);
    }
    
    public function buildUserRegistrationData(): array
    {
        /**
         * Both:
         * email
         * password
         * password_confirmed
         * location
         * website
         * 
         * User:
         * name
         * pfp
         * 
         * Company:
         * company_name
         * contact_email
         * logo
         */
        return [
            'type' => 'user',
            'name' => 'Bobo Balski',
            'email' => 'bobobalski@example.com',
            'password' => 'secretpassword',
            'password_confirmation' => 'secretpassword',
            'location' => 'Blighttown',
            'pfp' => UploadedFile::fake()->image('avatar.jpg'),
            'website' => 'https://globoblinkis.com'
        ];
    }
}
