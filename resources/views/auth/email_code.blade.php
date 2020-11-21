@extends('templates.shoes.master')
@section('title') Xác nhận tài khoản @endsection
@section('content')
    <div class="container" style="margin-top: 150px">
        <div style="width: 70%;margin: 0 auto">
            <form action="{{route('shoes.auth.postActiveAc',$object->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <h4>Xin chào bạn <strong style="color:red">{{$object->fullname}}</strong>, vui lòng kiểm tra email và nhập mã xác nhận của bạn để kích hoạt tài khoản</h4>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mã xác nhận của bạn</label>
                    <input type="text" class="form-control" name="acitve" placeholder="Mã xác nhận">
                    <span class="alert-danger">{{$errors->first('active')}}</span>
                </div>
                <div style="text-align: center">
                    <input type="submit" value="Kích hoạt tài khoản" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection

