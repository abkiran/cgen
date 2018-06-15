<?php echo '<?php'; ?>

namespace Tests\Feature\Browser;

use App\Models\<?php echo $class; ?>;
use Tests\BrowserKitTestCase;
use Illuminate\Support\Facades\DB;

class <?php echo $class; ?>Test extends BrowserKitTestCase
{
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
        $this->login();
    }

    public function testIndex()
    {
        $this->visit('admin/<?php echo $table; ?>')
            ->see('Actions')
            ->see('Manage <?php echo ucwords($module); ?>s');
    }
    
    public function testStore()
    {

        $this->visit('admin/<?php echo $table; ?>/create')
            ->submitForm('Save', [
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { ?>
            '<?php echo $row[$z]['field']; ?>' => '<?php echo $row[$z]['fill']??'Test'; ?>',
<?php } ?>
            ])
            ->seePageIs('admin/<?php echo $table; ?>')
            ->see('Actions')
            ->see('Manage <?php echo ucwords($module); ?>s')
            ->see('New <?php echo ucwords($module); ?> has been created.');
    }
    public function testUpdate()
    {
        $this->visit('admin/<?php echo $table; ?>/1/edit')
            ->submitForm('Save', [
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { ?>
            '<?php echo $row[$z]['field']; ?>' => '<?php echo $row[$z]['fill']??'Test'; ?>',
<?php } ?>
            ])
            ->seePageIs('admin/<?php echo $table; ?>')
            ->see('Actions')
            ->see('<?php echo ucwords($module); ?> details are updated.');
    }
}
