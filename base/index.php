@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Manage <?php echo ucwords($module); ?>s
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/settings/<?php echo $table; ?>')}}"><?php echo ucwords($module); ?>s</a></li>
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
                        <a href="{{action('<?php echo $class; ?>Controller@create')}}" class="btn btn-info btn-sm m-5">Create <?php echo ucwords($module); ?></a>
                    </div>

                    <div class="col-md-6">
                        <div class="box-tools" style="">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <select name="field" class="form-control fsel pull-left m-5">
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { $f = ucwords(str_replace('_', ' ', $fields[$z]['Field'])); ?>
                                    <option value="<?php echo $fields[$z]['Field']; ?>" {{$data['field']=='<?php echo $fields[$z]['Field']; ?>'?'selected':''}}><?php echo $f ?></option>
<?php } ?>
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
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { $f = ucwords(str_replace('_', ' ', $fields[$z]['Field'])); ?>
                            <th><a href="{{url('admin/settings/<?php echo $table; ?>')}}?order_by=<?php echo $fields[$z]['Field']; ?>&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='<?php echo $fields[$z]['Field']; ?>'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='<?php echo $fields[$z]['Field']; ?>'?'asc':'desc'}}" aria-hidden="true"></i></a><?php echo $f; ?></th>
<?php } ?>
                            <th>Actions</th>
                        </tr>
                        @foreach ($rows as $row)
                        <tr>
<?php for ($z=0; $z < $fields[0]['nrows']; $z++) { ?>
                        <td><?php echo '<?php'; ?> echo $row['<?php echo $fields[$z]['Field']; ?>']; ?></td>
<?php } ?>
                            <td><a href="{{action('<?php echo $class; ?>Controller@edit', $row->id)}}" class="btn btn-info btn-xs pull-left m-r-5">Edit</a>
                                <form action="{{action('<?php echo $class; ?>Controller@destroy', $row->id)}}" method="post">
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
        window.location.href = "{{url('admin/settings/<?php echo $table; ?>')}}?field="+field+"&search="+search;
    });
});
</script>
@endsection