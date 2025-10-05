<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Exchange Rates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        .info {
            background: #e7f3ff;
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1> Exchange Rates (Base: USD)</h1>

        @if (session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif

        <div class="info">
            <strong>Last Update:</strong> {{ $data['time_last_update_utc'] ?? '-' }}
        </div>

        <a href="{{ route('currency.convert') }}"
            style="text-decoration: none; background: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; display: inline-block; margin-bottom: 20px;">
             Konversi Mata Uang
        </a>

        <table>
            <thead>
                <tr>
                    <th>Kode Mata Uang</th>
                    <th>Nilai Tukar (1 USD =)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['conversion_rates'] ?? [] as $currency => $rate)
                    <tr>
                        <td><strong>{{ $currency }}</strong></td>
                        <td>{{ number_format($rate, 4) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
