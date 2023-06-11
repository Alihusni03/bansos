<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- bootstrap -->
    <script src="../css/login/js/color-modes.js"></script>
    <link href="../css/login/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="text-center">
    <div class="row justify-content-center mt-1 pt-5 ">
        <div class="col-md-6 ">
            <main class="form-signin p-3">
                <h1 class="h1 text-center mb-4 text-uppercase">Register</h1>
                <form action="/register" method="post">
                     @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="mb-1 form-control @error('name') is-invalid @enderror"  id="name" placeholder="Name" required value="{{ old('name')}}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="mb-1 form-control @error('email') is-invalid @enderror"  id="email" placeholder="name@example.com" required value="{{ old('email')}}">
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="mb-1 form-control @error('password') is-invalid @enderror"  id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="hidden" name="role_id" value="3">
                    </div>
                    <button class="w-100 mt-4 btn btn-lg btn-success" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-2 ">Already Registered? <a href="/login" class="text-success text-decoration-none">Login</a></small>
            </main>
        </div>
    </div>
  </body>
</html>
