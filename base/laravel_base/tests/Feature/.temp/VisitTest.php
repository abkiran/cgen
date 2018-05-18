<?php
use App\Models\Visit;
use Tests\TestCase;

class VisitTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/visit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.visit.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/visit/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.visit.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/visit/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.visit.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Visit', $row);
    }
}
