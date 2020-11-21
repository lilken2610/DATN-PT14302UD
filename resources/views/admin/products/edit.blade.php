@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Sửa Sản Phẩm @endsection
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
                            Sửa Sản Phẩm
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('shoes.products.postEdit',$object->id_product)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input class="form-control" name="nameproduct" value="{{$object->name_product}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Size</label>
                                            <div class="size">
                                                @foreach($activeSize as $item)
                                                    <div class="checkbox form-inline">
                                                        <label>{{$item->size}}</label>
                                                        <input style="width: 150px" type="number" name="qty{{$item->id_size}}" value="{{$item->qty}}" placeholder="Nhập số lượng"  class="form-control ">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <span class="alert-danger">{{$errors->first('ch_name')}}</span>
                                            <span class="error"></span>
                                        </div>
                                        @if(isset($optionNameCat))
                                            <div class="form-group">
                                                <label>Danh mục</label>
                                                <select class="form-control" name="idcat">
                                                    <option value="0">--Không--</option>
                                                    @foreach($optionNameCat as $value)
                                                        @php $active = ''; @endphp
                                                        @if( $value->id_cat == $object->id_cat )
                                                            @php
                                                                $active ='selected=""';
                                                            @endphp
                                                        @endif
                                                        <option {{$active}} value="{!! $value->id_cat !!}">{!! $value->name_cat !!}</option>
                                                        @php subMenuOption($allCat,$value->id_cat,$object->id_cat) @endphp
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" class="form-control" name="imgedit[]" multiple>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá</label>
                                            <input type="number" class="form-control" name="price" step="0.01" value="{{$object->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Sale</label>
                                            <input type="number" class="form-control" name="sale" value="{{$object->sale}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea name="preview" id="" cols="5" rows="3" class="form-control">{!! $object->preview !!}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea id="editor2"  name="detail" class="ckeditor form-control">{!! $object->description !!}</textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
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

