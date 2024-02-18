<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Users</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('users.index') }}>All Users</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('users.create') }}>Add User</a>
        </div>
        <div class="col">
          <a class="btn btn-sm btn-primary" href="{{ url('/') }}">Home</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      @if(count($users) > 0)
        @foreach ($users as $user)
          <div class="col-sm">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{{ $user->first_name }} {{$user->last_name}}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">{{ $user->mailadress }}</p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm">
                    <a href="{{ route('users.edit', $user->id) }}"
              class="btn btn-primary btn-sm">Edit</a>
                  </div>
                  <div class="col-sm">
                    <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirmDelete('{{ $user->first_name }} {{$user->last_name}}')">
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
        <p>No users found.Create a new user</a>.</p>
      </div>
    @endif
    </div>
  </div>
  <script>
    function confirmDelete(userName) {
      return confirm('Are you sure you want to delete user ' + userName + '?');
    }
  </script>
</body>
</html>
