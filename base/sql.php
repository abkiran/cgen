/**********<?php echo $table_name ?>***************/
function <?php echo $table_name; ?>_insert(<?php echo $field_vars; ?>) {
	
	$sql="INSERT 
 				INTO 
		 <?php echo $table_name?>

		 		(<?php echo $field_names; ?>)
		 VALUES
		 		(<?php echo $field_vars1; ?>)
		 ON DUPLICATE KEY UPDATE
		 		<?php echo $field_rep; ?>";
	$res = query($sql);
	return $res;
}


<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
<?php echo "$".$fields[$z]['Field'].' = get_arg($data, '.$z.");" ?>

<?php }?>
<?php echo $table_name; ?>_insert(<?php echo $field_vars; ?>);