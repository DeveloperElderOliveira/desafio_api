<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    
    public function test_login_sem_credenciais_retorna_nao_autorizado()
    {
        $response = $this->postJson('/api/login');

        $response->assertStatus(401);
    }

    public function test_login_com_credenciais_invalidas_retorna_nao_autorizado()
    {
        $payload = [
            'name' => 'loginfake',
            'password' => 'passwordfake' 
        ];

        $response = $this->postJson('/api/login', $payload);

        $response->assertStatus(401)
                    ->assertExactJson([
                        'error' => "Unauthorized"
                    ]);

    }

    public function test_login_com_credenciais_validas_retorna_usuario_e_token()
    {
        $payload = [
            'name' => 'bycoders',
            'password' => 'desafiobycoders' 
        ];

        $response = $this->postJson('/api/login', $payload);

        $response->assertStatus(200)
                    ->assertJsonStructure(['access_token','user','token_type']);

    }
}
