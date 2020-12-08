@extends('templates.shoes.master')
@section('title') {{__('sentence.login')}} @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postLoginUser')}}" method="post" id="formLogin">
                @csrf
                <div class="form-group">
                    <label>{{__('sentence.user_name')}}</label>
                    <input type="text" class="form-control" value="{{ Request::old('username') }}" name="username" maxlength="255" aria-describedby="emailHelp" placeholder="{{__('sentence.user_name')}}">
                </div>
                <div class="form-group">
                    <label >{{__('sentence.password')}}</label>
                    <input type="password" class="form-control" value="{{ Request::old('password') }}" name="password" maxlength="255" placeholder="{{__('sentence.password')}}">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember_me">
                    <label class="form-check-label">{{__('sentence.remember_me')}}</label>
                </div>
                <div style="text-align: center">
                    <input type="submit" value="{{__('sentence.login')}}" class="btn btn-default">
                    <input type="button" value="{{__('sentence.forgot_password')}}" onclick="window.location.href='{{route('shoes.auth.getSendEmail')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

