<?php
namespace Tests\Feature;

use App\Models\Neighborhood;
use Tests\TestCase;

class NeighborhoodTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/neighborhood');
        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/neighborhood?field=neighborhood&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/neighborhood?order_by=neighborhood&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/neighborhood/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/neighborhood/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Neighborhood', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/neighborhood/3', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
