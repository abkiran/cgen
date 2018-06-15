<?php
namespace Tests\Feature;

use App\Models\Language;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/system/language');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/system/language?field=language&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/system/language?order_by=language&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/system/language/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/system/language/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.language.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Language', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/system/language/21', ['_token' => csrf_token()]);
        $this->assertEquals(302, $response->getStatusCode());
    }
}
