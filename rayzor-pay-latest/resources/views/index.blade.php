<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button id="pay-btn">Pay Now</button>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        document.getElementById('pay-btn').onclick = async function() {

            let res = await fetch('/create-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    amount: 500
                }) // ₹500
            });

            let data = await res.json();

            var options = {
                "key": data.key,
                "amount": data.amount,
                "currency": "INR",
                "order_id": data.order_id,

                "handler": function(response) {
                    fetch('/verify-payment', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(response)
                        }).then(res => res.json())
                        .then(data => {
                            alert("Payment " + data.status);
                        });
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }
    </script>
</body>

</html>
