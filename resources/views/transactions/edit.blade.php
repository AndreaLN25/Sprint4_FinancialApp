<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Edit Transaction</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="#">Update Transactions</a>
            <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
        </div>
    </nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        @if($transaction)
            <form action="{{ route('transactions.update', $transaction->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="movement_type">Movement Type</label>
                <select class="form-control" id="movement_type" name="movement_type" required>
                  <option value="income" {{ $transaction->movement_type === 'income' ? 'selected' : '' }}>Income</option>
                  <option value="expense" {{ $transaction->movement_type === 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $transaction->description }}" required>
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $transaction->date }}" required>
              </div>
              <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
              </div>
              <div class="form-group">
                <label for="completed">Completed</label>
                <select class="form-control" id="completed" name="completed" required>
                  <option value="yes" {{ $transaction->completed === 'yes' ? 'selected' : '' }}>Yes</option>
                  <option value="no" {{ $transaction->completed === 'no' ? 'selected' : '' }}>No</option>
                </select>
              </div>
              @if($transaction->movement_type === 'income')
              <div class="form-group">
                <label for="category_income">Category Income</label>
                <select class="form-control" id="category_income" name="category_income">
                  <option value="salary" {{ $transaction->category_income === 'salary' ? 'selected' : '' }}>Salary</option>
                  <option value="interest" {{ $transaction->category_income === 'interest' ? 'selected' : '' }}>Interest</option>
                  <option value="investment" {{ $transaction->category_income === 'investment' ? 'selected' : '' }}>Investment</option>
                  <option value="rent" {{ $transaction->category_income === 'rent' ? 'selected' : '' }}>Rent</option>
                </select>
              </div>
              <div class="form-group">
                <label for="payment_method_income">Payment Method Income</label>
                <select class="form-control" id="payment_method_income" name="payment_method_income">
                  <option value="cash" {{ $transaction->payment_method_income === 'cash' ? 'selected' : '' }}>Cash</option>
                  <option value="transfer" {{ $transaction->payment_method_income === 'transfer' ? 'selected' : '' }}>Transfer</option>
                  <option value="check" {{ $transaction->payment_method_income === 'check' ? 'selected' : '' }}>Check</option>
                  <option value="bizum" {{ $transaction->payment_method_income === 'bizum' ? 'selected' : '' }}>Bizum</option>
                </select>
              </div>
            @endif
            @if($transaction->movement_type === 'expense')
              <div class="form-group">
                <label for="category_expense">Category Expense</label>
                <select class="form-control" id="category_expense" name="category_expense">
                  <option value="leisure" {{ $transaction->category_expense === 'leisure' ? 'selected' : '' }}>Leisure</option>
                  <option value="restaurant" {{ $transaction->category_expense === 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                  <option value="transport" {{ $transaction->category_expense === 'transport' ? 'selected' : '' }}>Transport</option>
                  <option value="health" {{ $transaction->category_expense === 'health' ? 'selected' : '' }}>Health</option>
                  <option value="clothing" {{ $transaction->category_expense === 'clothing' ? 'selected' : '' }}>Clothing</option>
                  <option value="others" {{ $transaction->category_expense === 'others' ? 'selected' : '' }}>Others</option>
                </select>
              </div>
              <div class="form-group">
                <label for="payment_method_expense">Payment Method Expense</label>
                <select class="form-control" id="payment_method_expense" name="payment_method_expense">
                  <option value="cash" {{ $transaction->payment_method_expense === 'cash' ? 'selected' : '' }}>Cash</option>
                  <option value="transfer" {{ $transaction->payment_method_expense === 'transfer' ? 'selected' : '' }}>Transfer</option>
                  <option value="check" {{ $transaction->payment_method_expense === 'check' ? 'selected' : '' }}>Check</option>
                  <option value="bizum" {{ $transaction->payment_method_expense === 'bizum' ? 'selected' : '' }}>Bizum</option>
                  <option value="card" {{ $transaction->payment_method_expense === 'card' ? 'selected' : '' }}>Card</option>
                </select>
              </div>
            @endif
            <button type="submit" class="btn mt-3 btn-primary">Update Transaction</button>
          </form>
        @else
        <p>Transaction not found</p>
        @endif
      </div>
    </div>
  </div>
</body>
</html>
