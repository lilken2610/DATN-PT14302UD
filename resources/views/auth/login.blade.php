@extends('templates.shoes.master')
@section('title') Đăng nhập @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postLoginUser')}}" method="post" id="formLogin">
                @csrf
                <div class="form-group">
                    <label>Tên đăng nhập</label>
                    <input type="text" class="form-control" value="{{ Request::old('username') }}" name="username" maxlength="255" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <label >Mật khẩu</label>
                    <input type="password" class="form-control" value="{{ Request::old('password') }}" name="password" maxlength="255" placeholder="Mật khẩu">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me">
                    <label class="form-check-label">Nhớ tài khoản</label>
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Đăng nhập" class="btn btn-default">
                    <input type="button" value="Quên mật khẩu" onclick="window.location.href='{{route('shoes.auth.getSendEmail')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

