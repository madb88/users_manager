<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_role_can_be_created()
    {
        $role = factory('App\Role')->create();
        $this->assertNotEmpty($role);
    }

    public function test_role_can_be_updated()
    {
        $role = factory('App\Role')->create();

        $data = [
           'name' => 'newRoleName'
        ];

        $role->update($data);

        $this->assertEquals($role->name, $data['name']);
    }

    public function test_role_can_be_deleted()
    {
        $role = factory('App\Role')->create();
        $delete = $role->delete();

        $this->assertTrue($delete);
    }
}
