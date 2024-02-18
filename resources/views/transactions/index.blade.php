<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Transactions</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href="{{ route('transactions.index') }}">All Transactions</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href="{{ route('transactions.create') }}">Add Transaction</a>
        </div>
        <div class="col">
          <a class="btn btn-sm btn-primary" href="{{ url('/') }}">Home</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
      @if(count($transactions) > 0)
        @foreach ($transactions as $transaction)
          <div class="col-sm mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{{ $transaction->movement_type }} Transaction</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Description: {{ $transaction->description }}</p>
                <p class="card-text">Date: {{ $transaction->date }}</p>
                <p class="card-text">Amount: {{ $transaction->amount }} €</p>
                <p class="card-text">Completed: {{ $transaction->completed }}</p>
                @if($transaction->movement_type === 'income')
                <p class="card-text">Category Income: {{ $transaction->category_income }}</p>
                <p class="card-text">Payment Method Income: {{ $transaction->payment_method_income }}</p>
              @else
                <p class="card-text">Category Expense: {{ $transaction->category_expense }}</p>
                <p class="card-text">Payment Method Expense: {{ $transaction->payment_method_expense }}</p>
              @endif
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div class="col-sm">
                    <form id="delete-form-{{ $transaction->id }}" action="{{ route('transactions.destroy', $transaction->id) }}" method="post" onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
      <div class="col">
        <p>No transactions found.Create a new transaction</a>.</p>
      </div>
    @endif
    </div>
  </div>
  <script>
    function confirmDelete() {
      return confirm('Are you sure you want to delete this transaction?');
    }
  </script>
</body>
</html>
