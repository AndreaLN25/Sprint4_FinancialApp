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
            <a class="navbar-brand h1" href="#">Update User</a>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
        </div>
    </nav>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        @if($user)
            <form action="{{ route('users.update', $user->id) }}" method="post">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="first_name">User's First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                  value="{{ $user->first_name }}" required>
              </div>
              <div class="form-group">
                <label for="last_name">User's Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                  value="{{ $user->last_name }}" required>
              </div>
              <div class="form-group">
                <label for="mailadress">Email Address</label>
                <input type="email" class="form-control" id="mailadress" name="mailadress" value="{{ $user->mailadress }}" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
              </div>
              <button type="submit" class="btn mt-3 btn-primary">Update User</button>
            </form>
        @else
        <p>User not found</p>
        @endif
      </div>
    </div>
  </div>
</body>
</html>
