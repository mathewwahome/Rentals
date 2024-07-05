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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    @include('layout.aside')
    @php
    $reports = App\Models\Reports::where('report_type',$report_type)->get();
    @endphp
    <div id="right-panel" class="right-panel">
        @include('layout.header')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><strong>Generate {{ Str::title($report_type) }} Reports</strong></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Generate Report</a></li>
                                    <li class="active">{{ Str::title($report_type) }}</li>
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
                    @if ($report_type == 'client')
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
                                                <option value="all">All</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Format</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-file"></i></div>
                                            <select name="format" required id="format" class="form-control">
                                                <option value="csv">CSV</option>
                                                <option value="xlsx">Excel</option>
                                                <option value="pdf">PDF</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text" hidden value="{{$report_type}}" name="report_type">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                    </div>
                                </form>
                            </div> @elseif ($report_type == 'houses')
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
                                                        <option value="xlsx">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" hidden value="{{$report_type}}" name="report_type">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @elseif ($report_type == 'water bills')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Houses Report</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <p>Generate Report</p>
                                        <form method='post' action="{{ url('water_bill-report-generation') }}">
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
                                                        <option value="xlsx">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" hidden value="{{$report_type}}" name="report_type">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @elseif ($report_type == 'users')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Users Report</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <p>Generate Report</p>
                                        <form method='post' action="{{ url('users-report-generation') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class=" form-control-label">Client Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <select name="users_type" required id="client_type" class="form-control">
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
                                                        <option value="xlsx">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" hidden value="{{$report_type}}" name="report_type">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @elseif ($report_type == 'rent')
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Houses Report</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <p>Generate Report</p>
                                        <form method='post' action="{{ url('rent-report-generation') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class=" form-control-label">Client Type</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                    <select name="rent_type" required id="client_type" class="form-control">
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
                                                        <option value="xlsx">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="text" hidden value="{{$report_type}}" name="report_type">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-secondary btn-sm form-control">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p>This is a different type of report.</p>
                            @endif
                            <div class="card-body">

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
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
</body>

</html>