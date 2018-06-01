@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Modify User    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/system/user')}}">Users</a></li>
        <li class="active">Modify</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update User Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="updateForm" class="form-horizontal" action="{{action('UserController@update', $row->id)}}" method="POST">
                    <div class="box-body">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        {!! make_input_text($errors, "Username/Email", "text", "user", $row->user, array("required"=>"required",)) !!} 
                        {!! make_input_text($errors, "Password", "password", "password") !!}
                        {!! make_input_text($errors, "Verify Your Password", "password", "confirm_password") !!}
                        {!! make_input_text($errors, "Email", "email", "email", $row->email, array("required"=>"required",)) !!} 
                        {!! make_input_text($errors, "First Name", "text", "first_name", $row->first_name) !!} 
                        {!! make_input_text($errors, "Last Name", "text", "last_name", $row->last_name) !!} 
                        {!! make_input_select($errors, "Status", "status", Config::get('constants.user_status'),  $row->status) !!}
                        {!! make_input_select($errors, "User Group", "user_group", $groups, $row->user_group) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <a href="{{url('admin/system/user')}}">
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
<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#updateForm").validate({
            rules: {
                user: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: false,
                    minlength: 5
                },
                confirm_password: {
                    required: false,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                user: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address"
            }
        });
});

$('input[id=user]').blur(function(){
    if($('#email').val()=='') {
        $('#email').val($('input[id=user]').val()).removeClass('error');
        $('#email + .error').hide();
    }
})
</script>
<!-- Main content end -->
@endsection