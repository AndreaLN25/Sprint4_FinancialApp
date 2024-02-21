<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Users</title>
  <style>
    .navbar {
      background-color: #ffc107;
    }
    .navbar-brand {
    font-size: 28px;
    }

    .btn-lg {
    font-size: 20px;
    }
    .card {
      background-color: rgba(191, 191, 191, 0.439);
      margin-bottom: 20px;
    }
    .row-cols-lg-3 {
      margin-left: 1px;
      margin-right: 5px;
    }
    .card-title {
      font-size: 24px;
    }

    .card-text {
      font-size: 20px;
    }

    .delete-button {
      margin-left: auto;
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

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('users.index') }}>All Users</a>
      <div class="btn-group">
        <a class="btn btn-sm btn-success btn-lg me-2" href={{ route('users.create') }}>Add User</a>
        <a class="btn btn-sm btn-primary btn-lg" href="{{ url('/') }}">Home</a>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
      @if(count($users) > 0)
        @foreach ($users as $user)
          <div class="col-sm mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">{{ $user->first_name }} {{$user->last_name}}</h5>
              </div>
              <div class="card-body">
                <p class="card-text">{{ $user->mailadress }}</p>
              </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirmDelete('{{ $user->first_name }} {{$user->last_name}}')" class="delete-button">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
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
    <footer>
        <p>&copy; 2024 [Financial App]. All rights reserved.</p>
    </footer>
</body>
</html>
