<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function commentsTest()
    {
        $response = $this->get('/show/1/comments');

        $response->assertStatus(200);
        $response->assertSee('test');
    }
}
