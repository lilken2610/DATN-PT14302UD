@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Slide @endsection
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
                    <h1 class="page-header">Slide</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Slide
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('shoes.slide.postEdit',$object->id_slide)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tiêu đề</label>
                                            <input class="form-control" name="edittitle" value="{{$object->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" name="editcontent" id="" cols="5" rows="5" ">{!! $object->content !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Vị trí text</label>
                                            <select name="editposition" id="" class="form-control">
                                                <option value="left">Trái</option>
                                                <option value="right">Phải</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input class="form-control" name="img" type="file">
                                            <img src="/storage/app/slide/{{$object->img}}" alt="" style="max-width: 150px;margin-top: 5px">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
                                        <a href="{{route('shoes.slide.index')}}" class="btn btn-success">Quay lại</a>
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

