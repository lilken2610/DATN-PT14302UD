@extends('templates.shoes.master')
@section('title') Đổi mật khẩu @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postSendResetPassword')}}" method="post" id="changePassword">
                @csrf
                @method('PUT')
                <h2 class="text-center">Success</h2>
                @if (Session('message_error'))
                <div class="alert alert-danger text-center">{{Session::get('message_error')}}</div>
                @endif
                @if (Session('message_success'))
                <div class="alert alert-success text-center">{{Session::get('message_success')}}</div>
                @endif
                <div style="text-align: center">
                    <input type="button" value="Đăng nhập" onclick="window.location.href='{{route('shoes.auth.getLoginUser')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

