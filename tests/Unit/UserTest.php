<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Zend\Diactoros\Request;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_can_be_created()
    {
        $user = factory('App\User')->create();
        $this->assertNotEmpty($user);
    }

    public function test_user_can_be_updated()
    {
        $user = factory('App\User')->create();

        $data = [
           'name' => 'newName'
        ];

        $user->update($data);

        $this->assertEquals($user->name, $data['name']);
    }

    public function test_user_role_relations()
    {
        $user = factory('App\User')->create();
        $role = factory('App\Role')->create();

        $user->role()->associate($role)->save();

        $this->assertNotNull($user->role);
        $this->assertEquals($user->role, $role);
    }

    public function test_user_can_be_deleted()
    {
        $user = factory('App\User')->create();
        $delete = $user->delete();

        $this->assertTrue($delete);
    }
}
