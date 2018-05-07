<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo ucfirst($table); ?> Add</h3>
            </div>
			<?php echo '<?php'; ?> echo form_open('<?php echo $table; ?>/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { 
	if ( $fields[$z]['Extra'] == 'auto_increment' ) continue;
	$f = ucwords(str_replace('_', ' ', $fields[$z]['Field']));
						if ($fields[$z]['Type'] == 'tinyint(1)') { ?>
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="<?php echo $fields[$z]['Field']; ?>" value="1" id='<?php echo $fields[$z]['Field']; ?>' />
							<label for="<?php echo $fields[$z]['Field']; ?>" class="control-label"><?php echo $f; ?></label>
						</div>
					</div>
<?php						} else { ?>
					<div class="col-md-6">
						<label for="<?php echo $fields[$z]['Field']; ?>" class="control-label"><?php echo $f; ?></label>
						<div class="form-group">
							<input type="text" name="<?php echo $fields[$z]['Field']; ?>" class="form-control" id="<?php echo $fields[$z]['Field']; ?>" />
						</div>
					</div>
<?php 		} ?>
<?php } ?>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo '<?php'; ?> echo form_close(); ?>
		</div>
    </div>
</div>