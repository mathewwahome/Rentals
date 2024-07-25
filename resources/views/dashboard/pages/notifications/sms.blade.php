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
            <div class="col-lg-6 col-xl-12">
                <div class="card br-0">
                    <div class="card-body">
                        <h4>Send Message to specific Tenant</h4>
                        <div class="form  mt-4">
                            @php
                            $clients = \App\Models\Tenant::all();
                            @endphp
                            <form action="{{ route('not.sms.single') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="client_name">Tenant Name</label>
                                    <select name="client_id" class="form-control" id="client_name">
                                        @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">
                                            {{ $client->client_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="house_no">House Number</label>
                                    <select name="house_no" class="form-control" id="house_no">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Message</label>
                                <textarea name="message" class="form-control" id="message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.getElementById('client_name').dispatchEvent(new Event('change'));
                                });

                                document.getElementById('client_name').addEventListener('change', function() {
                                    var clientId = this.value;
                                    fetch('/get-houses/' + clientId)
                                        .then(response => response.json())
                                        .then(data => {
                                            var houseSelect = document.getElementById('house_no');
                                            houseSelect.innerHTML = '';
                                            data.forEach(function(house) {
                                                var option = document.createElement('option');
                                                option.text = house.house_no;
                                                option.value = house.house_no;
                                                houseSelect.appendChild(option);
                                            });
                                        });
                                });

                                document.getElementById('house_no').addEventListener('change', function() {
                                    var houseNo = this.value;
                                    axios.get('/get-client/' + houseNo)
                                        .then(response => {
                                            document.getElementById('client_name').value = response.data.client_name;
                                        })
                                        .catch(error => {
                                            console.error('Error fetching client name:', error);
                                        });
                                });
                            </script>
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
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <a class="btn btn-secondary ml-2" href="{{ route('single.house', ['house' => $house->id]) }}"><i class="bi bi-book"></i></a>
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