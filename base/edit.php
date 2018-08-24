@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Modify <?php echo ucwords($module); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/<?php echo $table; ?>')}}"><?php echo ucwords($module); ?>s</a></li>
        <li class="active">Modify</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- <div class="box-header with-border">
                    <h3 class="box-title">Heading</h3>
                </div> -->
                <!-- form start -->
                <form class="form-horizontal" action="{{action('<?php echo $class; ?>Controller@update', $row->id)}}" method="POST">
                    <div class="box-body">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <input name="id" id="id" type="hidden" value="{{$row->id}}">
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { 
    $f = ucwords(str_replace('_', ' ', $row[$z]['field']));
    $custom = "array(";
    $seperator = '';
    if ( $row[$z]['required']!='' ) {
        $custom.="'required'=>'required'";
        $seperator = ',';
    }
    if ( $row[$z]['css_class']!='' ) {
        $custom.=$seperator."'class'=>'".$row[$z]['css_class']."'";
    }
    $custom.= ")";

if ($row[$z]['input']=='textarea') { ?>
                        {!! make_input_textarea($errors, "<?php echo $f; ?>", "<?php echo $row[$z]['field']; ?>", $row-><?php echo $row[$z]['field']; ?>, <?php echo $custom; ?>) !!} 
<?php }elseif ($row[$z]['input']=='select') { ?>
                        {!! make_input_select($errors, "<?php echo $f; ?>", "<?php echo $row[$z]['field']; ?>", array(<?php foreach($row[$z]['enum_vals'] as $option) {
                            echo "'".$option."' => '".$option."', ";
                        } ?>), $row-><?php echo $row[$z]['field']; ?>, <?php echo $custom; ?>) !!} 
<?php }elseif ($row[$z]['input']=='radio') { ?>
                        {!! make_input_radio($errors, "<?php echo $f; ?>", "<?php echo $row[$z]['field']; ?>", array(1=>'Yes',0=>'No'), $row-><?php echo $row[$z]['field']; ?>, <?php echo $custom; ?>) !!}
<?php }else { ?>
                        {!! make_input_text($errors, "<?php echo $f; ?>", '<?php echo $row[$z]['input']; ?>', "<?php echo $row[$z]['field']; ?>", $row-><?php echo $row[$z]['field']; ?>, <?php echo $custom; ?>) !!} 
<?php } }?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <a href="{{url('admin/<?php echo $table; ?>')}}">
                            <button type="button" class="btn btn-default pull-left">Cancel</button>
                        </a>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- Main content end -->
@endsection