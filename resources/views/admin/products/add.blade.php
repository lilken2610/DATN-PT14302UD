@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Sản Phẩm @endsection
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
                    <h1 class="page-header">Sản phẩm</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thêm Sản Phẩm
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" id="product" action="{{route('shoes.products.postAdd')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input class="form-control" name="nameproduct" placeholder="Nhập tên sản phẩm">
                                            <span class="alert-danger">{{$errors->first('nameproduct')}}</span>
                                            @if(Session::has('error-duplicate'))
                                                <span class="alert-danger">{{Session::get('error-duplicate')}}</span>
                                            @endif
                                        </div>
                                        @if(isset($size))
                                        <div class="form-group">
                                            <label for="">Size</label>
                                            <div class="size">
                                                @foreach($size as $item)
                                                    <div class="checkbox form-inline">
                                                        <label><input type="checkbox" name="ch_name[]" value="{{$item->id_size}}">{{$item->size}}</label>
                                                        <input style="width: 150px" type="number" name="qty{{$item->id_size}}" value="" placeholder="Nhập số lượng"  class="form-control ch_for">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <span class="alert-danger">{{$errors->first('ch_name')}}</span>
                                            <span class="error"></span>
                                        </div>
                                        @endif
                                        @if(isset($optionNameCat))
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select class="form-control" name="idcat">
                                                    <option value="">--Không--</option>
                                                    @foreach($optionNameCat as $value)
                                                        <option value="{!! $value->id_cat !!}">{!! $value->name_cat !!}</option>
                                                        @php subMenuOption($allCat,$value->id_cat,$id_cat=0) @endphp
                                                    @endforeach
                                                </select>
                                                <span class="alert-danger">{{$errors->first('idcat')}}</span>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="img[]" multiple>
                                            <span class="alert-danger">{{$errors->first('img')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="number" class="form-control" name="price" placeholder="Nhập giá">
                                            <span class="alert-danger">{{$errors->first('price')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Sale</label>
                                            <input type="number" class="form-control" name="sale" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="preview" id="" cols="5" rows="3" class="form-control"></textarea>
                                            <span class="alert-danger">{{$errors->first('preview')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea id="editor2"  name="detail" class="ckeditor form-control"></textarea>
                                            {{--<span class="alert-danger">{{$errors->first('detail')}}</span>--}}
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Thêm">
                                        <a href="{{route('shoes.categories.index')}}" class="btn btn-success">Quay lại</a>
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

