@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        System
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/setting')}}">System Settings</a></li>
        <li class="active">Modify</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Modify System Setting</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{action('SettingController@update', $row->id)}}" method="POST">
                    <div class="box-body">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        {!! make_input_text($errors, "Key", "text", "key", $row->key) !!} 
                        {!! make_input_text($errors, "Label", "text", "label", $row->label) !!} 
                        {!! make_input_text($errors, "Value", "text", "value", $row->value) !!} 
                        {!! make_input_text($errors, "Widget", "text", "widget", $row->widget) !!} 
                        {!! make_input_text($errors, "Widget Description", "text", "widget_description", $row->widget_description) !!} 
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <a href="{{url('admin/setting')}}">
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