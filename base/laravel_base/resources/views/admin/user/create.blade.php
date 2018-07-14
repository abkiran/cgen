@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Create User    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/user')}}">Users</a></li>
        <li class="active">New</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Fill User Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="createForm" class="form-horizontal" action="{{url('admin/user')}}" method="POST">
                    <div class="box-body">
                        @csrf
                        {!! make_input_text($errors, "Username/Email", "text", "user", "", array("required"=>"required",)) !!} 
                        {!! make_input_text($errors, "Password", "password", "password", "", array("required"=>"required",)) !!}
                        {!! make_input_text($errors, "Verify Your Password", "password", "confirm_password", "", array("required"=>"required",)) !!}
                        {!! make_input_text($errors, "Email", "email", "email", "", array("required"=>"required","pattern"=>"[^.]+@[^.]+")) !!} 
                        {!! make_input_text($errors, "First Name", "text", "first_name") !!} 
                        {!! make_input_text($errors, "Last Name", "text", "last_name") !!} 
                        {!! make_input_select($errors, "Status", "status", Config::get('constants.user_status')) !!}
                        {!! make_input_select($errors, "User Group", "user_group", $groups) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <a href="{{url('admin/user')}}">
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
<script type="text/javascript">
jQuery(document).ready(function($) {

    jQuery.validator.addMethod("emailExt", function(value, element, param) {
        return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
    },'Please enter a valid email address');

    $("#createForm").validate({
            rules: {
                user: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    emailExt: true
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
@endsection