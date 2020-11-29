<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/customcss/loginResetPassWord.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{asset('admin/js/jquery.validate.js')}}"></script>
    <script src="{{asset('admin/js/customjs/login.js')}}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="{{route('shoes.auth.postLogin')}}" method="POST" id="formLogin">
                    @csrf
                    <h2 class="text-center">Login</h2>
                    @if (Session('message_error'))
                    <div class="alert alert-danger align-content-between">
                        <li>{{Session::get('message_error')}}</li>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger align-content-between">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <input class="form-control" value="{{ Request::old('username') }}"  type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input class="form-control" value="{{ Request::old('password') }}" type="password" name="password"
                            placeholder="Password">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember_me" id="checkbox">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" value="Login">
                    </div>

                    <div class="link login-link text-center">
                        Do you forgot password? <a
                            href="/admin/reset-password">Reset Password</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
