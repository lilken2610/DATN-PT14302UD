@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Thương hiệu @endsection
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
                    <h1 class="page-header">Thương hiệu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Thương hiệu
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('shoes.brands.postAdd')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên thương hiệu</label>
                                            <input class="form-control" name="namebrand" placeholder="Nhập tên thương hiệu">
                                            <span class="alert-danger">{{$errors->first('namebrand')}}</span>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('shoes.brands.index')}}" class="btn btn-success">Quay lại</a>
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

