<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rental</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



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

    @include('layout.aside')

    <div id="right-panel" class="right-panel">
        @include('layout.header')

        <div class="content">
            <div class="animated fadeIn">
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
                                                            <input type="hidden" name="client_id"
                                                                value="{{ $bill->id }}">
                                                            <button class="btn btn-success" type="submit"><i
                                                                    class="ti ti-book"></i></button>
                                                        </form>
                                                        <a class="btn btn-secondary ml-2"
                                                            href="{{ route('single.client', ['client' => $bill->id]) }}"><i
                                                                class="fa fa-pencil"></i></a>
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

                                            <form action="{{ route('month.rent.bill') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="client_name">Client Name</label>
                                                    <select name="client_id" class="form-control" id="client_name">
                                                        @foreach ($clients as $client)
                                                            <option value="{{ $client->id }}">
                                                                {{ $client->client_name }}</option>
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
                                                    <input type="number" class="form-control" name="amount"
                                                        placeholder="Amount" id="amount" min="1">
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
        <div class="clearfix"></div>
        @include('layout.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
</body>

</html>
