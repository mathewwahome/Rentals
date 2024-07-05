<!doctype html>

<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    $webusers = App\Models\WebUsers::count();
    $appusers = App\Models\WebUsers::count();
    $t_houses = App\Models\Houses::count();
    $t_clients = App\Models\Clients::count();
    $latestclients = App\Models\Clients::take(5)->get();
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
                                        <div class="stat-text"><span class="count">{{ $webusers }}</span></div>
                                        <div class="stat-heading">Houses</div>
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
                                        <div class="stat-text"><span class="count">{{ $appusers }}</span></div>
                                        <div class="stat-heading">Clients</div>
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
                                        <div class="stat-text"><span class="count">{{ $t_clients }}</span></div>
                                        <div class="stat-heading">Users</div>
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
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $t_houses }}</span></div>
                                        <div class="stat-heading">Water Bills</div>
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
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $t_houses }}</span></div>
                                        <div class="stat-heading">Rent</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Houses Importer</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('houses-importer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" id="houses" required name="houses" placeholder="Houses" class="form-control">
                                        <div class="input-group-addon"><i class="pe-7s-home"></i></div>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm">Import</button>
                                </div>
                            </form>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Download Template</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Clients Importer</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('houses-importer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" id="houses" required name="houses" placeholder="Houses" class="form-control">
                                        <div class="input-group-addon"><i class="pe-7s-home"></i></div>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm">Import</button>
                                </div>
                            </form>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Download Template</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Upload this months meter readings</strong>
                        </div>
                        <div class="card-body">
                            <div class="form  mt-4">
                                <form action="{{ route('water.bills.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meter_readings">Meter Readings:</label>
                                        <input type="file" name="meter_readings" required class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-sm">Upload</button>
                                </form>
                            </div>
                            <hr>
                            <a href="{{ route('water.bills.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
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