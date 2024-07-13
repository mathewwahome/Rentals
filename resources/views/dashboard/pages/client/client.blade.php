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
    $t_clients = App\Models\Tenant::count();
    $clients = App\Models\Tenant::all();
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
                                        <div class="stat-text"><span class="count">{{$appusers}}</span></div>
                                        <div class="stat-heading">App Users</div>
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
                                        <div class="stat-text"><span class="count">{{$t_clients}}</span></div>
                                        <div class="stat-heading">Total Tenant</div>
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
                                        <div class="stat-text"><span class="count">{{$t_houses}}</span></div>
                                        <div class="stat-heading">Total Houses</div>
                                    </div>
                                </div>
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
                            <strong class="card-title">Client Table</strong>
                            <div>
                                <a href="{{ route('single_report', ['report' => 'client']) }}" class="btn btn-secondary">Report</a>
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

                                    @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->client_name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->house_no }}</td>
                                        <td>status</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <form action="{{ route('client.view') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                    <button class="btn btn-success" type="submit"><i class="bi bi-book"></i></button>
                                                </form>
                                                <a class="btn btn-secondary ml-2" href="{{ route('single.client', ['client' => $client->id]) }}"><i class="bi bi-pencil"></i></a>
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