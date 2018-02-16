<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo ucfirst($table); ?> Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo '<?php'; ?> echo site_url('<?php echo $table; ?>/add'); ?>" class="btn btn-success btn-sm">Add / Modify</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { $f = ucwords(str_replace('_', ' ', $fields[$z]['Field'])); ?>
						<th><?php echo $f ?></th>
<?php } ?>
                    </tr>
                    <?php echo '<?php'; ?> foreach($<?php echo $table; ?> as $t){ ?>
                    <tr>
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
						<td><?php echo '<?php'; ?> echo $t['<?php echo $fields[$z]['Field']; ?>']; ?></td>
<?php } ?>
						<td>
                            <a href="<?php echo '<?php'; ?> echo site_url('<?php echo $table; ?>/edit/'.$t['<?php echo $pk; ?>']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo '<?php'; ?> echo site_url('<?php echo $table; ?>/remove/'.$t['<?php echo $pk; ?>']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php echo '<?php'; ?> } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
