@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Sửa Mã @endsection
{{--src--}}
@section('src-header-admin')
    <!-- DataTables CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.responsive.cs')}}s" rel="stylesheet">
@endsection
{{--content--}}
@section('content-admin')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mã giảm giá</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sửa mã
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="{{route('shoes.gift.postEdit',$object->id_code)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Mã quà tặng</label>
                                            <input class="form-control" name="gift" value="{{$object->code}}"
                                        </div><br/>
                                        <div class="form-group">
                                            <label>Giá trị (% khuyến mãi)</label>
                                            <input class="form-control" type="number" name="value" value="{{$object->value}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" type="number" name="qty" value="{{$object->qty}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày bắt đầu</label>
                                            @php $created = date('m/d/Y',strtotime($object->created_day)) @endphp {{$created}}
                                            <input class="form-control" type="date" name="created_at" value="{{$created}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Ngày hết hạn</label>
                                            @php $end_day = date('m/d/Y',strtotime($object->end_day)) @endphp {{$end_day}}
                                            <input class="form-control" type="date" name="end_day">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
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
@section('src-footer-admin')
    <script src="{{asset('admin/js/validate/gift.code.js')}}"></script>
@endsection

