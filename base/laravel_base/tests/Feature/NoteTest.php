<?php
use App\Models\Note;
use Tests\TestCase;

class NoteTest extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/note');

        $response->assertSuccessful();
        $response->assertViewIs('admin.note.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/note/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.note.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/note/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.note.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\Note', $row);
    }
}
