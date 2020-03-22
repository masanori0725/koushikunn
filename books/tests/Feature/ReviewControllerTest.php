<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\Request;
use App\Review;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class ReviewControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function indexTest()
    {
        $user = factory(User::class)->create();
        $review = factory(Review::class)->create();
        $response = $this
            ->actingAs($user)
            ->actingAs($review)
            ->get('/');

        $response->assertStatus(200)
            ->assertViewIs('/')
            ->assertSee('詳細を読む');
    }

    public function showTest()
    {
        $user = factory(User::class)->create();
        $review = factory(Review::class)->create();
        $response = $this
            ->actingAs($user)
            ->actingAs($review)
            ->get('/show/１');

        $response->assertStatus(200)
            ->assertViewIs('show')
            ->assertSee('編集する')
            ->assertSee('削除する')
            ->assertSee('一覧へ戻る');

    }

    public function createTest()
    {
        $user = factory(User::class)->create();
        $review = factory(Review::class)->create();
        $response = $this
            ->actingAs($user)
            ->actingAs($review)
            ->get('/review');

        $response->assertStatus(200)
            ->assertViewIs('review')
            ->assertSee('レビューを登録');
    }


    public function editTest()
    {
        $user = factory(User::class)->create();
        $review = factory(Review::class)->create();
        $response = $this
            ->actingAs($user)
            ->actingAs($review)
            ->post('/edit/1');

        $response->assertStatus(200)
            ->assertViewIs('review')
            ->assertSee('一覧へ戻る');
    }

}
