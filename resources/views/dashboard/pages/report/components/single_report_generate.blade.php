<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body> @php
    $reports = App\Models\Reports::where('report_type',$report_type)->get();
    @endphp
    @include('layout.aside')

    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ Str::title($report_type) }} Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Dashboard</li>
                    <li class="breadcrumb-item active">{{ Str::title($report_type) }}</li>

                </ol>
            </nav>
        </div>

        <section class="section dashboard">
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
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>