<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public $viewDir = "admin.setting";

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

        return redirect('admin/setting')->with('message', 'System settings updated successfully.');
    }
}
