<?php
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/user');
        $response->assertSuccessful();
        $response->assertViewIs('admin.user.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/user?field=user&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/user?order_by=user&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/user/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.user.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/user/22/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.user.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\User', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/user/26', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
