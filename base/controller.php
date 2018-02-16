<?php echo '<?php'; ?>
 
class <?php echo ucfirst($table); ?> extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('<?php echo ucfirst($table); ?>_model');
	} 

	/*
	 * Listing of <?php echo $table; ?>
	 */
	function index()
	{
		$data['<?php echo $table; ?>'] = $this-><?php echo ucfirst($table); ?>_model->get_all_<?php echo $table; ?>();
		
		$data['_view'] = '<?php echo $table; ?>/index';
		$this->load->view('layouts/main',$data);
	}

	/*
	 * Adding a new <?php echo $table; ?>
	 */
	function add()
	{   
		if(isset($_POST) && count($_POST) > 0)     
		{   
			$params = array(
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
				'<?php echo $fields[$z]['Field']; ?>' => $this->input->post('<?php echo $fields[$z]['Field']; ?>'),
<?php } ?>
			);
			
			$<?php echo $table; ?>_id = $this-><?php echo ucfirst($table); ?>_model->add_<?php echo $table; ?>($params);
			redirect('<?php echo $table; ?>/index');
		}
		else
		{
			$data['_view'] = '<?php echo $table; ?>/add';
			$this->load->view('layouts/main',$data);
		}
	}  

	/*
	 * Editing a <?php echo $table; ?>
	 */
	function edit($<?php echo $pk; ?>)
	{   
		// check if the <?php echo $table; ?> exists before trying to edit it
		$data['<?php echo $table; ?>'] = $this-><?php echo ucfirst($table); ?>_model->get_<?php echo $table; ?>($<?php echo $pk; ?>);
		
		if(isset($data['<?php echo $table; ?>']['<?php echo $pk; ?>']))
		{
			if(isset($_POST) && count($_POST) > 0)     
			{   
				$params = array(
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
				'<?php echo $fields[$z]['Field']; ?>' => $this->input->post('<?php echo $fields[$z]['Field']; ?>'),
<?php } ?>
				);

				$this-><?php echo ucfirst($table); ?>_model->update_<?php echo $table; ?>($<?php echo $pk; ?>,$params);            
				redirect('<?php echo $table; ?>/index');
			}
			else
			{
				$data['_view'] = '<?php echo $table; ?>/edit';
				$this->load->view('layouts/main',$data);
			}
		}
		else
			show_error('The <?php echo $table; ?> you are trying to edit does not exist.');
	} 

	/*
	 * Deleting <?php echo $table; ?>
	 */
	function remove($<?php echo $pk; ?>)
	{
		$<?php echo $table; ?> = $this-><?php echo ucfirst($table); ?>_model->get_<?php echo $table; ?>($<?php echo $pk; ?>);

		// check if the <?php echo $table; ?> exists before trying to delete it
		if(isset($<?php echo $table; ?>['<?php echo $pk; ?>']))
		{
			$this-><?php echo ucfirst($table); ?>_model->delete_<?php echo $table; ?>($<?php echo $pk; ?>);
			redirect('<?php echo $table; ?>/index');
		}
		else
			show_error('The <?php echo $table; ?> you are trying to delete does not exist.');
	}
	
}