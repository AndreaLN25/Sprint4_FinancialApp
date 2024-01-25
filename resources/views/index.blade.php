<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="#">Financial Main Page</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Users</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage user information.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Transactions</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage individual transactions.</p>
                        <a href="{{ route('transactions.index') }}" class="btn btn-primary btn-sm">View Transactions</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Shared Transactions</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage shared transactions.</p>
                        <a href="{{ route('shared_transactions.index') }}" class="btn btn-primary btn-sm">View Shared Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


