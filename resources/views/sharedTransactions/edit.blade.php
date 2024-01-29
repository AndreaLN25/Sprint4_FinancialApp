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
          {{-- <div class="form-group">
            <label for="transaction_id">Transaction ID</label>
            <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="{{ $sharedTransaction->transaction_id }}" required>
          </div> --}}
          <div class="form-group">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" id="amount" name="amount" value="{{ $sharedTransaction->amount }}" required>
          </div>
          <div class="form-group">
            <label for="user_paid">Who Paid</label>
            <input type="text" class="form-control" id="user_paid" name="user_paid" value="{{ $sharedTransaction->user_paid }}" required>
          </div>
          <div class="form-group">
            <label for="number_of_participants">Number of Participants</label>
            <input type="text" class="form-control" id="number_of_participants" name="number_of_participants" value="{{ $sharedTransaction->number_of_participants }}" required>
          </div>
          <div class="form-group">
            <label for="name_of_participants">Name of Participants</label>
            <input type="text" class="form-control" id="name_of_participants" name="name_of_participants" value="{{ $sharedTransaction->name_of_participants }}" required>
          </div>
          <div class="form-group">
            <label for="amount_per_participant">Amount per Participant</label>
            <input type="text" class="form-control" id="amount_per_participant" name="amount_per_participant" value="{{ $sharedTransaction->amount_per_participant }}" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $sharedTransaction->date }}" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $sharedTransaction->description }}</textarea>
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
<script>
  // Agrega un evento 'input' a los campos amount y number_of_participants
  document.getElementById('amount').addEventListener('input', updateAmountPerParticipant);
  document.getElementById('number_of_participants').addEventListener('input', updateAmountPerParticipant);

  function updateAmountPerParticipant() {
    // Obtiene los valores actuales de amount y number_of_participants
    var amount = parseFloat(document.getElementById('amount').value) || 0;
    var numberOfParticipants = parseInt(document.getElementById('number_of_participants').value) || 1;

    // Calcula amount_per_participant
    var amountPerParticipant = numberOfParticipants > 0 ? amount / numberOfParticipants : 0;

    // Actualiza el campo amount_per_participant en tiempo real
    document.getElementById('amount_per_participant').value = amountPerParticipant.toFixed(2);
  }
</script>
</body>
</html>
