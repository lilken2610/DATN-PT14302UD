@extends('templates.shoes.master')
@section('title') {{__('sentence.change_password')}} @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 200px; margin-bottom: 100px;">
        <div style="width: 50%;margin: 0 auto">
            <form action="{{route('shoes.auth.postChangePasswordUser')}}" method="post" id="changePassword">
                @csrf
                @method('PUT')
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
                <input type="hidden" name="token" required value="{{$token}}">
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('sentence.password')}}</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('sentence.password')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('sentence.enter_the_password')}}</label>
                    <input type="password" class="form-control" name="re_password" id="re_password" placeholder="{{__('sentence.enter_the_password')}}">
                </div>
                <div style="text-align: center">
                    <input type="submit" value="{{__('sentence.change_password')}}" class="btn btn-default">
                    <input type="button" value="{{__('sentence.login')}}" onclick="window.location.href='{{route('shoes.auth.getLoginUser')}}'" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

