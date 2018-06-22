<?php
namespace Tests\Feature;

use App\Models\SystemSetting;
use Tests\TestCase;

class SystemSettingTest extends TestCase
{
    public function testSettingsEdit()
    {
        $this->doLogin();
        $response = $this->get('admin/system/setting');

        $response->assertSuccessful();
        $response->assertViewIs('admin.system_setting.settings');
        $response->assertViewHas('rows');
        $rows = $response->original->getData()['rows'];
        $this->assertNotNull($rows);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $rows);
    }
}
