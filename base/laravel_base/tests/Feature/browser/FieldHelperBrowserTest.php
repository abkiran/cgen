<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class FieldHelperBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/field_helper')
            ->see('Actions')
            ->see('Manage Field Helpers');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/field_helper/create')
            ->submitForm('Save', [
                'model' => 'Volunteer',
                'copy' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/field_helper')
            ->see('Actions')
            ->see('Manage Field Helpers')
            ->see('New Field Helper has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/field_helper/1/edit')
            ->submitForm('Save', [
                'model' => 'Volunteer',
                'copy' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/field_helper')
            ->see('Actions')
            ->see('Field Helper details are updated.');
    }
}
