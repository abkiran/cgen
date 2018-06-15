<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as IlluminateTestCase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

abstract class TestCase extends IlluminateTestCase
{
    use CreatesApplication, CreatesUsers, HttpAssertions;

    protected function dispatch($job)
    {
        return $job->handle();
    }
    public function doLogin()
    {
        DB::beginTransaction();
        $user = factory(User::class)->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);
        $this->actingAs($user);
    }
}
