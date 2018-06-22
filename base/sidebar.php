<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel hide">
            <div class="pull-left image">
                <img src="/chicago/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo '<?php'; ?> $systems = Config::get('constants.system');
        if (!isset($route)) {
            $route="";
        }?>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
<?php for ($m=0; $m < $TABLES[0]['nrows']; $m++) {
    $t=strtolower($TABLES[$m]['Tables_in_'.$db_name]);
    if ($t == 'user'||$t=='setting') {
        continue;
    }
?>
            <li class="treeview {{$route=='<?php echo $t; ?>'?'menu-open':''}}">
              <a href="#">
                <i class="fa fa-table"></i> <span><?php echo ucfirst(str_replace('_', ' ', $t)); ?>s</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                    <li><a href="{{url('/admin/<?php echo $t; ?>')}}"><i class="fa fa-circle-o"></i>List</a></li>
                    <li><a href="{{url('/admin/<?php echo $t; ?>/create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              </ul>
            </li>
<?php } ?>
            <li class="treeview {{$route=='user'?'menu-open':''}}">
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Users</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="{{$route=='user'?'display: block;':''}}">
                    <li><a href="{{url('/admin/user')}}"><i class="fa fa-arrow-circle-o-right"></i>List</a></li>
                    <li><a href="{{url('/admin/user/create')}}"><i class="fa fa-arrow-circle-o-right"></i>Create</a></li>
                </ul>
            </li>
            <li><a href="{{url('/admin/setting')}}"><i class="fa fa-circle-o"></i>Settings</a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>