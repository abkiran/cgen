<?php

namespace Tests;

use App\Models\User;
use Auth;

trait CreatesUsers
{
    protected function login(array $attributes = [])
    {
        // $user = $this->createUser($attributes);

        // $this->be($user);

        // return $user;
        $this->post('/login', [
            'email' => 'katielaw',
            'password' => '123456'
        ]);
    }

    protected function loginAs(User $user)
    {
        $this->be($user);
    }

    protected function createUser(array $attributes = []): User
    {
        return factory(User::class)->create(array_merge([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'user' => 'johndoe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ], $attributes));
    }

    public function logout()
    {
        Auth::logout();
    }
}
