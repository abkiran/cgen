@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Change Password    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Change Password</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                <form id="updateForm" class="form-horizontal" action="{{url('/system/change_password')}}" method="POST">
                    <div class="box-body">
                        @csrf
                        {!! make_input_text($errors, "Current Password", "password", "old_password") !!}
                        {!! make_input_text($errors, "New Password", "password", "password") !!}
                        {!! make_input_text($errors, "Verify Your Password", "password", "password_confirmation") !!}
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
<script type="text/javascript">
$(document).ready(function() {
    $("#updateForm").validate({
        rules: {
            old_password: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            old_password: {
                required: "Please provide a valid old password",
                minlength: "Your password must be at least 5 characters long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password_confirmation: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            }
        }
    });
});
</script>
<!-- Main content end -->
@endsection