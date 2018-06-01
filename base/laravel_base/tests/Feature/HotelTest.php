<?php
use App\Models\Hotel;
use Tests\TestCase;

class HotelTest extends TestCase
{
    public $id;
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/hotel');

        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->id = $rows[0]->id;
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/hotel/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/hotel/3/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.hotel.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Hotel', $row);
    }
}
