<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    $webusers = App\Models\WebUsers::count();
    $appusers = App\Models\AppUsers::count();
    $inactiveusers = App\Models\AppUsers::count();//where status === inactive
    $totalusers = $webusers + $appusers;
    @endphp
    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$totalusers}}</span></div>
                                        <div class="stat-heading">All Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-2">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$webusers}}</span></div>
                                        <div class="stat-heading">Web Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$inactiveusers}}</span></div>
                                        <div class="stat-heading">Inactive Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$appusers}}</span></div>
                                        <div class="stat-heading">App Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->

            <div class="clearfix"></div>
            <!-- Orders -->
            <div class="orders">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">New Web User</div>
                            <div class="card-body card-block">
                                <form action="{{ route('new-web-user') }}" method="post" class="">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" id="password1" name="password1" placeholder="Password" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" placeholder="Confirm Password" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">New App User</div>
                            <div class="card-body card-block">
                                <form action="{{ route('new-app-user') }}" method="post" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" id="username2" name="username2" placeholder="Username" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" id="email2" name="email2" placeholder="Email" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" id="password1" name="password1" placeholder="Password" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" id="password2" name="password2" placeholder="Confirm Password" class="form-control">
                                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-secondary btn-sm">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Web Users</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">ID</th>
                                                <th class="avatar">User profile</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $webusers = App\Models\WebUsers::all();
                                            @endphp
                                            @foreach ($webusers as $webuser)
                                            <tr>
                                                <td class="serial">{{ $webuser->id }}</td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td> {{ $webuser->name }} </td>
                                                <td> <span class="name">{{ $webuser->email }}</span> </td>
                                                <td> <span class="product">{{ $webuser->role }}</span> </td>
                                                <td>
                                                    <span class="badge badge-complete">Verified</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Web Users</h4>
                            </div>
                            <div class="card-body--">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">ID</th>
                                                <th class="avatar">User profile</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $appusers = App\Models\AppUsers::all();
                                            @endphp
                                            @foreach ($appusers as $appuser)
                                            <tr>
                                                <td class="serial">{{ $appuser->id }}</td>
                                                <td class="avatar">
                                                    <div class="round-img">
                                                        <a href="#"><img class="rounded-circle" src="images/avatar/3.jpg" alt=""></a>
                                                    </div>
                                                </td>
                                                <td> {{ $appuser->name }} </td>
                                                <td> <span class="name">{{ $appuser->email }}</span> </td>
                                                <td> <span class="product">{{ $appuser->role }}</span> </td>
                                                <td>
                                                    <span class="badge badge-complete">Verified</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>