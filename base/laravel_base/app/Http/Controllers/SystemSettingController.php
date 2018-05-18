<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public $viewDir = "admin.system_setting";

    public function index(Request $request)
    {
        $order_by = $request->order_by;
        $order_by_type = $request->order_by_type;
        $search = $request->search;
        $field = $request->field;

        $system_setting = new SystemSetting();
        $rows = $system_setting->selectData($search, $field, $order_by, $order_by_type);

        $data['order_by'] = $request->order_by;
        $data['order_by_type'] = $request->order_by_type;
        $data['search'] = $request->search;
        $data['field'] = $request->field;

        $rows->total();
        $rows->appends(request()->input())->links();

        return $this->view("index", ['rows' => $rows, 'data' => $data]);
    }

    public function settingsEdit(Request $request)
    {
        $order_by = $request->order_by;
        $order_by_type = $request->order_by_type;
        $search = $request->search;
        $field = $request->field;

        $system_setting = new SystemSetting();
        $rows = $system_setting::all();

        return $this->view("settings", ['rows' => $rows]);
    }

    public function settingsUpdate(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'set_') !== false) {
                $this->validate($request, [
                    $key => 'required',
                ]);

                $id = explode('_', $key);
                $id = $id[1];
                $system_setting = SystemSetting::find($id);
                $system_setting->value = $value;
                $system_setting->save();
            }
        }

        return redirect('admin/system/setting')->with('message', 'System settings updated successfully.');
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
        $this->validate($request, [
            'key' => 'string|max:100',
            'label' => 'string|max:100',
            'value' => 'string|max:100',
            'widget' => 'string|max:100',
            'widget_description' => 'string|max:100',
        ]);

        SystemSetting::create($request->all());

        return redirect('/admin/system/system_setting')->with('message', 'New system setting has been created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, SystemSetting $system_setting)
    {
        return $this->view("edit", ['row' => $system_setting]);
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
        $this->validate($request, [
            'key' => 'string|max:100',
            'label' => 'string|max:100',
            'value' => 'string|max:100',
            'widget' => 'string|max:100',
            'widget_description' => 'string|max:100',
        ]);

        $system_setting = SystemSetting::find($id);
        $system_setting->key = $request->get('key');
        $system_setting->label = $request->get('label');
        $system_setting->value = $request->get('value');
        $system_setting->widget = $request->get('widget');
        $system_setting->widget_description = $request->get('widget_description');
        $system_setting->save();
        return redirect('admin/system/system_setting')->with('message', 'System setting details are updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $system_setting = SystemSetting::find($id);
        $system_setting->delete();
        return redirect('admin/system/system_setting')->with('message', 'System setting has been deleted.');
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir . "." . $view, $data);
    }
}
