<?php
namespace App\Models;

class Setting extends Model
{
    /**
     * table name
     *
     * @var string
     */
    public $table = 'setting';

    /**
     * timestamps disabled
     *
     * @var string
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'label', 'value', 'widget', 'widget_description'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id'];

    public function selectData($search, $field, $order_by, $order_by_type)
    {
        $data = SystemSetting::select('id', 'key', 'label', 'value', 'widget', 'widget_description');

        if ($search) {
            $data->where($field, 'like', '%' . $search . '%');
        }

        if ($order_by) {
            $data->orderby($order_by, $order_by_type);
        } else {
            $data->orderby('id', 'asc');
        }
        return $data->paginate(\Config::get('constants.rows_per_page'));
    }
}
