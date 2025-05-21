<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment Gateway Integration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Pay ₹100</h2>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @elseif (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('payment') }}" method="POST">
        @csrf
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('razorpay.key') }}"
            data-amount="10000"
            data-currency="INR"
            data-buttontext="Pay with Razorpay"
            data-name="Test Company"
            data-description="Test Payment"
            data-prefill.name="John Doe"
            data-prefill.email="john@example.com"
            data-theme.color="#F37254">
        </script>
    </form>
</body>
</html>
