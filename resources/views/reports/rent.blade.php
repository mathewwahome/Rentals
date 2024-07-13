<!DOCTYPE html>
<html>
<head>
    <title>Clients Report</title>
    <style>
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
    <h1>Tenants Report</h1>
    <table>
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rents as $rent)
            <tr>
                <td>{{ $rent->client_id }}</td>
                <td>{{ $rent->balance }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
