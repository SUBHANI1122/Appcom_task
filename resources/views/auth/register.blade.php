<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Dashboard - Register</title>

    <!-- CSS -->
    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/css/sb-admin.css') }}" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">
                <h2>Create Account</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="text" id="name" name="fullname" class="form-control" placeholder="Full Name"
                                        required="required" autofocus="autofocus">
                                    <label for="name">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number"
                                        min="0" autofocus="autofocus">
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email address"
                                required="required">
                            <label for="email">Email address</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state_id">Select State</label>
                        <select class="form-control" id="state_id" name="state_id">
                            @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city_id">Select City</label>
                        <select class="form-control" id="city_id" name="city_id">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password" required="required">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="password" id="confirmPassword" name="password_confirmation" class="form-control"
                                        placeholder="Confirm password" required="required">
                                    <label for="confirmPassword">Confirm password</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="file" id="profile_image" name="profile_image" class="form-control" placeholder="Profile Image"
                                required="required">
                            <label for="profile_image">Profile Image</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('login')}}">Already Have Account? Log In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

</body>

</html>
