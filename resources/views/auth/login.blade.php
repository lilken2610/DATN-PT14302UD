<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Login - Sneaker </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{asset('/admin/css/metisMenu.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/admin/css/startmin.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        @if(Session::has('error'))
                            <h3 class="panel-title" style="color:red">{{Session::get('error')}}</h3>
                        @else
                            <h3 class="panel-title">Vui lòng đăng nhập</h3>
                        @endif
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('shoes.auth.postLogin')}}" method="post">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên đăng nhập" name="username" type="text" autofocus>
                                    <span class="alert-danger">{{$errors->first('username')}}</span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                    <span class="alert-danger">{{$errors->first('password')}}</span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Đăng nhập">
                                <a href="{{route('shoes.auth.redirect','facebook')}}" class="btn btn-facebook">Facebook</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<!-- jQuery -->

<script src="{{$urlPublicAdmin}}js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{$urlPublicAdmin}}js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="{{$urlPublicAdmin}}js/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="{{$urlPublicAdmin}}js/startmin.js"></script>
{{--ckeditor--}}
<script src="{{$urlPublicAdmin}}ck/ckeditor/ckeditor.js"></script>
</body>
</html>


