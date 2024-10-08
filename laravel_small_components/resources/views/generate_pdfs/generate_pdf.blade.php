<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: 'Arial', sans-serif;
        }
        .invoice-box {
            border: 1px solid #eee;
            padding: 20px;
            font-size: 16px;
        }
        .heading {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h1 class="heading">Invoice</h1>
        <p><strong>Date:</strong> {{ now()->format('Y-m-d') }}</p>
        <p><strong>Customer:</strong> {{ $customerName }}</p>
        <p><strong>Total:</strong> ${{ $totalAmount }}</p>
    </div>
</body>
</html>
