@extends('templates.shoes.master')
@section('title') Đăng ký @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 150px">
        <div style="width: 80%;margin: 0 auto">
            <form action="{{route('shoes.auth.postSignUp')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" name="fullname" aria-describedby="emailHelp" placeholder="Họ tên">
                    <span class="alert-danger">{{$errors->first('fullname')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                    <span class="alert-danger">{{$errors->first('username')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Mật khẩu">
                    <span class="alert-danger">{{$errors->first('pwd')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại Mật khẩu</label>
                    <input type="password" class="form-control" name="pwdreturn" placeholder="Nhập lại mật khẩu">
                    <span class="alert-danger">{{$errors->first('pwdreturn')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
                    <span class="alert-danger">{{$errors->first('email')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="number" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Số điện thoại">
                    <span class="alert-danger">{{$errors->first('phone')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Địa chỉ">
                    <span class="alert-danger">{{$errors->first('address')}}</span>
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Đăng ký" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

