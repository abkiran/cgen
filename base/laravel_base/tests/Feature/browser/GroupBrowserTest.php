<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class GroupBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/group')
            ->see('Actions')
            ->see('Manage Groups');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/group/create')
            ->submitForm('Save', [
            'name' => 'Test',
            'weight' => '1',
            ])
            ->seePageIs('admin/system/group')
            ->see('Actions')
            ->see('Manage Groups')
            ->see('New Group has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/group/1/edit')
            ->submitForm('Save', [
            'name' => 'Test1',
            'weight' => '2',
            ])
            ->seePageIs('admin/system/group')
            ->see('Actions')
            ->see('Group details are updated.');
    }
}
