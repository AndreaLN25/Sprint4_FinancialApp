<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Shared Transactions</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('shared_transactions.index') }}>Shared Transactions</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('shared_transactions.create') }}>Add Shared Transaction</a>
        </div>
        <div class="col">
          <a class="btn btn-sm btn-primary" href="{{ url('/') }}">Home</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
      @if(count($sharedTransactions) > 0)
        @foreach ($sharedTransactions as $sharedTransaction)
          <div class="col-sm mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Shared Transaction: {{ $sharedTransaction->id }}</h5>
              </div>
              <div class="card-body">
                {{-- <p class="card-text"><strong>User ID:</strong> {{ $sharedTransaction->user_id }}</p>
                <p class="card-text"><strong>Transaction ID:</strong> {{ $sharedTransaction->transaction_id }}</p> --}}
                <p class="card-text"><strong>Amount:</strong> {{ $sharedTransaction->amount }}</p>
                {{-- <p class="card-text"><strong>Who Paid:</strong> {{ $sharedTransaction->user_paid }}</p> --}}
                <p class="card-text"><strong>Who Paid: </strong></p>
                    @isset($sharedTransaction->payerUser)
                    {{ $sharedTransaction->payerUser->full_name }}
                    @else
                        No payer specified
                    @endisset
                {{-- <p class="card-text"><strong>Number of Participants:</strong>
                    {{ $sharedTransaction->number_of_participants }}</p> --}}
                {{-- <p class="card-text"><strong>Name of Participants:</strong>
                    @if($sharedTransaction->name_of_participants !== null)
                    @else
                        No participants specified
                    @endif
                </p> --}}
{{--                 <p class="card-text"><strong>Name of Participants:</strong>
                    @if($sharedTransaction->name_of_participants !== null)
                        @foreach($sharedTransaction->name_of_participants as $participantId)
                            @foreach($allUsers as $user)
                                @if($user->id == $participantId)
                                    {{ $user->full_name }},
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        No participants specified
                    @endif
                </p>
 --}}
{{--                 <p class="card-text"><strong>Name of Participants:</strong>
                    @if($sharedTransaction->name_of_participants !== null)
                        @foreach($sharedTransaction->name_of_participants as $participantId)
                            @foreach($allUsers as $user)
                                @if($user->id == $participantId)
                                    {{ $user->full_name }},
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        No participants specified
                    @endif
                </p> --}}
                <p class="card-text"><strong>Name of Participants:</strong>
                    @if(is_array($sharedTransaction->name_of_participants))
                        @foreach($sharedTransaction->name_of_participants as $participantId)
                            @foreach($allUsers as $user)
                                @if($user->id == $participantId)
                                    {{ $user->full_name }},
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        No participants specified
                    @endif
                </p>


                <p class="card-text"><strong>Amount per Participant:</strong>
                    {{ $sharedTransaction->amount_per_participant }} € </p>
                <p class="card-text"><strong>Date:</strong> {{ $sharedTransaction->date }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $sharedTransaction->description }}</p>
                <p class="card-text"><strong>Approval Status:</strong> {{ $sharedTransaction->approval_status }}</p>
                <p class="card-text"><strong>Note:</strong> {{ $sharedTransaction->note }}</p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('shared_transactions.edit', $sharedTransaction->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div class="col-sm">
                    <form id="delete-form-{{ $sharedTransaction->id }}" action="{{ route('shared_transactions.destroy', $sharedTransaction->id) }}" method="post" onsubmit="return confirmDelete()">
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
        <p>No shared transactions found. Create a new shared transaction</a>.</p>
      </div>
      @endif
    </div>
  </div>
  <script>
    function confirmDelete() {
      return confirm('Are you sure you want to delete this shared transaction?');
    }
  </script>
</body>
</html>
