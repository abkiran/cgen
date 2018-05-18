@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        System
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/system/system_setting')}}">System Settings</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create System Setting</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('admin/system/system_setting')}}" method="POST">
                    <div class="box-body">
                        @csrf
                        {!! make_input_text($errors, "Key", "text", "key") !!} 
                        {!! make_input_text($errors, "Label", "text", "label") !!} 
                        {!! make_input_text($errors, "Value", "text", "value") !!} 
                        {!! make_input_text($errors, "Widget", "text", "widget") !!} 
                        {!! make_input_text($errors, "Widget Description", "text", "widget_description") !!} 
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                        <a href="{{url('admin/system/system_setting')}}">
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