<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .filter {
            width: 400px;
            display: block;
            clear: both;
        }

        .content {
            text-align: center;
            width: auto;
            display: block;
        }

        table {
            width: 600px;
            border-collapse: collapse;
            margin: 50px auto;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td, th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }

        .title {
            font-size: 84px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="filter">
        <form action="{{ route('import_request.store') }}" method="post">
            @csrf
            <label for="from">
                <input type="date" id="from" name="from">
            </label>
            <label for="to">
                <input type="date" id="to" name="to">
            </label>
            <button type="submit">IMPORT</button>
        </form>
        <form action="{{ route('import_request.destroy') }}/" method="post">
            @csrf
            <button type="submit" id="flush">FLUSH</button>
        </form>
    </div>
    <br>
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>From-To Id</th>
                <th>Day</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @if($data)
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item['from_to_id'] }}</td>
                        <td>{{ $item['day'] }}</td>
                        <td>{{ $item['status'] === 1 ? 'Waiting' : 'Imported' }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
