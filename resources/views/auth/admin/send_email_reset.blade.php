<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Admin | Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin/css/customCss/loginResetPassWord.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{asset('admin/js/jquery.validate.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin/css/customcss/company.css')}}">
    <script src="{{asset('admin/js/customjs/login.js')}}"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form action="{{route('shoes.auth.postSendResetPassword')}}" method="POST" id="resetPassword">
                @csrf
                <h2 class="text-center">Reset Password</h2>
                @if (Session('message_error'))
                <div class="alert alert-danger text-center">{{Session::get('message_error')}}</div>
                @endif
                @if (Session('message_success'))
                <div class="alert alert-success text-center">{{Session::get('message_success')}}</div>
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
                    <input class="form-control" type="email" name="email" placeholder="Email address..."
                        required value="">
                </div>

                <div class="form-group">
                    <input class="form-control button" type="submit" name="signup"
                        value="Reset Password">
                </div>
                <div class="link login-link text-center">
                    Your account already <a href="/admin/dang-nhap">Login Here</a></div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
