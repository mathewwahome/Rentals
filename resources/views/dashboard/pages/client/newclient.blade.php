<!doctype html>

<html class="no-js" lang="">

<head>
    @include('layout.head')
</head>

<body>

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
                                            $query->select('house_no')->from('tenants');
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
                @include('layout.footer')
                @include('layout.scripts')
            </div>
        </section>
    </main>
</body>

</html>