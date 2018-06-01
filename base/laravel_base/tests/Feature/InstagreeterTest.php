<?php
use App\Models\Instagreeter;
use Tests\TestCase;

class InstagreeterTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/instagreeter');

        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/instagreeter/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/instagreeter/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Instagreeter', $row);
    }
}
