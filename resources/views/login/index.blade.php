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
        <div class="col-md-4">

          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if(session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

            <main class="form-signin p-3">
                <h1 class="h1 text-center mb-4 text-uppercase">Login</h1>
                <form action="/login" method="post">
                  @csrf
                    <div class="form-floating">
                    <input type="email" name="email" class="border border-succes mb-1 form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email')}}">
                    <label for="email" autofocus required>Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="password" name="password" class=" form-control" id="password" placeholder="Password">
                    <label for="password" required>Password</label>
                    </div>
                    <div class="col-md-12 d-flex">
                      <button class="w-100 mt-4 btn btn-lg btn-success me-2" type="submit">Login</button>
                      <a onclick="window.location.href='/'" class="w-100 mt-4 btn btn-lg btn-success ms-2">Kembali</a>
                    </div>
                    </form>
                <small class="d-block text-center mt-2 ">Not Registered? <a href="/register" class="text-success text-decoration-none">Register Now!</a></small>
            </main>
        </div>
    </div>
  </body>
</html>
