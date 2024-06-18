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
    <h1>Houses Report</h1>
    <table>
        <thead>
            <tr>
                <th>House NO.</th>
                <th>Rooms</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($houses as $house)
            <tr>
                <td>{{ $house->house_no }}</td>
                <td>{{ $house->rooms }}</td>
                <td>{{ $house->status }}</td>
                <td>{{ $house->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
