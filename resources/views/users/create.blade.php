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
            <a class="navbar-brand h1" href="#">New User</a>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
        </div>
    </nav>
<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="first_name">First Name</label>
          <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
          <label for="last_name">Last Name</label>
          <textarea class="form-control" id="last_name" name="last_name" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="mailadress">Email address</label>
          <input type="email" class="form-control" id="mailadress" name="mailadress" required>
          @error('mailadress')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        {{-- <div class="form-group">
          <label for="password">Password</label>
          <textarea class="form-control" id="password" name="password" rows="3" required></textarea>
        </div> --}}
        <br>
        <button type="submit" class="btn btn-primary">Create User</button>
      </form>
    </div>
  </div>
</div>
<footer>
    <p>&copy; 2024 [Financial App]. All rights reserved.</p>
</footer>
</body>
</html>
