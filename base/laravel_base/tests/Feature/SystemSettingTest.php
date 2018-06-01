<?php
use App\Models\SystemSetting;
use Tests\TestCase;

class SystemSettingTest extends TestCase
{
    public function testSettingsEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/setting');

        $response->assertSuccessful();
        $response->assertViewIs('admin.system_setting.settings');
        $response->assertViewHas('rows');
        $rows = $response->original->getData()['rows'];
        // dd($rows);
        $this->assertNotNull($rows);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $rows);
    }

    // public function testSettingsUpdate()
    // {
    //     $this->do_login();
    //     $response = $this->post('admin/system/setting');
    //     $response->assertSuccessful();
    // }
}
