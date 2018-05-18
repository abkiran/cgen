<?php echo '<?php'; ?>

use App\Models\<?php echo $class; ?>;
use Tests\TestCase;

class <?php echo $class; ?>Test extends TestCase
{
    public function testIndex()
    {
        $this->do_login();
        $response = $this->get('admin/<?php echo $table; ?>');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.index');
        $response->assertViewHas('rows');
        $response->assertViewHas('data');
        $rows = $response->original->getData()['rows'];
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $this->do_login();
        $response = $this->get('admin/<?php echo $table; ?>/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.create');
    }

    public function testEdit()
    {
        $this->do_login();
        $response = $this->get('admin/<?php echo $table; ?>/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\<?php echo $class; ?>', $row);
    }
}
