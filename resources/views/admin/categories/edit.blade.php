@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Thêm Danh Mục @endsection
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
                    <h1 class="page-header">Danh Mục</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cập Nhập Danh Mục
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('shoes.categories.postEdit',$getId->id_cat)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Tên danh mục</label>
                                            <input class="form-control" name="editnamecat" value="{{$getId->name_cat}}">
                                            <span class="alert-danger">{{$errors->first('namecat')}}</span>
                                            @if(Session::has('error-duplicate'))
                                                <span class="alert-danger">{{Session::get('error-duplicate')}}</span>
                                            @endif
                                        </div>
                                        @if(isset($optionNameCat))
                                            <div class="form-group">
                                                <label>Danh mục cha</label>
                                                <select class="form-control" name="editidsub">
                                                    <option value="0">--Không--</option>
                                                    @foreach($optionNameCat as $value)
                                                        @php $active = ''; @endphp
                                                        @if( $value->id_cat == $getId->parent_id )
                                                            @php
                                                                $active ='selected=""';
                                                            @endphp
                                                        @endif
                                                        <option {{$active}} value="{!! $value->id_cat !!}">{!! $value->name_cat !!}</option>
                                                        @php subMenuOption($allCat,$value->id_cat,$getId->parent_id) @endphp
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
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

