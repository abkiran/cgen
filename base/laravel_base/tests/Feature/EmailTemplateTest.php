<?php
namespace Tests\Feature;

use App\Models\EmailTemplate;
use Tests\TestCase;

class EmailTemplateTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/email_template');
        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/email_template?field=template_type&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/email_template?order_by=template_type&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/email_template/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/email_template/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.email_template.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\EmailTemplate', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/email_template/5', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
