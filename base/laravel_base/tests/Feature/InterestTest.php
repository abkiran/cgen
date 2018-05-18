<?php
use App\Models\Interest;
use Tests\TestCase;

class InterestTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/interest');

        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/interest/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/interest/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Interest', $row);
    }
}
