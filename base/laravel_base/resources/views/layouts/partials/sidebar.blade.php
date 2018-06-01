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
        <?php $systems = Config::get('constants.system');
        if (!isset($route)) {
            $route="";
        }?>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="/admin"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            <li class="treeview {{array_key_exists($route."s", $systems)||$route=='setting'?'menu-open':''}}">
              <a href="#">
                <i class="fa fa-table"></i> <span>System</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="{{array_key_exists($route."s", $systems)?"display:block":''}}">
                @foreach ($systems as $key => $sys)
                    <li class="{{$route."s"==$key?'active':''}}"><a href="{{url('/admin/system/'.rtrim($key,'s'))}}"><i class="fa fa-circle-o"></i>{{ucfirst(str_replace('_', ' ', $key))}}</a></li>
                @endforeach
              </ul>
            </li>
            <li class="{{$route=='volunteer'?"active":''}}"><a href="/admin/volunteer"><i class="fa fa-user"></i><span>Volunteers</span></a></li>
            <li class="treeview {{$route=='volunteer_opportunity'?'menu-open':''}}">
              <a href="#">
                <i class="fa fa-table"></i> <span>Volunteer opportunities</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                    <li><a href="{{url('/admin/volunteer_opportunity')}}"><i class="fa fa-circle-o"></i>List</a></li>
                    <li><a href="{{url('/admin/volunteer_opportunity/create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              </ul>
            </li>
            <!-- <li class="treeview {{$route=='instagreeter'?'menu-open':''}}">
              <a href="#">
                <i class="fa fa-table"></i> <span>Instagreeters</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                    <li><a href="{{url('/admin/instagreeter')}}"><i class="fa fa-circle-o"></i>List</a></li>
                    <li><a href="{{url('/admin/instagreeter/create')}}"><i class="fa fa-circle-o"></i>Create</a></li>
              </ul>
            </li> -->
           <!--  <li class="treeview {{$route=='volunteer'?'menu-open':''}}">
              <a href="#">
                <i class="fa fa-table"></i> <span>Volunteers</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
               <ul class="treeview-menu" style="{{$route=='volunteer'?"display:block":''}}">
                    <li><a href="{{url('/admin/volunteer')}}"><i class="fa fa-circle-o"></i>All Volunteers</a></li>
                    <li><a href="{{url('/admin/volunteer/create')}}"><i class="fa fa-circle-o"></i>Create Volunteer</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="/admin/volunteer"><i class="fa fa-dashboard"></i><span>Volunteers</span></a></li> -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>