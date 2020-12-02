@extends('templates.shoes.master')
@section('title') Đăng ký @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 150px">
        <div style="width: 80%;margin: 0 auto">
            <form action="{{route('shoes.auth.postSignUp')}}" method="post" id="formSignup">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" class="form-control" value="{{ Request::old('fullname') }}" name="fullname" id="fullname" aria-describedby="emailHelp" placeholder="Họ tên">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" value="{{ Request::old('username') }}" name="username" id="username" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                    <label class="error">{{$errors->first('username')}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" value="{{ Request::old('pwd') }}" name="pwd" id="pwd" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nhập lại Mật khẩu</label>
                    <input type="password" class="form-control" value="{{ Request::old('pwdreturn') }}" name="pwdreturn" id="pwdreturn" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" value="{{ Request::old('email') }}" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                    <label class="error">{{$errors->first('email')}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="number" class="form-control" value="{{ Request::old('phone') }}" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ Request::old('address') }}" name="address" id="address" aria-describedby="emailHelp" placeholder="Địa chỉ">
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Đăng ký" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

