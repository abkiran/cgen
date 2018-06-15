<?php
namespace Tests\Feature;

use App\Models\Interest;
use Tests\TestCase;

class InterestTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/interest');
        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/interest?field=interest&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/interest?order_by=interest&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/interest/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/interest/8/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.interest.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Interest', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/interest/4', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
