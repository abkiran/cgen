<?php
use App\Models\Language;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/system/language');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/system/language/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/system/language/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Language', $row);
    }
}
