<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class EmailTemplateBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/email_template')
            ->see('Actions')
            ->see('Manage Email Templates');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/email_template/create')
            ->submitForm('Save', [
            'template_type' => 'visitor_application_confirmation',
            'subject' => 'Test',
            'template' => 'Lorem Ipsum',
            'template_description' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/email_template')
            ->see('Actions')
            ->see('Manage Email Templates')
            ->see('New Email Template has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/email_template/1/edit')
            ->submitForm('Save', [
            'template_type' => 'visitor_application_confirmation',
            'subject' => 'Test',
            'template' => 'Lorem Ipsum',
            'template_description' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/email_template')
            ->see('Actions')
            ->see('Email Template details are updated.');
    }
}
