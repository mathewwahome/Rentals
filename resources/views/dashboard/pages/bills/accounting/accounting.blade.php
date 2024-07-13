<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Helvetica Neue", sans-serif;
            box-sizing: border-box;
        }


        .calc-text-container {
            background: #000000;
            padding: 25px;
            /* width: 350px; */
            border-radius: 10px;
        }

        .calc-text {
            margin-bottom: 20px;
            padding-left: 5px;
        }

        .calc-text p {
            width: 100%;
            font-size: 3.5rem;
            text-align: end;
            background: transparent;
            color: #fff;
            border: none;
            outline: none;
            word-wrap: break-word;
            word-break: break-all;
        }

        button {
            background: #333333;
            color: #fff;
            font-size: 1.5rem;
            border: none;
            border-radius: 70%;
            cursor: pointer;
            height: 65px;
            width: 65px;
        }

        button:active,
        button:focus {
            filter: brightness(120%);
        }

        .calc-keys {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-row-gap: 15px;
            grid-column-gap: 10px;
        }

        .key-zero {
            grid-column: span 2;
            width: 100%;
            border-radius: 30px;
        }

        .key-operate {
            background: #ff9501;
        }

        .key-others {
            background: #a6a6a6;
            color: #000000;
        }
    </style>

</head>

<body>
    @php
    $previousbills = 2;
    $currentbills = \App\Models\WaterBills::where('id', '1')->get();
    $toatalbills =2;
    $overduebills = 2;
    // meater readings report
    $total_m_readings = 2; //total units


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

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>sh {{ $totalbill }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Total Rent</span>

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
                                    <h6>sh {{ $payed_bill }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Payed Rent</span>

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
                                    <h6>sh {{ $unpaid_bill }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Unpayed Rent</span>

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
                                    <h6>sh {{ $overdue_bill }}</h6>
                                    <span class="text-muted small pt-2 ps-1">Overdue Rent</span>

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
                                <strong class="card-title">Tenant Rents</strong>
                                <div>
                                    <a href="{{ route('single_report', ['report' => 'rent']) }}" class="btn btn-secondary">Generate Report +</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-stats order-table ov-h">
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th class="serial">ID</th>
                                                <th>Client No.</th>
                                                <th>Balance</th>
                                                <th>Unpaid Bill</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $rentbills = App\Models\RentBills::all();
                                            @endphp
                                            @foreach ($rentbills as $rentbill)
                                            <tr class=" pb-0">
                                                <td class="serial">{{ $rentbill->id }}</td>
                                                <td> {{ $rentbill->client_id }} </td>
                                                <td> <span class="name">{{ $rentbill->balance }}</span> </td>
                                                <td><span class="count">{{ $rentbill->unpaid_bill }}</span>
                                                </td>
                                                <td>
                                                    <div style="display: flex; align-items: center; gap: 8px;">

                                                        <a class="btn btn-secondary ml-2" href="{{ route('single.client', ['client' => $rentbill->id]) }}"><i class="bi bi-book"></i></a>
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
                    <div class="col-xl-4">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0">
                                    <div class="card-body">

                                        <div class="calc-text-container">
                                            <div class="calc-text">
                                                <p name="user-input" id="user-input">0</p>
                                            </div>
                                            <div class="calc-keys">
                                                <button type="button" class="key-others operations">AC</button>
                                                <button type="button" class="key-others operations">DEL</button>
                                                <button type="button" class="key-others operations">%</button>
                                                <button type="button" class="key-operate operations">/</button>
                                                <button type="button" class="numbers">7</button>
                                                <button type="button" class="numbers">8</button>
                                                <button type="button" class="numbers">9</button>
                                                <button type="button" class="key-operate operations">*</button>
                                                <button type="button" class="numbers">4</button>
                                                <button type="button" class="numbers">5</button>
                                                <button type="button" class="numbers">6</button>
                                                <button type="button" class="key-operate operations">-</button>
                                                <button type="button" class="numbers">1</button>
                                                <button type="button" class="numbers">2</button>
                                                <button type="button" class="numbers">3</button>
                                                <button type="button" class="key-operate operations">+</button>
                                                <button type="button" class="key-zero numbers">0</button>
                                                <button type="button" class="numbers">.</button>
                                                <button type="button" class="key-operate operations">=</button>
                                            </div>
                                        </div>
                                        <script>
                                            const inputValue = document.getElementById("user-input");
                                            document.querySelectorAll(".numbers").forEach(function(item) {
                                                item.addEventListener("click", function(e) {
                                                    if (inputValue.innerText === "NaN") {
                                                        inputValue.innerText = "";
                                                    }
                                                    if (inputValue.innerText === "0") {
                                                        inputValue.innerText = "";
                                                    }
                                                    inputValue.innerText += e.target.innerHTML.trim();
                                                });
                                            });

                                            document.querySelectorAll(".operations").forEach(function(item) {
                                                item.addEventListener("click", function(e) {
                                                    const value = e.target.innerHTML.trim();
                                                    if (value === "AC") {
                                                        inputValue.innerText = "0";
                                                    } else if (value === "DEL") {
                                                        inputValue.innerText = inputValue.innerText.slice(0, -1) || "0";
                                                    } else if (value === "=") {
                                                        try {
                                                            inputValue.innerText = eval(inputValue.innerText);
                                                        } catch {
                                                            inputValue.innerText = "NaN";
                                                        }
                                                    } else if (value === "%") {
                                                        inputValue.innerText = (parseFloat(inputValue.innerText) / 100).toString();
                                                    } else {
                                                        if (!isNaN(inputValue.innerText.slice(-1))) {
                                                            inputValue.innerText += value;
                                                        }
                                                    }
                                                });
                                            });
                                        </script>



                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-12">
                                <div class="card br-0">
                                    <div class="card-header">
                                        <h4>Rent Payment</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="form mt-4">
                                            @php
                                            $clients = \App\Models\Tenant::all();
                                            @endphp
                                            <form action="{{ route('rent.single.payment') }}" method="POST" enctype="multipart/form-data">
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
                                                <div class="form-group mt-4">
                                                    <input type="submit" class="btn btn-success" value="Update" />
                                            </form>

                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                // Trigger change event on client select element
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