<?php echo '<?php'; ?>

use App\Models\<?php echo $class; ?>;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class <?php echo $class; ?>Test extends TestCase
{
    public function testIndex()
    {


        $response = $this->get('admin/settings/<?php echo $table; ?>');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.index');
        $response->assertViewHas('rows');
        $rows = $response->original->getData()['rows'];
        $this->assertNotNull($rows);
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $rows);
    }

    public function testCreate()
    {
        $response = $this->get('admin/settings/<?php echo $table; ?>/create');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.create');
    }

    public function testEdit()
    {
        $response = $this->get('admin/settings/<?php echo $table; ?>/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('admin.<?php echo $table; ?>.edit');
        $response->assertViewHas('row');
        $row = $response->original->getData()['row'];
        $this->assertNotNull($row);
        $this->assertInstanceOf('App\Models\<?php echo $class; ?>', $row);
    }
}
