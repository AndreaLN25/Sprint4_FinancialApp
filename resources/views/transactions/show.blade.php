<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Transaction Details</title>
</head>
<body>
  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        @if($transaction)
          <h3>New Transaction Details</h3>
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
</body>
</html>
