<!-- In resources/views/reports/clients.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Clients Report</title>
    <style>
        /* Add some basic styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Clients Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->client_name }}</td>
                <td>{{ $client->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
