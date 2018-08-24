<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class UserBrowserTest extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/system/user')
            ->see('Actions')
            ->see('Manage Users');
    }
    
    public function testStore()
    {

        $this->visit('admin/system/user/create')
            ->submitForm('Save', [
            'user' => 'testing',
            'password' => '123456',
            'confirm_password' => '123456',
            'user_group' => '1',
            'status' => 'Active',
            'email' => 'example12@example.com',
            'first_name' => 'Lorem Ipsum',
            'last_name' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/user')
            ->see('Actions')
            ->see('Manage Users');
    }
    public function testUpdate()
    {
        $this->visit('admin/system/user/22/edit')
            ->submitForm('Save', [
            'user' => 'test1',
            'password' => '123456',
            'confirm_password' => '123456',
            'user_group' => '2',
            'status' => 'Active',
            'email' => 'example1@example.com',
            'first_name' => 'Lorem Ipsum',
            'last_name' => 'Lorem Ipsum',
            ])
            ->seePageIs('admin/system/user')
            ->see('Actions')
            ->see('User details are updated.');
    }
}
