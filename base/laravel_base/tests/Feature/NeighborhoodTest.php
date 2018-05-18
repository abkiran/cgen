<?php
use App\Models\Neighborhood;
use Tests\TestCase;

class NeighborhoodTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/neighborhood');

        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/neighborhood/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/neighborhood/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.neighborhood.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Neighborhood', $row);
    }
}
