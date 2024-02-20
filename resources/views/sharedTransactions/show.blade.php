<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Shared Transaction Details</title>
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
          <a class="navbar-brand h1" href={{ route('shared_transactions.index') }}>New Shared Transaction Details</a>
          <a href="{{ route('shared_transactions.index') }}" class="btn btn-primary">Go back to All Shared Transactions</a>
        </div>
    </nav>
  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        @if($sharedTransaction)
          <h3>New Shared Transaction Details</h3>
          {{-- <p><strong>User ID:</strong> {{ $sharedTransaction->user_id }}</p>
          <p><strong>Transaction ID:</strong> {{ $sharedTransaction->transaction_id }}</p> --}}
          <p><strong>Amount:</strong> {{ $sharedTransaction->amount }}</p>
          <p><strong>Participants:</strong>
                @foreach($participantNames as $participant)
                {{ $participant }},
                @endforeach
          </p>
          <p><strong>Approval Status:</strong> {{ $sharedTransaction->approval_status }}</p>
          <p><strong>Note:</strong> {{ $sharedTransaction->note }}</p>
          <a href="{{ route('shared_transactions.index') }}" class="btn btn-primary">Continue to all shared transactions</a>
        @else
          <p>Shared Transaction not found</p>
        @endif
      </div>
    </div>
  </div>
<footer>
    <p>&copy; 2024 [Financial App]. All rights reserved.</p>
</footer>
</body>
</html>
