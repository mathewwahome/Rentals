<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body> @php
    $reports = App\Models\Imports::where('import_type',$import_type)->get();
    @endphp
    @include('layout.aside')

    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ Str::title($import_type) }} Import</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Dashboard</li>
                    <li class="breadcrumb-item active">{{ Str::title($import_type) }}</li>

                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="'row">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <div class="row">
                @if ($import_type == 'clients')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Clients Importer</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients-importer') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" id="clients" required name="clients" placeholder="Clients" class="form-control">
                                        <div class="input-group-addon"><i class="pe-7s-home"></i></div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-secondary btn-sm">Save</button>
                                    <a href="{{ route('clients.import.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                @elseif ($import_type == 'houses')
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
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                    <a href="{{ route('water.bills.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                @elseif ($import_type == 'water bills')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Water Bills</strong>
                        </div>
                        <div class="card-body">
                            <div class="form  mt-4">
                                <form action="{{ route('water.bills.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meter_readings">Meter Readings:</label>
                                        <input type="file" name="meter_readings" required class="form-control">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                        <a href="{{ route('water.bills.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                                    </div>
                                </form>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                @elseif ($import_type == 'rent')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Rent Import</strong>
                        </div>
                        <div class="card-body">
                            <div class="form  mt-4">
                                <form action="{{ route('rent.bills.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meter_readings">Meter Readings:</label>
                                        <input type="file" name="rent_bills" required class="form-control">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                        <a href="{{ route('water.bills.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif ($import_type = 'water meter reading')
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <p>Months Water meter readings</p>
                           
                            <a href="{{ route('water.bills.template') }}" class="btn btn-success">Download Template</a>
                            <hr>
                            <div class="form  mt-4">
                                <form action="{{ route('water.bills.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="meter_readings">Meter Readings:</label>
                                        <input type="file" name="meter_readings" required class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
               
                @else
                <p>This is a different type of report.</p>
                @endif

            </div>
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>