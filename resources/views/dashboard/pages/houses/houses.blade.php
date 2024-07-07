<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    $houses = App\Models\Houses::all();
    $no_houses = App\Models\Houses::count();
    $vacantHouses = \App\Models\Houses::where('status', 'vacant')->count();
    $occupiedHouses = \App\Models\Houses::where('status', 'occupied')->count();

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

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $no_houses }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Houses</span>

                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-success">
                            <a class="text-light" href="{{ route('single_import', ['imports' => 'all']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>



                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $vacantHouses }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Vacant Houses</span>

                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-success">
                            <a class="text-light" href="{{ route('single_import', ['imports' => 'all']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $occupiedHouses }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Occupied Houses</span>

                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center bg-success">
                            <a class="text-light" href="{{ route('single_import', ['imports' => 'all']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="card col-md-12">
                <style>
                    .card-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                    }
                </style>
                <div class="card-header">
                    <strong class="card-title">Houses Table</strong>
                    <div>
                        <a href="{{ route('single_report', ['report' => 'houses']) }}" class="btn btn-secondary">Report</a>
                        <a href="" type="button" class="btn btn-secondary">New House +</a>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered datatable">

                        <thead>
                            <tr>
                                <th>House NO.</th>
                                <th>Rooms</th>
                                <th>price</th>
                                <th>status</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($houses as $house)
                            <tr>
                                <td>{{ $house->house_no }}</td>
                                <td>{{ $house->rooms }}</td>
                                <td>{{ $house->price }}</td>
                                <td>{{ $house->status }}</td>
                                <td>
                                    <div class="row ml-2">

                                        <a class="btn btn-secondary ml-2" href="{{ route('single.house', ['house' => $house->id]) }}"><i class="ti ti-book"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>

        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>