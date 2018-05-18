<?php
use App\Models\SystemSetting;
use Tests\TestCase;

class SystemSettingTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/system_setting');

        $response->assertSuccessful();
        $response->assertViewIs('admin.system_setting.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/system_setting/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.system_setting.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/system_setting/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.system_setting.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\SystemSetting', $row);
    }
}
