<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        dd(env('APP_ENV'), env('DB_HOST'), env('DB_DATABASE'));
        $response = $this->get('/');
        dd($response);
        $response->assertStatus(200);
    }

    

}
