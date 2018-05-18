<?php
use App\Models\EmailCron;
use Tests\TestCase;

class EmailCronTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_cron');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_cron.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_cron/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_cron.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/email_cron/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.email_cron.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\EmailCron', $row);
    }
}
