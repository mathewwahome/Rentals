<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
</head>

<body>
    @php
    $all_tenants = App\Models\Tenant::count();
   
    $tenants = App\Models\Tenant::all();
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
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $all_tenants }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total Tenants</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'client']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <style>
                            .card-header {
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            }
                        </style>
                        <div class="card-header">
                            <strong class="card-title">Tenants Table</strong>
                            <div>
                                <a href="{{ route('single_report', ['report' => 'tenant']) }}" class="btn btn-secondary">Report</a>
                                <a href="" type="button" class="btn btn-secondary">New Client +</a>
                            </div>
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
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tenants as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td>{{ $tenant->client_name }}</td>
                                        <td>{{ $tenant->email }}</td>
                                        <td>{{ $tenant->phone }}</td>
                                        <td>{{ $tenant->house_no }}</td>
                                        <td>status</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <form action="{{ route('client.view') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="client_id" value="{{ $tenant->id }}">
                                                    <button class="btn btn-success" type="submit"><i class="bi bi-book"></i></button>
                                                </form>
                                                <a class="btn btn-secondary ml-2" href="{{ route('single.client', ['client' => $tenant->id]) }}"><i class="bi bi-pencil"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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