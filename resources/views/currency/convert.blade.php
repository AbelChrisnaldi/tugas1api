<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Mata Uang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .container {
            font-size: 30px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .form-group {
            margin: 15px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        button {
            background: #4CAF50;
            color: white;
            padding: 20px 30px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        button:hover {
            background: #45a049;
        }

        .result {
            background: #e7f3ff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1> Konversi Mata Uang</h1>

        <a href="{{ route('currency.index') }}" style="font-size: 30px">Kembali ke Daftar Exchange Rates</a>

        <form method="GET" action="{{ route('currency.convert') }}" style="margin-top: 20px;">
            <div class="form-group">
                <label>Dari Mata Uang:</label>
                <select name="from">
                    <option value="USD" {{ request('from') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                    <option value="IDR" {{ request('from') == 'IDR' ? 'selected' : '' }}>IDR - Indonesian Rupiah
                    </option>
                    <option value="EUR" {{ request('from') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                    <option value="GBP" {{ request('from') == 'GBP' ? 'selected' : '' }}>GBP - British Pound
                    </option>
                    <option value="JPY" {{ request('from') == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen
                    </option>
                    <option value="SGD" {{ request('from') == 'SGD' ? 'selected' : '' }}>SGD - Singapore Dollar
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Ke Mata Uang:</label>
                <select name="to">
                    <option value="IDR" {{ request('to') == 'IDR' ? 'selected' : '' }}>IDR - Indonesian Rupiah
                    </option>
                    <option value="USD" {{ request('to') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                    <option value="EUR" {{ request('to') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                    <option value="GBP" {{ request('to') == 'GBP' ? 'selected' : '' }}>GBP - British Pound
                    </option>
                    <option value="JPY" {{ request('to') == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen</option>
                    <option value="SGD" {{ request('to') == 'SGD' ? 'selected' : '' }}>SGD - Singapore Dollar
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah:</label>
                <input type="number" name="amount" value="{{ request('amount', 1) }}" step="0.01" min="0">
            </div>

            <button type="submit">Konversi</button>
        </form>

        @if (isset($result))
            <div class="result">
                <h2>Hasil Konversi:</h2>
                <p style="font-size: 30px;">
                    <strong>{{ number_format($amount, 2) }} {{ $from }}</strong> =
                    <strong style="color: #4CAF50;">{{ number_format($result, 2) }} {{ $to }}</strong>
                </p>
                <p style="color: #666; font-size: 14px;">
                    Rate: 1 {{ $from }} = {{ number_format($rate, 4) }} {{ $to }}
                </p>
            </div>
        @endif
    </div>
</body>

</html>
