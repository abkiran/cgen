<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public $user;
    public function do_login()
    {
        $user = factory(User::class)->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);
        $this->actingAs($user);
    }
}
