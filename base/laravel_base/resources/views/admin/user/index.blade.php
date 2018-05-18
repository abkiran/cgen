@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Manage Users
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/system/user')}}">Users</a></li>
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
                        <a href="{{action('UserController@create')}}" class="btn btn-info btn-sm m-5">Create User</a>
                    </div>

                    <div class="col-md-6">
                        <div class="box-tools" style="">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <select name="field" class="form-control fsel pull-left m-5">
                                    <option value="first_name" {{$data['field']=='first_name'?'selected':''}}>First Name</option>
                                    <option value="last_name" {{$data['field']=='last_name'?'selected':''}}>Last Name</option>
                                    <option value="user" {{$data['field']=='user'?'selected':''}}>User</option>
                                    <option value="email" {{$data['field']=='email'?'selected':''}}>Email</option>
                                    <option value="status" {{$data['field']=='status'?'selected':''}}>Status</option>
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
                            <th>User/Email<a href="{{url('admin/system/user')}}?order_by=user&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='user'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='user'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th colspan="2">User Group<a href="{{url('admin/system/user')}}?order_by=user_group&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='user_group'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='user_group'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Status<a href="{{url('admin/system/user')}}?order_by=status&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='status'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='status'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($rows as $row)
                        <tr>
                            <td colspan="2"><?php echo $row['user']; ?></td>
                            <td>{{ $row->userGroup->name??'Unknown'}}</td>
                            <td><span class="label label-{{$row->status=='Active'?'success':'danger'}}">{{$row->status}}</span></td>
                            <td><a href="{{action('UserController@edit', $row->id)}}" class="btn btn-info btn-xs pull-left m-r-5">Edit</a>
                                <form action="{{action('UserController@destroy', $row->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete {{ $row['user']??''}}?');" type="submit">Delete</button>
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
        window.location.href = "{{url('admin/system/user')}}?field="+field+"&search="+search;
    });
});
</script>
@endsection