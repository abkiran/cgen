<?php
namespace Tests\Feature;

use App\Models\FieldHelper;
use Tests\TestCase;

class FieldHelperTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/field_helper');
        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/field_helper?field=model&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/field_helper?order_by=model&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/field_helper/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/field_helper/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\FieldHelper', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/field_helper/5', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
