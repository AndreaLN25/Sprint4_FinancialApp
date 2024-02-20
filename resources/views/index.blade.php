<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(251, 250, 244);
        }
        .card {
            background-color: rgba(191, 191, 191, 0.672);
            margin-top: 100px;
            height: 400px;
        }
        .card-title {
            font-size: 36px;
        }
        .card-body p {
            font-size: 30px;
            align-items: center;
            justify-content: center;
            display: flex;
        }
        footer {
            background-color: #f7f7f7;
            color: rgb(96, 10, 10);
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        h1 {
            font-size: 48px;
        }
        .additional-message {
            white-space: pre-line;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="#">HOME</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Welcome!</h1>
        <p class="additional-message">Manage your finances smartly and collaboratively.
            Start tracking your income and expenses today!</p>
        <div class="row">
            <div class="col-sm">
                <div class="card d-flex flex-column justify-content-between">
                    <div class="card-header">
                        <h5 class="card-title">Users</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage user information.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card d-flex flex-column justify-content-between">
                    <div class="card-header">
                        <h5 class="card-title">Transactions</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage individual transactions.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('transactions.index') }}" class="btn btn-primary btn-sm">View Transactions</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card d-flex flex-column justify-content-between">
                    <div class="card-header">
                        <h5 class="card-title">Shared Transactions</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Manage shared transactions.</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('shared_transactions.index') }}" class="btn btn-primary btn-sm">View Shared Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 [Financial App]. All rights reserved.</p>
    </footer>
</body>
</html>
