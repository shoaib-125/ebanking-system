<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 5px;
            text-align: left;
            max-width: {{100/count($columns)}}%;
        }
    </style>
</head>
<body>
<div class="container">

    <table>
        <thead>
            @foreach($columns as $c)
            <th>{{ $c }}</th>
            @endforeach
        </thead>
    </table>
    <table>
        <tbody>
        @foreach($data as $index => $row)
            <tr>
                <td>{{ $row[0] }}</td>
                <td>{{ $row[1] }}</td>
                <td>{{ $row[2] }}</td>
                <td>{{ $row[3] }}</td>
                <td>{{ $row[4] }}</td>
                <td>{{ $row[5] }}</td>
                <td>{{ $row[6] }}</td>
                <td>{{ $row[7] }}</td>
                <td>{{ $row[8] }}</td>
                <td>{{ $row[9] }}</td>
                <td>{{ $row[10] }}</td>
                <td>{{ $row[11] }}</td>
                <td>{{ $row[12] }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>