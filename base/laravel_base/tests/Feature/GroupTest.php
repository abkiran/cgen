<?php
use App\Models\Group;
use Tests\TestCase;

class GroupTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/group');

        $response->assertSuccessful();
        $response->assertViewIs('admin.group.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/group/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.group.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/group/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.group.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Group', $row);
    }
}
