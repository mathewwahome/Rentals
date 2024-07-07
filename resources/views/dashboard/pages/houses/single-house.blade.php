<!doctype html>
<html class="no-js" lang="">

<head>
    <base href="{{ '/' }}">
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
                
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <div class="stat-text"><span>{{ $client->client_name }}</span></div>
                                    <span class="text-muted small pt-2 ps-1">House No: {{ $house->house_no }}</span>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Client Details</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Phone</th>
                                        <th>House No.</th>
                                        <th>Status.</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>
                                        <th>{{ $client->id }}</th>
                                        <td>{{ $client->client_name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->house_no }}</td>
                                        <td>status</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">House Description</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered datatable">
                                <thead>
                                    <tr>
                                        <th>House Number</th>
                                        <th>Rooms</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>{{ $house->house_no }}</th>
                                        <td>{{ $house->rooms }}</td>
                                        <td>{{$house->status}}</td>
                                        <td><button>edit</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card-header">
                        <strong class="card-title">Todo</strong>
                    </div>
                    <div class="card-body">
                        <ol>
                            <li>The last table should contain the total rent payed, water bills the balances
                            </li>
                            <li>Have a payment type on the full site
                            </li>
                            <li>Delete the client- should be moved to the bin by setting as inactive -to maintain the data for ft reference
                            </li>
                            <li>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>