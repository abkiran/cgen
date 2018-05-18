@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Manage System Settings
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/system/system_setting')}}">System Settings</a></li>
        <li class="active">List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="col-md-6">
                        <a href="{{action('SystemSettingController@create')}}" class="btn btn-info btn-sm m-5">Create System Setting</a>
                    </div>

                    <div class="col-md-6">
                        <div class="box-tools" style="">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <select name="field" class="form-control fsel pull-left m-5">
                                    <option value="key" {{$data['field']=='key'?'selected':''}}>Key</option>
                                    <option value="label" {{$data['field']=='label'?'selected':''}}>Label</option>
                                    <option value="value" {{$data['field']=='value'?'selected':''}}>Value</option>
                                    <option value="widget" {{$data['field']=='widget'?'selected':''}}>Widget</option>
                                    <option value="widget_description" {{$data['field']=='widget_description'?'selected':''}}>Widget Description</option>
                                </select>
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <div class="input-group input-group-sm pull-left m-5">
                                    <input type="text" name="search" class="form-control pull-right" placeholder="Search" value="{{$data['search']}}">

                                    <div class="input-group-btn">
                                        <button class="btn btn-default search"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Key<a href="{{url('admin/system/system_setting')}}?order_by=key&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='key'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='key'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Label<a href="{{url('admin/system/system_setting')}}?order_by=label&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='label'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='label'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Value<a href="{{url('admin/system/system_setting')}}?order_by=value&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='value'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='value'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Widget<a href="{{url('admin/system/system_setting')}}?order_by=widget&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='widget'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='widget'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Widget Description<a href="{{url('admin/system/system_setting')}}?order_by=widget_description&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='widget_description'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='widget_description'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($rows as $row)
                        <tr>
                        <td><?php echo $row['key']; ?></td>
                        <td><?php echo $row['label']; ?></td>
                        <td><?php echo $row['value']; ?></td>
                        <td><?php echo $row['widget']; ?></td>
                        <td><?php echo $row['widget_description']; ?></td>
                            <td><a href="{{action('SystemSettingController@edit', $row->id)}}" class="btn btn-info btn-xs pull-left m-r-5">Edit</a>
                                <form action="{{action('SystemSettingController@destroy', $row->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if(count($rows)==0)
                            <tr>
                                <td colspan=3><p>No rows found!</p></td>
                            </tr>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            {{ $rows->links() }}
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- Main content end -->
<script type="text/javascript">
$(document).ready(function() {
    $('.search').click(function(event) {
        search = $('input[name=search]').val();
        field = $('select[name=field]').val();
        window.location.href = "{{url('admin/system/system_setting')}}?field="+field+"&search="+search;
    });
});
</script>
@endsection