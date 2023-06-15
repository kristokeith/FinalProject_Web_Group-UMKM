<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

<body>

    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER</h3>
                <hr>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Enter Your Name" required="">
                    </div>

                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter Your Email" required="">
                    </div>

                    <div class="form-group">

                        <label><i class="fa fa-key"></i> Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter Your Password" required="">
                        <i class="bi bi-eye"></i>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation"><i class="fa fa-key"></i>Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" placeholder="Confirm Your Password" required="">
                        <i class="bi bi-eye"></i>
                    </div>

                    <div class="form-group">
                        <label><i class="fa fa-address-book"></i> Role</label>
                        <select name="role" id="role">
                            <option value="customer">Customer</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i>
                        Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun silahkan <a href='{{ url('/auth') }}'>Login Disini!</a></p>
                </form>
        </div>
    </div>
</body>

</html>
