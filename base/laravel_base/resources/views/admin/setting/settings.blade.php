@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/system/setting')}}">System Settings</a></li>
        <li class="active">Modify</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modify System Settings</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{action('SystemSettingController@settingsUpdate')}}" method="POST">
                    <div class="box-body">
                        @csrf
                        @foreach ($rows as $row)
                            @if($row->widget=='widget_yes_no')
                                {!! make_input_radio($errors, $row->label, "set_".$row->id, array(1=>'Yes',0=>'No'), $row->value) !!} 
                            @elseif($row->widget=='form_textarea')
                                {!! make_input_textarea($errors, $row->label, "set_".$row->id, $row->value, array("rows"=>10)) !!} 
                            @else
                                {!! make_input_text($errors, $row->label, "text", "set_".$row->id, $row->value) !!} 
                            @endif
                        @endforeach
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
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