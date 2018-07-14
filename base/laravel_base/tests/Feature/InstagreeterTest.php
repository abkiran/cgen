<?php
namespace Tests\Feature;

use App\Models\Instagreeter;
use Tests\TestCase;

class InstagreeterTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/instagreeter');
        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/instagreeter?field=start_date&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/instagreeter?order_by=start_date&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/instagreeter/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/instagreeter/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.instagreeter.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Instagreeter', $row);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', 'admin/instagreeter/1', ['_token' => csrf_token()]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
