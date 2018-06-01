<?php
use App\Models\Volunteer;
use Tests\TestCase;

class VolunteerTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer/26/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.edit');
        $response->assertViewHas('row');
        $response->assertViewHas('interests');
        $response->assertViewHas('languages');
        $response->assertViewHas('neighborhoods');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Volunteer', $row);
    }

    public function testShow()
    {
        $this->do_login();
        $response = $this->get('admin/volunteer/26');

        $response->assertSuccessful();
        $response->assertViewIs('admin.volunteer.show');
        $response->assertViewHas('row');
        $response->assertViewHas('interests');
        $response->assertViewHas('languages');
        $response->assertViewHas('neighborhoods');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Volunteer', $row);
    }
}