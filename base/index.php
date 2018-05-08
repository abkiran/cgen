@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Manage <?php echo ucwords($module); ?>s
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?php echo ucwords($table); ?>s</a></li>
        <li class="active">List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo ucwords($table); ?>s</h3>

                    <div class="box-tools">
                        <a href="{{action('<?php echo $class; ?>Controller@create')}}" class="btn btn-info btn-xs">Create <?php echo ucwords($table); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { $f = ucwords(str_replace('_', ' ', $fields[$z]['Field'])); ?>
<th><?php echo $f ?></th>
<?php } ?>
                            <th colspan="2">Actions</th>
                        </tr>
                        @foreach ($rows as $row)
                        <tr>
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
                        <td><?php echo '<?php'; ?> echo $row['<?php echo $fields[$z]['Field']; ?>']; ?></td>
<?php } ?>
                            <td><a href="{{action('<?php echo $class; ?>Controller@edit', $row->id)}}" class="btn btn-info btn-xs">Edit</a></td>
                            <td>
                                <form action="{{action('<?php echo $class; ?>Controller@destroy', $row->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
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
@endsection