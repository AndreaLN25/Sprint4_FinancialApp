<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Create Transaction</title>
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
            <a class="navbar-brand h1" href="#">New Transactions</a>
            <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
        </div>
    </nav>
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <form action="{{ route('transactions.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="movement_type">Movement Type</label>
          <select class="form-control" id="movement_type" name="movement_type" required>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="" selected disabled>Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->getFullNameAttribute() }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="date">Date</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
          <label for="completed">Completed</label>
          <select class="form-control" id="completed" name="completed" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
        </div>
        <div class="form-group" id="incomeFields">
          <label for="category_income">Category Income</label>
          <select class="form-control" id="category_income" name="category_income">
            <option value="salary">Salary</option>
            <option value="interest">Interest</option>
            <option value="investment">Investment</option>
            <option value="rent">Rent</option>
          </select>
          <label for="payment_method_income">Payment Method Income</label>
          <select class="form-control" id="payment_method_income" name="payment_method_income">
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
            <option value="check">Check</option>
            <option value="bizum">Bizum</option>
          </select>
        </div>
        <div class="form-group" id="expenseFields">
          <label for="category_expense">Category Expense</label>
          <select class="form-control" id="category_expense" name="category_expense">
            <option value="leisure">Leisure</option>
            <option value="restaurant">Restaurant</option>
            <option value="transport">Transport</option>
            <option value="health">Health</option>
            <option value="clothing">Clothing</option>
            <option value="others">Others</option>
          </select>
          <label for="payment_method_expense">Payment Method Expense</label>
          <select class="form-control" id="payment_method_expense" name="payment_method_expense">
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
            <option value="check">Check</option>
            <option value="bizum">Bizum</option>
            <option value="card">Card</option>
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Transaction</button>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Obtén el elemento select de movement_type
    var movementTypeSelect = document.getElementById('movement_type');

    // Obtén los contenedores de campos de ingresos y gastos
    var incomeFields = document.getElementById('incomeFields');
    var expenseFields = document.getElementById('expenseFields');

    // Función para actualizar la visibilidad de los campos
    function updateFieldsVisibility() {
      // Obtén el valor seleccionado en movement_type
      var selectedValue = movementTypeSelect.value;

      // Habilita o deshabilita los campos según la elección
      if (selectedValue === 'income') {
        incomeFields.style.display = 'block';
        expenseFields.style.display = 'none';
      } else if (selectedValue === 'expense') {
        incomeFields.style.display = 'none';
        expenseFields.style.display = 'block';
      }
    }

    // Llama a la función al cargar la página y cada vez que cambie el valor de movement_type
    updateFieldsVisibility();
    movementTypeSelect.addEventListener('change', updateFieldsVisibility);
  });
</script>
<footer>
    <p>&copy; 2024 [Financial App]. All rights reserved.</p>
</footer>
</body>
</html>
