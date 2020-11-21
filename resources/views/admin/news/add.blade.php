@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Tin @endsection
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
                    <h1 class="page-header">Tin Tức</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Tin
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('shoes.news.postAdd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tiêu đề tin</label>
                                            <input class="form-control" name="namenew" placeholder="Nhập tiêu đề danh mục">
                                            <span class="alert-danger">{{$errors->first('namenew')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="pic" >
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="previewnew" id="" cols="5" rows="5" class="form-control"></textarea>
                                            <span class="alert-danger">{{$errors->first('previewnew')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea name="detailnew" id="" cols="5" rows="10" class="ckeditor form-control"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('shoes.news.index')}}" class="btn btn-success">Quay lại</a>
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

