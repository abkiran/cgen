@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        System
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/<?php echo $table; ?>')}}"><?php echo ucwords($module); ?>s</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create <?php echo ucwords($module); ?></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/<?php echo $table; ?>')}}" method="POST">
                    <div class="box-body">
                        @csrf
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { 
    if ( $fields[$z]['Extra'] == 'auto_increment' ) continue;
    $f = ucwords(str_replace('_', ' ', $fields[$z]['Field']));?>
                        {!! make_input_text($errors, "<?php echo $f; ?>", "text", "<?php echo $fields[$z]['Field']; ?>") !!} 
<?php } ?>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
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