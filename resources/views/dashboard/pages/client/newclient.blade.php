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
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>New Client</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method='post' action="{{ route('add-new-client') }}">

                                    @csrf
                                    <div class="form-group">
                                        <label class=" form-control-label">client name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                            <input class="form-control" required name="client_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Phone</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                            <input class="form-control" required name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                            <input class="form-control" type="email" required name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">ID</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                            <input class="form-control" required type="number" name="id">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">Entry Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <input class="form-control" required type="date" name="entry_date">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" form-control-label">House No</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            <select name="house_no" class="form-control" required id="house_no">
                                                @php
                                                $houses = App\Models\Houses::whereNotIn('house_no', function (
                                                $query,
                                                ) {
                                                $query->select('house_no')->from('clients');
                                                })->get();
                                                @endphp
                                                @foreach ($houses as $house)
                                                <option value="{{ $house->house_no }}">{{ $house->house_no }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary btn-sm form-control">Create</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
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