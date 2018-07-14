<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class NeighborhoodBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/neighborhood')
            ->see('Actions')
            ->see('Manage Neighborhoods');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/neighborhood/create')
            ->submitForm('Save', [
            'neighborhood' => 'Test',
            'description' => 'Lorem Ipsum',
            'photo' => 'Lorem Ipsum',
            'map_image' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/neighborhood')
            ->see('Actions')
            ->see('Manage Neighborhoods')
            ->see('New Neighborhood has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/neighborhood/1/edit')
            ->submitForm('Save', [
            'neighborhood' => 'Test',
            'description' => 'Lorem Ipsum',
            'photo' => 'Lorem Ipsum',
            'map_image' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/neighborhood')
            ->see('Actions')
            ->see('Neighborhood details are updated.');
    }
}
