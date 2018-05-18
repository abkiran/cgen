<?php
use App\Models\EmailTemplate;
use Tests\TestCase;

class EmailTemplateTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_template');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_template/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_template/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\EmailTemplate', $row);
    }
}
