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
    public function firstTest()
    {
        $response = $this->get('/');
        $response->assertSee('レビューを書く');
        $response->assertSee('公務員試験対策本レビューSNS 仔牛くん');
    }

}
