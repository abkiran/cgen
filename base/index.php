@extends('layouts.admin') 
@section('content')
<section class="content-header">
    <h1>
        Manage <?php echo ucwords($module); ?>s
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('admin/<?php echo $table; ?>')}}"><?php echo ucwords($module); ?>s</a></li>
        <li class="active">List</li>
    </ol>
</section>
<input type="hidden" id="data-url" value="admin/<?php echo $table; ?>">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="col-md-6">
                        <a href="{{action('<?php echo $class; ?>Controller@create')}}" class="btn btn-primary btn-sm m-5">Create <?php echo ucwords($module); ?></a>
                    </div>

                    <div class="col-md-6">
                        <div class="box-tools" style="">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-5 col-xs-6">
                                <select name="field" class="form-control fsel pull-left m-5">
<?php for ($z=0; $z < $row[0]['nrows']; $z++) {
    $f = ucwords(str_replace('_', ' ', $row[$z]['field'])); ?>
                                    <option value="<?php echo $row[$z]['field']; ?>" {{$data['field']=='<?php echo $row[$z]['field']; ?>'?'selected':''}}><?php echo $f ?></option>
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
<?php for ($z=0; $z < $row[0]['nrows']; $z++) {
    $f = ucwords(str_replace('_', ' ', $row[$z]['field'])); ?>
                            <th><?php echo $f; ?><a href="{{url('admin/<?php echo $table; ?>')}}?field={{$data['field']}}&search={{$data['search']}}&order_by=<?php echo $row[$z]['field']; ?>&order_by_type={{$data['order_by_type']=='ASC'&&$data['order_by']=='<?php echo $row[$z]['field']; ?>'?'DESC':'ASC'}}"><i class="fa fa-sort-{{$data['order_by_type']=='ASC'&&$data['order_by']=='<?php echo $row[$z]['field']; ?>'?'asc':'desc'}}" aria-hidden="true"></i></a></th>
<?php } ?>
                            <th>Actions</th>
                        </tr>
                        @foreach ($rows as $row)
                        <tr class="row-{{$row->id}}">
<?php for ($z=0; $z < $row[0]['nrows']; $z++) { ?>
                            <td>{{ $row['<?php echo $row[$z]['field']; ?>'] }}</td>
<?php } ?>
                            <td><a href="{{action('<?php echo $class; ?>Controller@edit', $row->id)}}" class="btn btn-primary btn-xs pull-left m-r-5">Edit</a>
                                <button class="btn btn-danger btn-xs delete" type="button" data-id="{{$row->id}}" data-name="{{ $row['<?php echo $row[0]['field']; ?>']??'' }}" data-url="admin/<?php echo $table; ?>" onclick="deleteRow(this)">Delete</button>
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
        window.location.href = "{{url('admin/<?php echo $table; ?>')}}?field="+field+"&search="+search;
    });
});
</script>
@endsection