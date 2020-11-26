@extends('templates.shoes.master')
@section('title') Đăng nhập @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postLoginUser')}}" method="post" id="formLogin">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Đăng nhập" class="btn btn-default">
                    <input type="button" value="Quên mật khẩu" onclick="window.location.href='{{route('shoes.auth.getSendEmail')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

