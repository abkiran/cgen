<?php echo '<?php'; ?>

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\<?php echo $class; ?>;
use Illuminate\Http\Request;

class <?php echo $class; ?>Controller extends Controller
{
    public $viewDir = "admin.<?php echo $table; ?>";

    public function index(Request $request)
    {
        $order_by = $request->order_by;
        $order_by_type = $request->order_by_type;
        $search = $request->search;
        $field = $request->field;

        $<?php echo $table; ?> = new <?php echo $class; ?>();
        $rows = $<?php echo $table; ?>->selectData($search, $field, $order_by, $order_by_type);

        $data['order_by'] = $request->order_by;
        $data['order_by_type'] = $request->order_by_type;
        $data['search'] = $request->search;
        $data['field'] = $request->field;

        $rows->total();
        $rows->appends(request()->input())->links();

        return $this->view("index", ['rows' => $rows, 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { ?>
            '<?php echo $row[$z]['field']; ?>' => '<?php echo $row[$z]['required']=='required'?'required':'nullable'; ?>|<?php echo $row[$z]['type']; ?><?php echo $row[$z]['size']?'|max:'.$row[$z]['size']:''; ?>',
<?php } ?>
        ]);

        <?php echo $class; ?>::create($request->all());

        return redirect('/admin/<?php echo $table; ?>')->with('message', 'New <?php echo $module; ?> has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $<?php echo $table; ?> = <?php echo $class; ?>::find($id);
        if (!$<?php echo $table; ?>) {
            return redirect('admin/<?php echo $table; ?>')->with('alert-type', 'error')->with('message', '<?php echo $module; ?> id does not exist.!');
        }
        return $this->view("edit", ['row' => $<?php echo $table; ?>]);
    }

    public function show(<?php echo $class; ?> $<?php echo $table; ?>)
    {
        dd($<?php echo $table; ?>);
        return $this->view("edit", ['row' => $<?php echo $table; ?>]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { ?>
            '<?php echo $row[$z]['field']; ?>' => '<?php echo $row[$z]['required']=='required'?'required':'nullable'; ?>|<?php echo $row[$z]['type']; ?><?php echo $row[$z]['size']?'|max:'.$row[$z]['size']:''; ?>',
<?php } ?>
        ]);

        $<?php echo $table; ?> = <?php echo $class; ?>::find($id);
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { 
        if($fields[$z]['Field']=='id') continue;
        ?>
        $<?php echo $table; ?>-><?php echo $fields[$z]['Field']; ?> = $request->get('<?php echo $fields[$z]['Field']; ?>');
<?php } ?>
        $<?php echo $table; ?>->save();
        return redirect('admin/<?php echo $table; ?>')->with('message', '<?php echo ucfirst($module); ?> details are updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = array();
        if ($id == '') {
            $response['status'] = 'ERROR';
            $response['msg'] = 'There was an error deleting <?php echo ucfirst($module); ?>!';
            return json_encode($response);
        }

        $<?php echo $table; ?> = <?php echo $class; ?>::find($id);
        $<?php echo $table; ?>->delete();
        $response['status'] = 'OK';
        $response['msg'] = '<?php echo ucfirst($module); ?> has been deleted successfully!';
        return json_encode($response);
    }
}
