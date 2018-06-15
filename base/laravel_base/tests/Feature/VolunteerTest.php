<?php
namespace Tests\Feature;

use App\Models\Volunteer;
use Tests\TestCase;

class VolunteerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/volunteer');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/volunteer?field=salutation&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/volunteer?order_by=salutation&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/volunteer/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/volunteer/933/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Volunteer', $row);
    }

    public function testShow()
    {
        $response = $this->get('admin/volunteer/933');
        $response->assertViewIs('admin.volunteer.show');
        $response->assertViewHas('row');
        $response->assertViewHas('interests');
        $response->assertViewHas('languages');
        $response->assertViewHas('neighborhoods');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Volunteer', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/volunteer/939', ['_token' => csrf_token()]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    // public function testChangeStatus()
    // {
    //     $response = $this->post('admin/volunteer/change_status', ['_token' => csrf_token(), 'id' => '933', 'status' => 'Approved']);
    //     $this->assertEquals(200, $response->getStatusCode());
    // }
}
