<!doctype html>

<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    $reports=App\Models\Reports::all()->count();
    $clients =App\Models\Reports::where('report_type','client')->count();
    $houses =App\Models\Reports::where('report_type','houses')->count();
    $users =App\Models\Reports::where('report_type','users')->count();
    $water_bills =App\Models\Reports::where('report_type','water bills')->count();
    $rent =App\Models\Reports::where('report_type','rent')->count();

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
                                        <h6>{{ $reports }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Total Report</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'client']) }}">More Info<i class="bi bi-arrow-right"></i></a>
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
                                        <span class="text-muted small pt-2 ps-1">Client Report</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'client']) }}">More Info<i class="bi bi-arrow-right"></i></a>
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
                                        <span class="text-muted small pt-2 ps-1">Houses Report</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'houses']) }}">More Info<i class="bi bi-arrow-right"></i></a>
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
                                        <h6>{{ $users }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Users Report</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'users']) }}">More Info<i class="bi bi-arrow-right"></i></a>
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
                                        <h6>{{ $water_bills }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Water Bills</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'water bills']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-card customers-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $rent }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Rent</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'rent']) }}">More Info<i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Generated Reports Graph</h5>

                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ['Clients', 'Houses', 'Usrs', 'Water Bills', 'Rent', 'June', 'July', 'February', 'March', 'April', 'May', 'June', 'July'],
                                        datasets: [{
                                            label: 'Bar Chart',
                                            data: [65, 59, 80, 81, 56, 55, 40, 59, 80, 81, 56, 55, 40],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Clients Chart</h5>

                            <canvas id="ClientpieChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#ClientpieChart'), {
                                        type: 'pie',
                                        data: {
                                            labels: [
                                                'Active',
                                                'Inactive',
                                                'Blocked'
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: [300, 50, 100],
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Houses Chart</h5>

                            <canvas id="HousespieChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#HousespieChart'), {
                                        type: 'pie',
                                        data: {
                                            labels: [
                                                'Red',
                                                'Blue',
                                                'Yellow'
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: [300, 50, 100],
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Users Chart</h5>

                            <canvas id="UserspieChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#UserspieChart'), {
                                        type: 'pie',
                                        data: {
                                            labels: [
                                                'Red',
                                                'Blue',
                                                'Yellow'
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: [300, 50, 100],
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Water Bills Chart</h5>

                            <canvas id="WaterBillpieChart" style="max-height: 400px;"></canvas>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#WaterBillpieChart'), {
                                        type: 'pie',
                                        data: {
                                            labels: [
                                                'Red',
                                                'Blue',
                                                'Yellow'
                                            ],
                                            datasets: [{
                                                label: 'My First Dataset',
                                                data: [300, 50, 100],
                                                backgroundColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 205, 86)'
                                                ],
                                                hoverOffset: 4
                                            }]
                                        }
                                    });
                                });
                            </script>

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