<?php echo '<?php'; ?>
 
class <?php echo ucfirst($table); ?>_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get <?php echo $table; ?> by <?php echo $pk; ?>
     */
    function get_<?php echo $table; ?>($<?php echo $pk; ?>)
    {
        return $this->db->get_where('<?php echo $table_name; ?>',array('<?php echo $pk; ?>'=>$<?php echo $pk; ?>))->row_array();
    }
        
    /*
     * Get all <?php echo $table; ?>
     */
    function get_all_<?php echo $table; ?>()
    {
        $this->db->order_by('<?php echo $pk; ?>', 'desc');
        return $this->db->get('<?php echo $table_name; ?>')->result_array();
    }
        
    /*
     * function to add new <?php echo $table; ?>
     */
    function add_<?php echo $table; ?>($params)
    {
        $this->db->insert('<?php echo $table_name; ?>',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update <?php echo $table; ?>
     */
    function update_<?php echo $table; ?>($<?php echo $pk; ?>,$params)
    {
        $this->db->where('<?php echo $pk; ?>',$<?php echo $pk; ?>);
        return $this->db->update('<?php echo $table_name; ?>',$params);
    }
    
    /*
     * function to delete <?php echo $table; ?>
     */
    function delete_<?php echo $table; ?>($<?php echo $pk; ?>)
    {
        return $this->db->delete('<?php echo $table_name; ?>',array('<?php echo $pk; ?>'=>$<?php echo $pk; ?>));
    }
}
