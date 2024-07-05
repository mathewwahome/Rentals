
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
    <h1>userss Report</h1>
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
            @foreach($users as $user)
            <tr>
                <td>{{ $user->users_no }}</td>
                <td>{{ $user->rooms }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
