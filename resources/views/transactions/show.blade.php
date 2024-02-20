<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Transaction Details</title>
  <style>
    footer {
        background-color: #f7f7f7;
        color: rgb(96, 10, 10);
        text-align: center;
        padding: 20px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
          <a class="navbar-brand h1" href={{ route('users.index') }}>New Transaction Details</a>
          <a href="{{ route('transactions.index') }}" class="btn btn-primary">Go back to All Transactions</a>
        </div>
    </nav>
  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        @if($transaction)
          <p><strong>Movement Type:</strong> {{ $transaction->movement_type }}</p>
          <p><strong>Description:</strong> {{ $transaction->description }}</p>
          <p><strong>User:</strong> {{ $transaction->user ? $transaction->user->name : 'Unknown User' }}</p>
          <p><strong>Date:</strong> {{ $transaction->date }}</p>
          <p><strong>Amount:</strong> ${{ $transaction->amount }}</p>
          <p><strong>Completed:</strong> {{ $transaction->completed }}</p>
          @if($transaction->movement_type === 'income')
          <p><strong>Category Income:</strong> {{ $transaction->category_income }}</p>
          <p><strong>Payment Method Income:</strong> {{ $transaction->payment_method_income }}</p>
      @else
          <p><strong>Category Expense:</strong> {{ $transaction->category_expense }}</p>
          <p><strong>Payment Method Expense:</strong> {{ $transaction->payment_method_expense }}</p>
      @endif
          <a href="{{ route('transactions.index') }}" class="btn btn-primary">Continue to all transactions</a>
        @else
          <p>Transaction not found</p>
        @endif
      </div>
    </div>
  </div>
  <footer>
    <p>&copy; 2024 [Financial App]. All rights reserved.</p>
</footer>
</body>
</html>
