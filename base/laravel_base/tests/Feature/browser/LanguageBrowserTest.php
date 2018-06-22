<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class LanguageBrowserTestq extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/language')
            ->see('Actions')
            ->see('Manage Languages');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/language/create')
            ->submitForm('Save', [
                'language' => 'Test'
            ])
            ->seePageIs('admin/system/language')
            ->see('Actions')
            ->see('Manage Languages')
            ->see('New language has been created!');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/language/1/edit')
            ->submitForm('Save', [
                'language' => 'English'
            ])
            ->seePageIs('admin/system/language')
            ->see('Actions')
            ->see('Language details are updated!');
    }
}
