@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Người Dùng @endsection
{{--src--}}
@section('src-header-admin')
    <!-- DataTables CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
@endsection
{{--content--}}
@section('content-admin')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người dùng</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Người Dùng
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('shoes.user.postAdd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" name="username" placeholder="Nhập tên đăng nhập">
                                                <span class="alert-danger">{{$errors->first('username')}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Họ tên</label>
                                                <input class="form-control" name="fullname" placeholder="Nhập họ tên">
                                                <span class="alert-danger">{{$errors->first('fullname')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Nhập Email">
                                                <span class="alert-danger">{{$errors->first('email')}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone" placeholder="Nhập số điện thoại">
                                                <span class="alert-danger">{{$errors->first('phone')}}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password" class="form-control" name="pwd" placeholder="Nhập mật khẩu">
                                            <span class="alert-danger">{{$errors->first('pwd')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="address" placeholder="Nhập địa chỉ">
                                            <span class="alert-danger">{{$errors->first('address')}}</span>
                                        </div>
                                        @if(isset($select))
                                            <div class="form-group">
                                                <label>Chọn cấp độ</label>
                                                <select name="level" id="" class="form-control">
                                                    <option value="">--Chọn--</option>
                                                    @foreach($select as $value)
                                                        <option value="{{$value->id_level}}">{{$value->level}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="alert-danger">{{$errors->first('level')}}</span>
                                            </div>
                                        @endif
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('shoes.size.index')}}" class="btn btn-success">Quay lại</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

