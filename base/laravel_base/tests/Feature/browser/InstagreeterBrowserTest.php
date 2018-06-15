<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class InstagreeterBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/instagreeter')
            ->see('Actions')
            ->see('Manage Instagreeters');
    }
    
    public function testStore()
    {

        $this->visit('admin/instagreeter/create')
            ->submitForm('Save', [
            'start_date' => '2018-03-10 10:43:21',
            'end_date' => '2018-03-10 10:43:21',
            'location' => 'Loop',
            'description' => 'Lorem Ipsum',
            'notes' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/instagreeter')
            ->see('Actions')
            ->see('Manage Instagreeters')
            ->see('New Instagreeter has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/instagreeter/1/edit')
            ->submitForm('Save', [
            'start_date' => '2018-03-10 10:43:21',
            'end_date' => '2018-03-10 10:43:21',
            'location' => 'Loop',
            'description' => 'Lorem Ipsum',
            'notes' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/instagreeter')
            ->see('Actions')
            ->see('Instagreeter details are updated.');
    }
}
