@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
<section class="content-header">
	<h1>
	Dashboard
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>
<section class="content">
	<div class="row">
<?php $fn=array();
for ($m=0; $m < $TABLES[0]['nrows']; $m++) {
    $table=strtolower($TABLES[$m]['Tables_in_'.$db_name]);
    $module=ucwords(str_replace('_', ' ', $TABLES[$m]['Tables_in_'.$db_name]));
    $class = str_replace(" ", '', ucwords($module));
    array_push($fn, $table);
?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$<?php echo $table; ?>}}</h3>
					<p><?php echo $module; ?>s</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-stalker"></i>
				</div>
				<a href="{{url('admin/<?php echo $table ?>')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
<?php } ?>
	</div>
</section>
@endsection
