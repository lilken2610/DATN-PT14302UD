@extends('templates.shoes.master')
@section('title') Lấy lại mật khẩu @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postSendEmail')}}" method="post" id="resetPassword">
                @csrf
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
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Địa chỉ email">
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Gửi mật khẩu" class="btn btn-default">
                    <input type="button" value="Đăng nhập" onclick="window.location.href='{{route('shoes.auth.getLoginUser')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

