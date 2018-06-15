<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class InterestBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/interest')
            ->see('Actions')
            ->see('Manage Interests');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/interest/create')
            ->submitForm('Save', [
            'interest' => 'Test',
            ])
            ->seePageIs('admin/system/interest')
            ->see('Actions')
            ->see('Manage Interests')
            ->see('New Interest has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/interest/4/edit')
            ->submitForm('Save', [
            'interest' => 'Test',
            ])
            ->seePageIs('admin/system/interest')
            ->see('Actions')
            ->see('Interest details are updated.');
    }
}
