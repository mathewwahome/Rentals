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
                                    <strong class="card-title">Rent Bills</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Client Name</th>
                                                <th>Client Email</th>
                                                <th>Phone</th>
                                                <th>House No.</th>
                                                <th>Payment Method</th>
                                                <th>Status.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->client_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->house_no }}</td>
                                                <td>{{ $client->house_no }}</td>
                                                <td>status</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Rent Payment</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Payment Date</th>
                                                <th>Month Payment</th>
                                                <th>House No.</th>
                                                <th>Status.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->client_name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->house_no }}</td>
                                                <td>status</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Water Bills</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Status.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->house_no }}</td>
                                                <td>status</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Balances</strong>
                                </div>
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Amount</th>
                                                <th>Type.</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $client->id }}</td>
                                                <td>{{ $client->house_no }}</td>
                                                <td>Rent</td>
                                                <td><button>edit dropdown</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tenant Messages</h4>
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <div class="messenger-box" style="display: flex; flex-direction: column; height: 400px; overflow-y: auto;">
                                        <ul class="list-unstyled">
                                            @foreach ($messages as $message)
                                            <li class="{{ $message->tenant->id === auth()->id() ? 'msg-sent' : 'msg-received' }}">
                                                <div>
                                                    <strong>{{ $message->tenant->client_id }}</strong>
                                                    <p>{{ $message->message }}</p>
                                                    <small>{{ $message->created_at->format('H:i') }}</small>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div style="display: flex; gap: 8px; padding-top: 10px;">
                                            <form id="messageForm" method="POST" action="{{ url('/messages') }}" style="flex-grow: 1;">
                                                @csrf
                                                <input type="hidden" name="tenant_id" value="{{ $client->id }}">
                                                <input class="form-control" name="message" required type="text" placeholder="Type a message...">
                                                <button type="submit" class="btn btn-primary mt-2">
                                                    <i class="bi bi-send"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .msg-sent {
                                background-color: #e1ffc7;
                                align-self: flex-end;
                                padding: 10px;
                                border-radius: 10px;
                                margin: 5px 0;
                            }

                            .msg-received {
                                background-color: #f1f1f1;
                                align-self: flex-start;
                                padding: 10px;
                                border-radius: 10px;
                                margin: 5px 0;
                            }
                        </style>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        function sendMessage() {
                            var message = $('#messageInput').val();
                            var recipient = '+568779979998';
                            $.ajax({
                                url: '/sendSMS',
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                data: {
                                    recipient: recipient,
                                    message: message
                                },
                                success: function(response) {
                                    console.log('Message sent successfully:', response);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error sending message:', error);
                                }
                            });
                        }
                    </script>
                </div>
            </div>
            </div>
        </section>
    </main>
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>