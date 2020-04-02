<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class TestAPI extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOngs()
    {
        $response = $this->get('/api/ongs');

        // $response->assertStatus(200);
        $response->assertJson(
            [
              "id"=> 0,
              "name"=> "APAD",
              "email"=> "contato@apad.com.br",
              "whatsapp"=> "64000000000",
              "city"=> "Rio do Sul",
              "uf"=> "SC"
            ],
            [
              "id"=> 66714519,
              "name"=> "Galileu",
              "email"=> "galileu@contatogalileu.com.br",
              "whatsapp"=> "6400000000",
              "city"=> "Catalão",
              "uf"=> "GO"
            ]);
    }
}
