<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_see_users_on_list()
    {
        $user = factory('App\User')->create();
        $response = $this->get('/users/'.$user->id);
        $response->assertSee($user->name);
    }

    public function test_can_see_users()
    {
        $user = factory('App\User')->create();
        $response = $this->get('users/');
        $response->assertStatus(200);
    }

    public function test_can_see_users_edit_page()
    {
        $user = factory('App\User')->create();
        $response = $this->get('/users/'.$user->id . '/edit');
        $response->assertStatus(200);
    }
}
