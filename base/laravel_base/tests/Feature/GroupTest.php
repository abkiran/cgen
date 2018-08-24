<?php
namespace Tests\Feature;

use App\Models\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/group');
        $response->assertSuccessful();
        $response->assertViewIs('admin.group.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/group?field=name&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/group?order_by=name&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/group/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.group.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/group/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.group.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Group', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/group/2', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
