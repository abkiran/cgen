<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class VolunteerOpportunityBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/volunteer_opportunity')
            ->see('Actions')
            ->see('Manage Volunteer Opportunities');
    }
    
    public function testStore()
    {

        $this->visit('admin/volunteer_opportunity/create')
            ->submitForm('Save', [
            'start_date' => '2018-03-10 10:43:21',
            'end_date' => '2018-03-10 10:43:21',
            'location' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/volunteer_opportunity')
            ->see('Actions')
            ->see('Manage Volunteer Opportunities');
    }
    public function testUpdate()
    {
        $this->visit('admin/volunteer_opportunity/1/edit')
            ->submitForm('Save', [
            'start_date' => '2018-03-10 10:43:21',
            'end_date' => '2018-03-10 10:43:21',
            'location' => 'Lorem Ipsum',
            'description' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/volunteer_opportunity')
            ->see('Actions');
    }
}
