<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovimentacaoTest extends TestCase
{
    public function test_upload_file_cnab_txt_sem_token_retorna_nao_autenticado()
    {

        $response = $this->postJson('/api/store-file', [
            'file' => new \Illuminate\Http\UploadedFile(resource_path('CNAB.txt'), 'CNAB.txt', null, null, true),
        ]);        

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_upload_file_qualquer_formato_com_token_return_error()
    {
        $payload = [
            'name' => 'bycoders',
            'password' => 'desafiobycoders' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);
        
        $response = $this->postJson('/api/store-file', [
            'Authorization' => "Bearer {$response_auth["access_token"]}",
            'file' => \Illuminate\Http\UploadedFile::fake()->image('avatar.jpg'),
        ]);
       
        
        $response->assertStatus(422)
        ->assertExactJson([
            "message" => "Arquivo precisa ser do tipo txt.",
            "errors" => [
                "file" => [
                    "Arquivo precisa ser do tipo txt."
                ]
            ]
        ]);
    }


    public function test_upload_file_cnab_txt_com_token_return_success()
    {
        $payload = [
            'name' => 'bycoders',
            'password' => 'desafiobycoders' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);
        
        $response = $this->postJson('/api/store-file', [
            'Authorization' => "Bearer {$response_auth["access_token"]}",
            'file' => new \Illuminate\Http\UploadedFile(resource_path('CNAB.txt'), 'CNAB.txt', null, null, true),
        ]);
        
        $response->assertStatus(200)
        ->assertExactJson(["success" => true]);
    }

    public function test_get_movimentacoes_sem_token_retorna_nao_autenticado()
    {

        $response = $this->getJson('/api/get-movimentacoes');     

        $response->assertStatus(401)
        ->assertExactJson([
            'message' => "Unauthenticated."
        ]);
    }

    public function test_get_movimentacoes_com_token_retorna_todas_movimentacoes()
    {
        $payload = [
            'name' => 'bycoders',
            'password' => 'desafiobycoders' 
        ];
        $response_auth = $this->postJson('/api/login', $payload);

        $response = $this->getJson('/api/get-movimentacoes',[
            'Authorization' => "Bearer {$response_auth["access_token"]}",
        ]);     

        $response->assertStatus(200)
                    ->assertJsonStructure(['movimentacoes']);
    }
    
}
