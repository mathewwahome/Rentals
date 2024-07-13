<aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Dashboard Section -->
            <li class="nav-heading">Dashboards</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('importer_dashboard') }}">
                    <i class="bi bi-person"></i>
                    <span>Importer Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('report_dashboard') }}">
                    <i class="bi bi-person"></i>
                    <span>Report Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('houses') }}">
                    <i class="bi bi-person"></i>
                    <span>Houses</span>
                </a>
            </li>
            <!-- Tenants Section -->
            <li class="nav-heading">Tenants</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Tenants-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Tenants</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Tenants-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('viewclients') }}">
                            <i class="bi bi-circle"></i><span>Tenants</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('newclients') }}">
                            <i class="bi bi-circle"></i><span>New Tenant</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Accounting Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Accounting-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Accounting</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Accounting-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('accounting') }}">
                            <i class="bi bi-circle"></i><span>Accounts Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('water-bills') }}">
                            <i class="bi bi-circle"></i><span>Water Bills</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('rent') }}">
                            <i class="bi bi-circle"></i><span>Rent</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Notifications Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Notifications-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Notifications</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Notifications-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('not.out.all') }}">
                            <i class="bi bi-circle"></i><span>All</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('not.out.all') }}">
                            <i class="bi bi-circle"></i><span>SMS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('not.out.all') }}">
                            <i class="bi bi-circle"></i><span>Email</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('not.out.water-bills') }}">
                            <i class="bi bi-circle"></i><span>Water Bills</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-heading">ADMIN</li>
            <!-- Admin Section -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Admin-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Admin-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admintheme') }}">
                            <i class="bi bi-circle"></i><span>Theme</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}">
                            <i class="bi bi-circle"></i><span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}">
                            <i class="bi bi-circle"></i><span>Back Up</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->
            <!-- Additional Nav Items -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admintheme') }}">
                    <i class="bi bi-person"></i>
                    <span>Theme</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users') }}">
                    <i class="bi bi-question-circle"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users') }}">
                    <i class="bi bi-envelope"></i>
                    <span>Back Up</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('users') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Accounts Module</span>
                </a>
            </li>
        </ul>
    </aside><!-- End Sidebar-->
