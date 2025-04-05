<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Cria um usuário e autentica
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function name_must_be_at_least_6_characters()
    {
        $response = $this->post('/contacts', [
            'name' => 'João',
            'contact' => '123456789',
            'email' => 'joao@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function contact_must_be_exactly_9_digits()
    {
        $response = $this->post('/contacts', [
            'name' => 'João Pedro',
            'contact' => '12345',
            'email' => 'joaopedro@example.com',
        ]);

        $response->assertSessionHasErrors('contact');
    }

    /** @test */
    public function email_must_be_valid_and_unique()
    {
        $this->post('/contacts', [
            'name' => 'Carlos Silva',
            'contact' => '123456789',
            'email' => 'carlos@example.com',
        ]);

        $response = $this->post('/contacts', [
            'name' => 'Carlos Silva',
            'contact' => '987654321',
            'email' => 'carlos@example.com', // mesmo email
        ]);

        $response->assertSessionHasErrors('email');
    }
}
