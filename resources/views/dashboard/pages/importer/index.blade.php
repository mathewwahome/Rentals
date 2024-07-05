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
    $t_clients = App\Models\Clients::count();
    $latestclients = App\Models\Clients::take(5)->get();
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
                                        <h6>{{ $webusers }}</h6>
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
                                        <h6>{{ $appusers }}</h6>
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
                                        <h6>{{ $t_clients }}</h6>
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
                                        <h6>{{ $t_houses }}</h6>
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
                                        <h6>{{ $t_houses }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Rent</span>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center bg-success">
                                <a class="text-light" href="{{ route('single_report', ['report' => 'water bills']) }}">More Info<i class="bi bi-arrow-right"></i></a>
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
           

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Houses Importer</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('houses-importer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" id="houses" required name="houses" placeholder="Houses" class="form-control">
                                        <div class="input-group-addon"><i class="pe-7s-home"></i></div>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm">Import</button>
                                </div>
                            </form>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Download Template</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Clients Importer</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('houses-importer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" id="houses" required name="houses" placeholder="Houses" class="form-control">
                                        <div class="input-group-addon"><i class="pe-7s-home"></i></div>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-secondary btn-sm">Import</button>
                                </div>
                            </form>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-secondary btn-sm">Download Template</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Upload this months meter readings</strong>
                        </div>
                        <div class="card-body">
                            <div class="form  mt-4">
                                <form action="{{ route('water.bills.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meter_readings">Meter Readings:</label>
                                        <input type="file" name="meter_readings" required class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-sm">Upload</button>
                                </form>
                            </div>
                            <hr>
                            <a href="{{ route('water.bills.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
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