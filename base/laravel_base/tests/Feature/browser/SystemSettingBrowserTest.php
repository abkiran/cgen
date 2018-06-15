<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class SystemSettingBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/setting')
            ->see('Modify System Settings');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/setting')
            ->submitForm('Save', [
            'set_5' => '10',
            ])
            ->seePageIs('admin/system/setting')
            ->see('Modify System Settings');
    }
}
