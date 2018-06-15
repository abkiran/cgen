<?php

namespace Tests;

use App\Models\User;

trait CreatesUsers
{
    protected function login(array $attributes = []): User
    {
        $user = $this->createUser($attributes);

        $this->be($user);

        return $user;
    }

    protected function loginAs(User $user)
    {
        $this->be($user);
    }

    protected function loginAsModerator(array $attributes = []): User
    {
        return $this->login(array_merge($attributes, ['type' => User::MODERATOR]));
    }

    protected function loginAsAdmin(array $attributes = []): User
    {
        return $this->login(array_merge($attributes, ['type' => User::ADMIN]));
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
}
