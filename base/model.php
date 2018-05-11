<?php echo '<?php'; ?>

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class <?php echo $class; ?> extends Model
{
    /**
     * table name
     *
     * @var string
     */
    public $table = '<?php echo $table_name; ?>';

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
    protected $fillable = [ <?php echo $field_names_s; ?> ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'id' ];

    public function select_data($search, $field, $order_by, $order_by_type)
    {
        $data = <?php echo $class; ?>::select('id', <?php echo $field_names_s; ?>);

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
