<!doctype html>

<html class="no-js" lang="">

<head>
@include('layout.head')

</head>

<body>
    @php
    $reports=App\Models\Reports::all()->count();
    $clients =App\Models\Reports::where('report_type','client')->count();
    $houses =App\Models\Reports::where('report_type','houses')->count();
    $users =App\Models\Reports::where('report_type','users')->count();
    $water_bills =App\Models\Reports::where('report_type','water bills')->count();
    $rent =App\Models\Reports::where('report_type','rent')->count();

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
                                <div class="stat-icon dib flat-color-3">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $reports }}</span></div>
                                        <div class="stat-heading">Total Report</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'client']) }}"><i class="fa fa-arrow-right">More Info</i></a>
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
                                        <div class="stat-text"><span class="count">{{ $clients }}</span></div>
                                        <div class="stat-heading">Clients Report</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'client']) }}"><i class="fa fa-arrow-right">More Info</i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $houses }}</span></div>
                                        <div class="stat-heading">Houses</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'houses']) }}"><i class="fa fa-arrow-right">More Info </i></a>
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
                                        <div class="stat-text"><span class="count">{{ $users }}</span></div>
                                        <div class="stat-heading">Users</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'users']) }}"><i class="fa fa-arrow-right">More Info </i></a>
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
                                        <div class="stat-text"><span class="count">{{ $water_bills }}</span></div>
                                        <div class="stat-heading">Water Bills</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'water bills']) }}"><i class="fa fa-arrow-right">More Info </i></a>
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
                                        <div class="stat-text"><span class="count">{{ $rent }}</span></div>
                                        <div class="stat-heading">Rent</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-info">
                            <a class="text-light" href="{{ route('single_report', ['report' => 'rent']) }}"><i class="fa fa-arrow-right">More Info </i></a>
                        </div>
                    </div>
                </div>
            </div>
            <p>Create a table to display all the available reports then one can select the report they want to generate</p>
            <p>Create report types for generation</p>
            <p>Create report graph for all the generated reports</p>
            <p>dispal filtered cards when I select on a specific report type == total specific reports, and also filter by reports types</p>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Client Report</strong>
                        </div>
                        <div class="card-body card-block">
                            <p>Generate Report</p>
                            <form method='post' action="{{ url('client-report-generation') }}">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Client Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select name="client_type" required id="client_type" class="form-control">
                                            <option value="all">all</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Format</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                        <select name="format" required id="format" class="form-control">
                                            <option value="csv">CSV</option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Houses Report</strong>
                        </div>
                        <div class="card-body card-block">
                            <p>Generate Report</p>
                            <form method='post' action="{{ url('houses-report-generation') }}">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Client Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select name="houses_type" required id="client_type" class="form-control">
                                            <option value="all">all</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Format</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                        <select name="format" required id="format" class="form-control">
                                            <option value="csv">CSV</option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Water Bill Report</strong>
                        </div>
                        <div class="card-body card-block">
                            <p>Generate Report</p>
                            <form method='post' action="{{ url('houses-report-generation') }}">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Client Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select name="houses_type" required id="client_type" class="form-control">
                                            <option value="all">all</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Format</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                        <select name="format" required id="format" class="form-control">
                                            <option value="csv">CSV</option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Rent Report</strong>
                        </div>
                        <div class="card-body card-block">
                            <p>Generate Report</p>
                            <form method='post' action="{{ url('houses-report-generation') }}">
                                @csrf
                                <div class="form-group">
                                    <label class=" form-control-label">Client Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <select name="houses_type" required id="client_type" class="form-control">
                                            <option value="all">all</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Format</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                        <select name="format" required id="format" class="form-control">
                                            <option value="csv">CSV</option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                </div>
                            </form>
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