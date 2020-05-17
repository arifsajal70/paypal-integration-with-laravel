<!DOCTYPE html>
<html lang="en">
<head>
    <title>Paypal Payment Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="mx-auto my-auto">
        <div class="card">
            <h2>Paypal Payment Form</h2>
            <form action="{{ route('payWithPaypal') }}" method="POST">
                {{ csrf_field()  }}
                <div class="form-group">
                    <label for="email">Amount:</label>
                    <input type="number" class="form-control" placeholder="Enter Amount" name="amount">
                </div>
                <button type="submit" class="btn btn-default">Pay Now</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
