<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cannot_access_contact_routes()
    {
        $routes = [
            '/contacts',
            '/contacts/create',
            '/contacts/1',
            '/contacts/1/edit',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertRedirect('/login'); // Redireciona pro login se não estiver logado
        }

        // Testa post, put, delete também
        $this->post('/contacts', [])->assertRedirect('/login');
        $this->put('/contacts/1', [])->assertRedirect('/login');
        $this->delete('/contacts/1')->assertRedirect('/login');
    }

    /** @test */
    public function guest_can_view_contact_list()
    {
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }
}
