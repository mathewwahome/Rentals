<!doctype html>

<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    $webusers = App\Models\Imports::where('import_type', 'web_users')->count();
    $appusers = App\Models\Imports::where('import_type', 'appusers')->count();
    $houses = App\Models\Imports::where('import_type', 'houses')->count();
    $clients = App\Models\Imports::where('import_type', 'clients')->count();
    $water_bills = App\Models\Imports::where('import_type', 'water_bills')->count();
    $rent = App\Models\Imports::where('import_type', 'rent')->count();
    $water_meter_readings = App\Models\Imports::where('import_type', 'water meter reading')->count();
    $imports = App\Models\Imports::count();
    $chartData = [
    'clients' => $clients,
    'houses' => $houses,
    'water Bills' => $water_meter_readings,
    'water meter readings' => $water_meter_readings,
    ];

    @endphp
    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{url('')}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Importer</li>
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
                                        <h6>{{ $imports }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total Imports</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'all']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-lg-3 col-md-6">
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $clients }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Client</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'clients']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $water_meter_readings }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Water Bills</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'water bill']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $water_meter_readings }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Water Meter Readings</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'water meter reading']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-house"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $houses }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Houses</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'houses']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card sales-card ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-water"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $rent }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Rent</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_import', ['imports' => 'rent']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div class="col-lg-12">
                <div class="card">
                    <div class="card-bod-y">
                        <h5 class="card-title">Generated Reports Graph</h5>
                        <div id="chartData" data-chart-data="{{ json_encode($chartData) }}" style="display:none;"></div>
                        <!-- const chartData = @json($chartData); -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const chartDataElement = document.getElementById('chartData');
                                const chartData = JSON.parse(chartDataElement.getAttribute('data-chart-data'));

                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Clients', 'Houses', 'Water Bills', 'water meter readings'],
                                        datasets: [{
                                            label: 'Bar Chart',
                                            data: Object.values(chartData),
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>



        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>