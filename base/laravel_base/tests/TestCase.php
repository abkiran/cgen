<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as IlluminateTestCase;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends IlluminateTestCase
{
    use CreatesApplication, CreatesUsers, HttpAssertions;

    protected function dispatch($job)
    {
        return $job->handle();
    }
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function doLogin()
    {
        // $user = factory(User::class)->create();
        // $this->post('/login', [
        //     'email' => $user->email,
        //     'password' => 'secret'
        // ]);
        $this->post('/login', [
            'email' => 'katielaw',
            'password' => '123456'
        ]);
        // $this->actingAs($user);
    }

    public function doLoginAsVolunteer()
    {
        $this->app->make('Illuminate\Contracts\Http\Kernel')->pushMiddleware('Illuminate\Session\Middleware\StartSession');
        $this->post('/login', [
            'email' => 'wallybraun@yahoo.com',
            'password' => '123456'
        ]);
    }

    public function tearDown()
    {
        DB::rollBack();
        parent::tearDown();
    }

    public function testDashboard()
    {
        $this->doLogout();
        $this->doLogin();
        $this->assertAuthenticated();
        $response = $this->get('/');
        $response->assertSuccessful();
        $response = $this->get('/admin');
        $response->assertSuccessful();
        $response->assertViewIs('admin.dashboard');
        $response->assertViewHas('visit');

        
        $this->doLogout();
        $this->doLoginAsVolunteer();
        $response = $this->get('/volunteer_admin');
        $response->assertSuccessful();
        $response->assertViewIs('volunteer_admin.dashboard');
        // $response->assertViewHas('visit');
    }

    /**
     * Make ajax GET request
     */
    protected function ajaxGet($uri)
    {
        return $this->get($uri, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
    }

    /**
     * Make ajax POST request
     */
    protected function ajaxPost($uri, array $data = [])
    {
        return $this->post($uri, $data, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
    }

    public function doLogout()
    {
        Auth::logout();
    }
}
