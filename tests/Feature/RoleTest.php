<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{

    public function test_can_see_role()
    {
        $role = factory('App\Role')->create();
        $response = $this->get('/roles/'.$role->id);
        $response->assertSee($role->name);
    }

    public function test_can_see_users()
    {
        $role = factory('App\Role')->create();
        $response = $this->get('roles/');
        $response->assertStatus(200);
    }

    public function test_can_see_users_edit_page()
    {
        $role = factory('App\Role')->create();
        $response = $this->get('/roles/'.$role->id . '/edit');
        $response->assertStatus(200);
    }
}
