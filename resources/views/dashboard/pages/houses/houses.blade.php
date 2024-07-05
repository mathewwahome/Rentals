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
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $no_houses }}</span></div>
                                        <div class="stat-heading">Total Houses</div>
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
                                        <div class="stat-text"><span class="count">{{ $vacantHouses }}</span></div>
                                        <div class="stat-heading">Vacant Houses</div>
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
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $occupiedHouses }}</span>
                                        </div>
                                        <div class="stat-heading">Occupied houses</div>
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
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $occupiedHouses }}</span>
                                        </div>
                                        <div class="stat-heading">Importer</div>
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
                                    <i class="pe-7s-home"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{ $occupiedHouses }}</span>
                                        </div>
                                        <div class="stat-heading">Report</div>
                                    </div>
                                </div>
                            </div>
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
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
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