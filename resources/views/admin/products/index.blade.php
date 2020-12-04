@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Sản Phẩm @endsection
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
                <h1 class="page-header">Sản phẩm </h1>
                <a href="{{route('shoes.products.add')}}" class="btn btn-primary" style="margin-bottom: 15px">Thêm sản
                    phẩm</a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <form action="{{route('shoes.products.index')}}">
                <div class="col-sm-3">
                    <div style="width: 100%;float: right;padding-right: 10px">
                        <input type="text" name="keyword" @if (!empty($keyword)) value="{{$keyword}}" @endif
                            class="form-control" placeholder="Tìm kiếm...">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="width: 100%;float: right;padding-right: 10px">
                        <select name="category" class="form-control" onchange="this.form.submit()">
                            <option value="">Loại sản phẩm</option>
                            @foreach ($menu as $item)
                            <option value="{{$item->id_cat}}" @if (!empty($category))
                                {{$category == $item->id_cat ? 'selected': ''}} @endif>{{$item->name_cat}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="width: 100%;float: right;padding-right: 10px">
                        <select name="brand" class="form-control" onchange="this.form.submit()">
                            <option value="">Thương hiệu</option>
                            @foreach ($menuBrand as $item)
                            <option value="{{$item->id_brand}}" @if (!empty($brand))
                                {{$brand == $item->id_brand ? 'selected': ''}} @endif>{{$item->name_brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div style="width: 100%;float: right;padding-bottom: -100px">
                            {!!$arProducts->appends(Request::except('page'))->render() !!}
                </div>
                </div>
            </form>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Session::has('msg'))
                        <span class="alert-success">{{Session::get('msg')}}</span>
                        @elseif(Session::has('error'))
                        <span class="alert-danger">{{Session::get('error')}}</span>
                        @endif
                    </div>
                    <!-- /.panel-heading -->
                    @if(isset($arProducts))
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Thể loại</th>
                                        <th>Thương hiệu</th>
                                        <th>Hình ảnh</th>
                                        <th>Thông tin</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @foreach($arProducts as $value)
                                    <tr class="gradeU">
                                        <td>{{$arProducts->perPage()*($arProducts->currentPage()-1)+$count}}</td>
                                        <td>
                                            {!! $value->name_product !!}
                                            <div>
                                                <span class="pro-rating">
                                                    @for($i = 1; $i <= 5 ; $i++) <i
                                                        class="fa fa-star {{ $i<=$value->pro_rating ? 'active' : '' }}">
                                                        </i>
                                                        @endfor
                                                </span>
                                            </div>
                                        </td>
                                        <td>{!! $value['category']->name_cat !!}</td>
                                        <td>{!! $value['brand']->name_brand !!}</td>
                                        <td>
                                            @php
                                            $objectImg = json_decode($value->images);
                                            $img = reset($objectImg);
                                            @endphp
                                            <img src="{{asset('images/app/thumbnails/'.$img)}}" style="width: 100px"
                                                alt="">
                                        </td>
                                        <td>
                                            <p>
                                                Số lượng: {{$value->qty}}
                                            </p>
                                            <p>Giá: {{number_format($value->price)}}</p>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="{{route('shoes.categories.edit',$value->id_product)}}"
                                                class="btn btn-info" data-toggle="modal"
                                                data-target="#info-product{{$value->id_product}}">Chi tiết</a>
                                            <a href="{{route('shoes.products.edit',$value->id_product)}}"
                                                class="btn btn-primary">Sửa</a>
                                            <a href="{{route('shoes.products.del',$value->id_product)}}"
                                                onclick="return xacnhaxoa('Bạn có chắc muốn xóa !')"
                                                class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                    {{--form modal--}}
                                    <div class="modal fade" id="info-product{{$value->id_product}}" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Thông tin sản phẩm</h4>
                                                </div>
                                                <div class="modal-body info-product">
                                                    <p><strong>Tên sản phẩm</strong>: {!! $value->name_product !!}</p>
                                                    <p><strong>Thể loại</strong>: {!! $value['category']->name_cat !!}
                                                    </p>
                                                    <p><strong>Thương hiệu</strong>: {!! $value['brand']->name_brand !!}
                                                    </p>
                                                    <p>
                                                        <strong>Lượt đánh giá</strong>:
                                                        <div>
                                                            <span class="pro-rating">
                                                                @for($i = 1; $i <= 5 ; $i++) <i
                                                                    class="fa fa-star {{ $i<=$value->pro_rating ? 'active' : '' }}">
                                                                    </i>
                                                                    @endfor
                                                            </span>
                                                        </div>
                                                    </p>
                                                    <p><strong>Số lượng</strong>: {!! $value->qty !!}</p>
                                                    {{-- <div style="padding: 15px">
                                                                @foreach($value->size as $item)
                                                                    <p>Size {{$item->size}}: {{$item->qty}} đôi</p>
                                                    @endforeach
                                                </div> --}}
                                                <p><strong>Giá</strong>: {!! number_format($value->price) !!}</p>
                                                <p><strong>Sale</strong>: {!! number_format($value->sale) !!}%</p>
                                                <p><strong>Hình ảnh</strong>:</p>
                                                <div class="info-img">
                                                    @php
                                                    $arInfo = json_decode($value->images);
                                                    if ( empty($value->images) ) {
                                                    $arInfo = ['string'=>'notfound.png'];
                                                    }
                                                    @endphp
                                                    @foreach($arInfo as $img)
                                                    <img src="{{asset('images/app/thumbnails/'.$img)}}" alt=""
                                                        style="width: 50px;height: 50px">
                                                    @endforeach
                                                </div>
                                                <p><strong>Mô tả:</strong></p>
                                                <p>{!! $value->preview !!}</p>
                                                <p><strong>Chi tiết:</strong></p>
                                                <p>{!! $value->description !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>

                                    </div>
                        </div>
                        @php $count++; @endphp
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                @endif
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.container-fluid -->
</div>
@endsection
{{--src-footer--}}
{{-- @section('src-footer-admin')
    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"]
            ]
        });
    });

</script>
@endsection --}}
