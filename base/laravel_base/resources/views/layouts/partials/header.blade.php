<header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Chicago</b>&nbsp;Greeter</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <?php if(!Auth::guest()) { ?>
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        <?php } ?>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <?php if (!Auth::guest()) { ?>                
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="/chicago/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <span class="hidden-xs">{{ ucfirst(Auth::user()->user) }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/chicago/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                {{ ucfirst(Auth::user()->user) }}
                                <small>Place his roll</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php } ?>
        </div>
    </nav>
</header>
<style>
<?php if (Auth::guest()) { ?>
    .main-footer, .content-wrapper {
        margin-left:0px;
    }
<?php } ?>
</style>