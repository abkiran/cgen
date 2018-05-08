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
    protected $fillable = [
        <?php echo $field_names_s; ?> ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
