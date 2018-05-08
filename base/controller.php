<?php echo '<?php'; ?>

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\<?php echo ucfirst($table); ?>;
use Illuminate\Http\Request;

class <?php echo $class; ?>Controller extends Controller
{
    public $viewDir = "admin.<?php echo $table; ?>";

    public function index()
    {
        $records = <?php echo ucfirst($table); ?>::paginate(\Config::get('constants.rows_per_page'));
        $records->total();
        return $this->view("index", ['rows' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { 
        if($fields[$z]['Field']=='id') continue;
        $required = "";
        $type_vals = explode('(', $fields[$z]['Type']);
        if(isset($type_vals[1])) $type_vals[1] = rtrim($type_vals[1],')');
        else $type_vals[1] = 100;
        if($type_vals[0] != 'int') $type_vals[0] = 'string';

        
        if($fields[$z]['Null']!='YES') $required = "required|";
        ?>
            '<?php echo $fields[$z]['Field']; ?>' => '<?php echo $required; ?><?php echo $type_vals[0]; ?>|max:<?php echo $type_vals[1] ?>',
<?php } ?>
        ]);
        // dd($request->all());
        <?php echo ucfirst($table); ?>::create($request->all());

        return redirect('/admin/settings/<?php echo $module; ?>')->with('message','New <?php echo $module; ?> has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, <?php echo ucfirst($table); ?> $<?php echo $module; ?>)
    {
        return $this->view("edit", ['row' => $<?php echo $module; ?>]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $<?php echo $module; ?> = <?php echo ucfirst($table); ?>::find($id);
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { 
        if($fields[$z]['Field']=='id') continue;
        ?>
        $<?php echo $module; ?>-><?php echo $fields[$z]['Field']; ?> = $request->get('<?php echo $fields[$z]['Field']; ?>');
<?php } ?>
        $<?php echo $module; ?>->save();
        return redirect('admin/settings/<?php echo $module; ?>')->with('message','<?php echo ucfirst($module); ?> details are updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $<?php echo $module; ?> = <?php echo ucfirst($table); ?>::find($id);
        $<?php echo $module; ?>->delete();
        return redirect('admin/settings/<?php echo $module; ?>')->with('message','<?php echo ucfirst($module); ?> has been deleted.');
    }

    
    protected function view($view, $data = [])
    {
        return view($this->viewDir . "." . $view, $data);
    }


}
