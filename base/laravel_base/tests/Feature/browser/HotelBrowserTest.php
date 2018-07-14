<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class HotelBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/hotel')
            ->see('Actions')
            ->see('Manage Hotels');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/hotel/create')
            ->submitForm('Save', [
            'name' => 'Test',
            'address' => 'Lorem Ipsum',
            'city' => 'Lorem Ipsum',
            'state' => 'Lorem Ipsum',
            'zip' => '12345',
            'phone' => '9999999999',
            ])
            ->seePageIs('admin/system/hotel')
            ->see('Actions')
            ->see('Manage Hotels')
            ->see('New Hotel has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/hotel/3/edit')
            ->submitForm('Save', [
            'name' => 'Test',
            'address' => 'Lorem Ipsum',
            'city' => 'Lorem Ipsum',
            'state' => 'Lorem Ipsum',
            'zip' => '12345',
            'phone' => '9999999999',
            ])
            ->seePageIs('admin/system/hotel')
            ->see('Actions')
            ->see('Hotel details are updated.');
    }
}
