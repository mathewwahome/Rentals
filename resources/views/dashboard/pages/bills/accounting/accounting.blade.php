<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')


</head>

<body>
    @php
    $previousbills = 2;
    $currentbills = \App\Models\WaterBills::where('id', '1')->get();
    $toatalbills =2;
    $overduebills = 2;
    // meater readings report
    $total_m_readings = 2; //total units

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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">sh {{ $toatalbills }}</div>
                                        <div class="stat-heading">Total Bills</div>
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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">3435</span></div>
                                        <div class="stat-heading">Payed</div>
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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">349</span></div>
                                        <div class="stat-heading">Pending</div>
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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">2986</span></div>
                                        <div class="stat-heading">Overdue</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">{{ $total_m_readings }}</div>
                                        <div class="stat-heading">Total Units</div>
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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">3435</span></div>
                                        <div class="stat-heading">Payed Units</div>
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
                                    <i class="pe-7s-cash"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">349</span></div>
                                        <div class="stat-heading">Unpayed Units</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="orders">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <style>
                                .card-header {
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                }
                            </style>
                            <div class="card-header">
                                <strong class="card-title">Monthly Water Units Report</strong>
                                <div>
                                    <a href="{{ route('single_report', ['report' =>  'water bills']) }}" class="btn btn-secondary">Report +</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-stats order-table ov-h">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th class="serial">ID</th>
                                                <th>Date</th>
                                                <th>Month</th>
                                                <th>NO. Clients</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $waterbills = App\Models\WaterBills::all();
                                            @endphp
                                            @foreach ($waterbills as $waterbill)
                                            <tr class=" pb-0">
                                                <td class="serial">{{ $waterbill->id }}</td>
                                                <td> {{ $waterbill->date }} </td>
                                                <td> <span class="name">{{ $waterbill->month }}</span> </td>
                                                <td><span class="count">{{ $waterbill->no_clients }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-complete">{{ $waterbill->status }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-complete">{{ $waterbill->action }}</span>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0">
                                    <div class="card-body">
                                        <p>Upload this months meter readings</p>
                                        <p>one should only be allowed to upload the meter readings for a particular
                                            month then close the upload ability ---for every month provide an excel
                                            template for the available clients---</p>
                                        <a href="{{ route('water.bills.template') }}" class="btn btn-success">Download Template</a>
                                        <hr>
                                        <div class="form  mt-4">
                                            <form action="{{ route('water.bills.import') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="meter_readings">Meter Readings:</label>
                                                    <input type="file" name="meter_readings" required class="form-control">
                                                    <p>This sholud be the filled excel</p>
                                                </div>
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0">
                                    <div class="card-body">
                                        <p>After the generation of bills one can nowv send Sms To all the clients to
                                            notify them about the bills</p>
                                        <button class="btn btn-success">Send Bills</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0">
                                    <div class="card-body">
                                        <h4>Update specific Water Tenant Bill</h4>
                                        <div class="form  mt-4">
                                            @php
                                            $clients = \App\Models\Clients::all();
                                            @endphp

                                            <form action="{{ route('water.single.payment') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="client_name">Client Name</label>
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
                                                    <label for="amount">Amount Paid</label>
                                                    <input type="number" class="form-control" name="amount" placeholder="Amount" id="amount" min="1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Payment Date</label>
                                                    <input type="date" class="form-control" name="payment_date" id="payment_date">
                                                </div>
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    // Trigger change event on client select element
                                                    document.getElementById('client_name').dispatchEvent(new Event('change'));
                                                });

                                                // Rest of your JavaScript code here
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



                                            {{--
                                                <script>
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
                                                </script> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
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