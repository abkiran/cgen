<?php
namespace Tests\Feature;

use App\Models\Hotel;
use Tests\TestCase;

class HotelTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/hotel');
        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/hotel?field=name&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/hotel?order_by=name&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/hotel/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/hotel/3/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Hotel', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/hotel/7', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
