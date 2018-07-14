<?php echo '<?php'; ?>

namespace Tests\Feature;

use App\Models\<?php echo $class; ?>;
use Tests\TestCase;

class <?php echo $class; ?>Test extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->doLogin();
    }

    public function testIndex()
    {
        $response = $this->get('admin/<?php echo $table; ?>');
        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
        $response = $this->get('admin/<?php echo $table; ?>?field=<?php echo $row[0]['field']; ?>&search=kiran');
        $response->assertSuccessful();
        $response = $this->get('admin/<?php echo $table; ?>?order_by=<?php echo $row[0]['field']; ?>&order_by_type=ASC');
        $response->assertSuccessful();
    }

    public function testCreate()
    {
        $response = $this->get('admin/<?php echo $table; ?>/create');
        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/<?php echo $table; ?>/1/edit');
        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\<?php echo $class; ?>', $row);
    }

    public function testDestroy()
    {
        $response = $this->call('DELETE', 'admin/<?php echo $table; ?>/1', ['_token' => csrf_token()]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
