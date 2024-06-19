<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>User Report</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->project_title }}</td>
                <td>{{ $project->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>