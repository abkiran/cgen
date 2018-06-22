<?php
namespace Tests\Feature;

use App\Models\VolunteerOpportunity;
use Tests\TestCase;

class VolunteerOpportunityTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/volunteer_opportunity');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/volunteer_opportunity?field=start_date&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/volunteer_opportunity?order_by=start_date&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/volunteer_opportunity/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/volunteer_opportunity/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\VolunteerOpportunity', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/volunteer_opportunity/2', ['_token' => csrf_token()]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
