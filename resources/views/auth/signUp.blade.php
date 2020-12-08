@extends('templates.shoes.master')
@section('title') {{__('sentence.register')}} @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 150px">
        <div style="width: 80%;margin: 0 auto">
            <form action="{{route('shoes.auth.postSignUp')}}" method="post" id="formSignup">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('sentence.full_name')}}</label>
                    <input type="text" class="form-control" value="{{ Request::old('fullname') }}" name="fullname" id="fullname" aria-describedby="emailHelp" placeholder="{{__('sentence.full_name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('sentence.user_name')}}</label>
                    <input type="text" class="form-control" value="{{ Request::old('username') }}" name="username" id="username" aria-describedby="emailHelp" placeholder="{{__('sentence.user_name')}}">
                    <label class="error">{{$errors->first('username')}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('sentence.password')}}</label>
                    <input type="password" class="form-control" value="{{ Request::old('pwd') }}" name="pwd" id="pwd" placeholder="{{__('sentence.password')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('sentence.enter_the_password')}}</label>
                    <input type="password" class="form-control" value="{{ Request::old('pwdreturn') }}" name="pwdreturn" id="pwdreturn" placeholder="{{__('sentence.enter_the_password')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('sentence.email')}}</label>
                    <input type="email" class="form-control" value="{{ Request::old('email') }}" name="email" id="email" aria-describedby="emailHelp" placeholder="{{__('sentence.email')}}">
                    <label class="error">{{$errors->first('email')}}</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('sentence.number_phone')}}</label>
                    <input type="number" class="form-control" value="{{ Request::old('phone') }}" name="phone" id="phone" aria-describedby="emailHelp" placeholder="{{__('sentence.number_phone')}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('sentence.address')}}</label>
                    <input type="text" class="form-control" value="{{ Request::old('address') }}" name="address" id="address" aria-describedby="emailHelp" placeholder="{{__('sentence.address')}}">
                </div>
                <div style="text-align: center">
                    <input type="submit" value="{{__('sentence.register')}}" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

