<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')

</head>

<body>
    @php
    if ($import_type == 'all'){
    $imports = App\Models\Imports::all();

    }else{
    $imports = App\Models\Imports::where('import_type',$import_type)->get();

    }
    @endphp
    @include('layout.header')
    @include('layout.aside')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ Str::title($import_type) }} Imports</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item ">Dashboard</li>
                    <li class="breadcrumb-item active">{{ Str::title($import_type) }}</li>

                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card overflow-auto">
                        <div class="card-header">
                            <strong class="card-title">{{ Str::title($import_type) }} Imports</strong>
                            <div>
                                @php
                                if ($import_type == 'all') {
                                @endphp
                                <a href="/importer_dashboard" class="btn btn-secondary">Back</a>
                                @php
                                } else {
                                @endphp
                                <a href="{{ route('_single_import', ['import' => $import_type]) }}" class="btn btn-secondary">Import +</a>
                                @php
                                }
                                @endphp


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
                                    @foreach ($imports as $import)
                                    <tr>
                                        <td>{{ $import->id }}</td>
                                        <td>{{ $import->import_id }}</td>
                                        <td>{{ $import->import_date }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <form action="{{ route('client.view') }}" method="POST" style="margin-bottom: 0;">
                                                    @csrf
                                                    <input type="hidden" name="client_id" value="{{ $import->id }}">
                                                    <button class="btn btn-success btn-sm" type="submit"><i class="bi bi-book"></i></button>
                                                </form>
                                                <a class="btn btn-secondary btn-sm" href="{{ url($import->import_path) }}"><i class="bi bi-download"></i></a>
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
        </section>
    </main>

    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>