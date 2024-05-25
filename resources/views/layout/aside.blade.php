<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Clients</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Clients</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-users"></i><a href="{{route('viewclients')}}">All clients</a></li>
                        <li><i class="fa fa-user"></i><a href="{{route('newclients')}}">New Client</a></li>
                    </ul>
                </li>
                <li class="menu-title">Bills</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Bills</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('water-bills')}}">Water Bills</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('rent')}}">Rent</a></li>
                    </ul>
                </li>
                <li class="menu-title">Houses</li>
                <li>
                    <a href="{{route('houses')}}"> <i class="menu-icon fa fa-building-o"></i>Houses </a>
                </li>
                <li class="menu-title">Notifications</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Incomming</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('rent')}}">All</a></li>
                    </ul>
                </li>
                <li class="menu-title">Admin</li>
                <li>
                    <a href="{{route('admintheme')}}"> <i class="menu-icon fa fa-windows"></i>Theme </a>
                </li> 
                <li>
                    <a href="{{route('users')}}"> <i class="menu-icon fa fa-users"></i>Users </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>