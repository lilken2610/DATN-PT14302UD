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
                                    <form role="form" id="product" action="{{route('shoes.user.postEdit',$object->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                @php $readonly =''; @endphp
                                                @if( $object->username == 'admin')
                                                    @php $readonly = 'readonly'; @endphp
                                                @endif
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" {{$readonly}} name="username" value="{{$object->username}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Họ tên</label>
                                                <input class="form-control" name="fullname" value="{{$object->fullname}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$object->email}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone" value="{{$object->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input class="form-control" name="pwd" type="password" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="address" value="{{$object->address}}">
                                        </div>
                                        @if(isset($select))
                                            <div class="form-group">
                                                <label>Chọn cấp độ</label>
                                                <select name="level" id="" class="form-control">
                                                    <option value="">--Chọn--</option>
                                                    @foreach($select as $value)
                                                        @php $active = ''; @endphp
                                                        @if( $value->id_level == $object->id_level )
                                                            @php $active = 'selected=""'; @endphp
                                                        @endif
                                                        <option {{$active}} value="{{$value->id_level}}">{{$value->level}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <input type="submit" class="btn btn-primary" value="Sửa">
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

