<?php echo '<?php'; ?>

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<?php $fn=array();
for ($m=0; $m < $TABLES[0]['nrows']; $m++) {
    $table=strtolower($TABLES[$m]['Tables_in_'.$db_name]);
    $module=str_replace('_', ' ', $TABLES[$m]['Tables_in_'.$db_name]);
    $class = str_replace(" ", '', ucwords($module));
    array_push($fn, $table);
?>
        $<?php echo $table; ?> = \App\Models\<?php echo $class; ?>::all()->count();
<?php }
$table_names=sprintf("'%s'", implode("', '", $fn));
?>
        return view('admin.dashboard', compact(<?php echo $table_names; ?>));
    }
}
