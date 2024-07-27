<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layout.head')
</head>

<body>
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
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Tenanat Edit</strong>
                                </div>
                                <div class="card-body">
                                    <style>
                                        .form-group {
                                            margin-top: 10px;
                                        }
                                    </style>
                                    <form action="{{ url('tenant_edit/'.$client->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="client_name">Tenant Name</label>
                                            <input type="text" class="form-control" name="client_name" value="{{ $client->client_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Tenant Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $client->phone }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tenant Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ $client->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="house_no">Tenant House Number</label>
                                            <select class="form-control" name="house_no" id="house_no">
                                                <option value="{{ $client->house_no }}">{{ $client->house_no }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-info">Update</button>
                                        </div>
                                    </form>

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