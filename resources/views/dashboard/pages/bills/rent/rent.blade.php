<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')


</head>

<body>
    @php
    $totalbill = \App\Models\RentBills::sum('total_bill');
    $unpaid_bill = \App\Models\RentBills::sum('unpaid_bill');
    $overdue_bill = \App\Models\RentBills::sum('overdue_bill');
    $payed_bill = \App\Models\RentBills::sum('payed_bill');
    $overdue_bill = \App\Models\RentBills::sum('overdue_bill');
    $bills = \App\Models\RentBills::all();
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
                                        <div class="stat-text">Ksh {{ $totalbill }}</div>
                                        <div class="stat-heading">Total Bill</div>
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
                                        <div class="stat-text">{{ $payed_bill }}</div>
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
                                        <div class="stat-text"><span class="count">{{ $unpaid_bill }}</span></div>
                                        <div class="stat-heading">Unpayed Bills</div>
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
                                        <div class="stat-text">{{ $overdue_bill }}</div>
                                        <div class="stat-heading">Overdue</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Clients Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Client Name</th>
                                        <th>Balance</th>
                                        <th>Previous </th>
                                        <th>Unpayed</th>
                                        <th>OverDue</th>
                                        <th>Payed.</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{ $bill->id }}</td>
                                        <td>{{ \App\Models\Clients::where('id', $bill->client_id)->value('client_name') }}</td>
                                        <td>{{ $bill->balance }}</td>
                                        <td>{{ $bill->previous_bill }}</td>
                                        <td>{{ $bill->unpaid_bill }}</td>
                                        <td>{{ $bill->overdue_bill }}</td>
                                        <td>{{ $bill->payed_bill }}</td>
                                        <td>{{ $bill->total_bill }}</td>
                                        <td>
                                            <div class="row ml-2">
                                                <form action="{{ route('client.view') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="client_id" value="{{ $bill->id }}">
                                                    <button class="btn btn-success" type="submit"><i class="ti ti-book"></i></button>
                                                </form>
                                                <a class="btn btn-secondary ml-2" href="{{ route('single.client', ['client' => $bill->id]) }}"><i class="fa fa-pencil"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <h3>Update a specific Tenant Bill</h3>
                                    <div class="form  mt-4">
                                        @php
                                        $clients = \App\Models\Clients::all();
                                        @endphp

                                        <form action="{{ route('month.rent.bill') }}" method="POST" enctype="multipart/form-data">
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
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </form>

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
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-12">
                            <div class="card br-0">
                                <div class="card-body">
                                    <p>generate Rent bills for this month</p>
                                    <button class="btn btn-success">Generate</button>
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