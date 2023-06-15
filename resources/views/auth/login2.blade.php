<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login/Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <br>
    <br>
    <br>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>LOGIN </b><br> UMKM INDONESIA</h3>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Sorry!</b> {{ session('error') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter Your Email" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="">
                        <i class="bi bi-eye"></i>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href='{{ url('/owner/register') }}'>Register</a>
                        sekarang!</p>
                </form>
        </div>
    </div>
</body>

</html>
