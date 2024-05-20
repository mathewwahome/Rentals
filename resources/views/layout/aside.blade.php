<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Clients</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Clients</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('viewclients')}}">All clients</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{route('newclients')}}">New Client</a></li>
                    </ul>
                </li>
              
                <li class="menu-title">Bills</li>
                <!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Bills</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('water-bills')}}">Water Bills</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('rent')}}">Rent</a></li>
                    </ul>
                </li>
                <li class="menu-title">Houses</li>
                <!-- /.menu-title -->
                <li>
                    <a href="{{route('houses')}}"> <i class="menu-icon ti-email"></i>Houses </a>
                </li>
                <li class="menu-title">Theme</li>
                <!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Theme</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Settings</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Admin</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>