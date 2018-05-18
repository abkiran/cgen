<?php
use App\Models\FieldHelper;
use Tests\TestCase;

class FieldHelperTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/field_helper');

        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/field_helper/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/field_helper/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.field_helper.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\FieldHelper', $row);
    }
}
