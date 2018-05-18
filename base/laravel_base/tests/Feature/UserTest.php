<?php

use Tests\TestCase;

class UserTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/user');

        $response->assertSuccessful();
        $response->assertViewIs('admin.user.index');
        $response->assertViewHas('rows');
        $rows = $response->original->getData()['rows'];
        $this->assertNotNull($rows);
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/user/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.user.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/user/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.user.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\User', $row);
    }
}
