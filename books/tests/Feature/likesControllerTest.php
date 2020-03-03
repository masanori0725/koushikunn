<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use App\Like;
use App\Review;
use Auth;
use Validator;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class likesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseTransactions;

    public function store(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
