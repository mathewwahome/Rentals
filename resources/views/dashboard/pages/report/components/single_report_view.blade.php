<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body> @php
    $reports = App\Models\Reports::where('report_type',$report_type)->get();
    @endphp
    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ Str::title($report_type) }} Reports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Dashboard</li>
                    <li class="breadcrumb-item active">{{ Str::title($report_type) }}</li>

                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">

                <div class="content">
                    <div class="animated fadeIn">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">{{ Str::title($report_type) }} Reports</strong>
                                        <div>
                                            <a href="{{ route('_single_report_generate', ['report' => $report_type]) }}" class="btn btn-secondary">Report +</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered datatable">

                                            <thead>
                                                <tr>
                                                    <th>NO.</th>
                                                    <th>Report ID</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reports as $report)
                                                <tr>
                                                    <td>{{ $report->id }}</td>
                                                    <td>{{ $report->report_id }}</td>
                                                    <td>{{ $report->report_date }}</td>
                                                    <td>
                                                        <div class="row ml-2">
                                                            <form action="{{ route('client.view') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="client_id" value="{{ $report->id }}">
                                                                <button class="btn btn-success" type="submit"><i class="ti ti-book"></i></button>
                                                            </form>
                                                            <a class="btn btn-secondary ml-2" href="{{ url($report->report_path) }}"><i class="fa fa-download"></i></a>
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
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>