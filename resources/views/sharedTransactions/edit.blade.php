<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Edit Shared Transaction</title>
</head>
<body>
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      @if($sharedTransaction)
        <h3>Edit Shared Transaction</h3>
        <form action="{{ route('shared_transactions.update', $sharedTransaction->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="user_id">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $sharedTransaction->user_id }}" required>
          </div>
          <div class="form-group">
            <label for="transaction_id">Transaction ID</label>
            <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="{{ $sharedTransaction->transaction_id }}" required>
          </div>
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ $sharedTransaction->amount }}" required>
          </div>
          <div class="form-group">
            <label for="participants">Participants</label>
            <input type="text" class="form-control" id="participants" name="participants" value="{{ $sharedTransaction->participants }}" required>
          </div>
          <div class="form-group">
            <label for="approval_status">Approval Status</label>
            <select class="form-control" id="approval_status" name="approval_status" required>
              <option value="pending" {{ $sharedTransaction->approval_status === 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="approved" {{ $sharedTransaction->approval_status === 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="rejected" {{ $sharedTransaction->approval_status === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
          </div>
          <div class="form-group">
            <label for="note">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3" required>{{ $sharedTransaction->note }}</textarea>
          </div>
          <button type="submit" class="btn mt-3 btn-primary">Update Shared Transaction</button>
        </form>
      @else
        <p>Shared Transaction not found</p>
      @endif
    </div>
  </div>
</div>
</body>
</html>
