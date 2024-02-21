<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingControllerTest extends TestCase
{
    public function test_store_listing()
    {
        $formData = [
            'title' => 'Junior Laravel Developer',
            'company_name' => 'ACME corp.',
            'location' => 'Boston',
            'contact_email' => 'gargamel@girgispil.com',
            'tags' => 'php, js, laravel',
            'website' => 'https://www.google.com'
        ];

        $response = $this->post('/listings', $formData);

        $response->assertRedirect('/');

        $this->assertTrue(DB::table('listings')->where($formData)->exists());
    }

    public function test_field_errors()
    {
        $response = $this->post('/listings');

        $response->assertSessionHasErrors([
            'title',
            'company_name',
            'location',
            'contact_email',
            'tags',
            'website'
        ]);
    }

    public function test_valid_website()
    {
        $invalidFormData = [
            'title' => 'Junior Laravel Developer',
            'company_name' => 'ACME corp.',
            'location' => 'Boston',
            'contact_email' => 'gargamel@girgispil.com',
            'tags' => 'php, js, laravel',
            'website' => 'google'
        ];

        $response = $this->post('/listings', $invalidFormData);

        $response->assertSessionHasErrors('website');
    }

}