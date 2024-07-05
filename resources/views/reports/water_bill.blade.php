
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
    <h1>water bill Reports</h1>
    <table>
        <thead>
            <tr>
                <th>users NO.</th>
                <th>Rooms</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($water_bills as $water_bill)
            <tr>
                <td>{{ $water_bill->users_no }}</td>
                <td>{{ $water_bill->rooms }}</td>
                <td>{{ $water_bill->status }}</td>
                <td>{{ $water_bill->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
