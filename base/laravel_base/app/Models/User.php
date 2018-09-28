<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'user', 'status', 'user_group',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    public function selectData($search, $field, $order_by, $order_by_type)
    {
        $data = User::select('id', 'user', 'password', 'user_group', 'status', 'email', 'first_name', 'last_name', 'last_login');

        $data->with(['userGroup']);
        if ($search) {
            $data->where($field, 'like', '%' . $search . '%');
        }

        if ($order_by) {
            $data->orderby($order_by, $order_by_type);
        } else {
            $data->orderby('id', 'desc');
        }
        return $data->paginate(get_setting('rows_per_page'));
    }

    public function userGroup()
    {
        return $this->hasOne('App\Models\Group', 'id', 'user_group');
    }
}
