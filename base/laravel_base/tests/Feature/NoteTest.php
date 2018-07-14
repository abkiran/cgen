<?php
namespace Tests\Feature;

use App\Models\Note;
use Tests\TestCase;

class NoteTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/note');
        $response->assertSuccessful();
        $response->assertViewIs('admin.note.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/note?field=model_name&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/note?order_by=model_name&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testHistory()
    {
        $response = $this->get('admin/note/volunteer/3');
        $response->assertSuccessful();
        $response->assertViewIs('admin.note.history');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/note/volunteer/3?field=message&search=test');
        $response->assertSuccessful();
        $response = $this->get('admin/note/volunteer/3?order_by=message&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testShortHistory()
    {
        $response = $this->get('admin/note/short_history/volunteer/3');
        $response->assertSuccessful();
        $response = $this->get('admin/note/short_history/volunteer/3?limit=2');
        $response->assertSuccessful();
    }
}
