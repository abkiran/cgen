<?php
use App\Models\VolunteerOpportunity;
use Tests\TestCase;

class VolunteerOpportunityTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer_opportunity');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer_opportunity/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer_opportunity/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer_opportunity.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\VolunteerOpportunity', $row);
    }
}
