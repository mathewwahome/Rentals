<!doctype html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

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
    @include('layout.aside')
    <div id="right-panel" class="right-panel">
        @include('layout.header')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                    <li class="active">Clients</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">
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
            </div>
        </div>
        <div class="clearfix"></div>
        @include('layout.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>
</body>

</html>