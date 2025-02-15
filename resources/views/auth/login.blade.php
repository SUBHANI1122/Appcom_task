<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard - Log In</title>

    <!-- CSS -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">
                <h2>Log In</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf 
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="email"  class="form-control" placeholder="Email address"
                                required="required" autofocus="autofocus">
                            <label for="inputEmail">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
                                required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('register')}}">Register an Account</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript-->
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
