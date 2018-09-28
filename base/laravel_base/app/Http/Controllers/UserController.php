<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    public $viewDir = "admin.user";

    public function index(Request $request)
    {
        $order_by = $request->order_by;
        $order_by_type = $request->order_by_type;
        $search = $request->search;
        $field = $request->field;

        $user = new User();
        $rows = $user->selectData($search, $field, $order_by, $order_by_type);

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
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $group_data = \App\Models\Group::select('name')->get();

        $groups = array();
        $groups[0] = '';
        foreach ($group_data as $group) {
            array_push($groups, $group->name);
        }
        unset($groups[0]);

        return $this->view("create", ['groups' => $groups]);
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
            'user' => 'required|unique:users|string|min:3|max:50',
            'email' => 'required|unique:users|email|max:100',
            'password' => 'required|string|max:50',
            'user_group' => 'required|int|max:11',
            'status' => 'required|string|max:100',
            'first_name' => 'max:100',
            'last_name' => 'max:100',
        ]);

        $user = new User();
        $user->user = $request->get('user');
        if ($request->get('password') != '') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->user_group = $request->get('user_group');
        $user->status = $request->get('status');
        $user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');

        $user->save();

        return redirect('/admin/system/user')->with('message', "New user[$request->user] has been created.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $group_data = \App\Models\Group::select('name')->get();

        $groups = array();
        $groups[0] = '';
        foreach ($group_data as $group) {
            array_push($groups, $group->name);
        }
        unset($groups[0]);

        return $this->view("edit", ['row' => $user, 'groups' => $groups]);
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
            'user' => 'required|string|min:3|max:50|unique:users,user,' . $id,
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'password' => 'max:50',
            'user_group' => 'int|max:11',
            'status' => 'required|string|max:100',
            'first_name' => 'nullable|max:100',
            'last_name' => 'nullable|max:100',
        ]);

        $user = User::find($id);
        $user->user = $request->get('user');
        if ($request->get('password') != '') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->user_group = $request->get('user_group');
        $user->status = $request->get('status');
        $user->email = $request->get('email');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');

        $user->save();
        return redirect('admin/system/user')->with('message', 'User details are updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/system/user')->with('message', 'User has been deleted.');
    }

    /**
     * To change the password.
     *
     * @return  \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|max:50|min:5',
            'password' => 'required|string|max:50|min:5|confirmed',
        ]);

        $id = Auth::user()->id;
        $hashedPassword = Auth::user()->password;
        $old_password = $request->get('old_password');
        $password = $request->password;

        if (!Hash::check($old_password, $hashedPassword)) {
            // The passwords not matched...
            return back()->with('alert-type', 'error')->with('message', 'The old password that you have entered is not matching our records!');
        }

        Auth::user()->password = bcrypt($password);
        Auth::user()->update();

        return back()->with('message', 'Password has been changed successfully!');
    }
}
