<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KoushiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        dd($response);
        $response->assertStatus(200);
    }

    // public function testIndex()
    // {
    //     $this->visit('/')
    //     ->see('仔牛くん');
    // }
}
