@extends('templates.shoes.master')
@section('title')
Lịch sử đặt hàng
@stop
@section('content')
<link rel="stylesheet" href="{{asset('shoes/css/infoUser.css')}}">
<div class="container" style="margin-top: 150px">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <form action="{{route('shoes.auth.history')}}">
                    <div class="col-sm-3">
                        <input id="date" class="form-control" value="{{$date}}" type="date" name="date" onchange="this.form.submit()">
                    </div>
                    <div class="col-sm-2">
                        <select id="status" name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">Trạng thái</option>
                            <option value="-1" {{$status == '-1' ? 'selected':''}}>Đang vận chuyển</option>
                            <option value="1" {{$status == '1' ? 'selected':''}}>Đang xét duyệt</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" onclick="refreshSearchHistory(); this.form.submit();">Làm mới</button>
                        </div>
                    </div>
                    <div class="col-sm-2">

                        <div class="dataTables_length" id="dataTables-example_length"> <select name="record" class="form-control" onchange="this.form.submit()">
                                @foreach ($arr=[5, 10, 15, 20] as $item)
                                <option value="{{$item}}" {{$record == $item ? 'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="searchBar">
                            {!!$object->appends(Request::except('page'))->render() !!}
                        </div>
                    </div>
                </form>
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if(Session::has('msg'))
                            <span class="alert-success">{{Session::get('msg')}}</span>
                            @elseif(Session::has('error'))
                            <span class="alert-danger">{{Session::get('error')}}</span>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        @if(isset($object))
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="gradeU">
                                            <th class="stt">STT</th>
                                            <th class="fullname">Tên s</th>
                                            <th class="email">Email</th>
                                            <th class="detail">Chi tiết</th>
                                            <th class="total">Tổng bill</th>
                                            <th class="date">Thời gian</th>
                                            <th class="status">Trạng thái</th>
                                            <th class="function">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (asset($object))
                                        @foreach($object as $value)
                                        <tr class="gradeU">
                                            <td>{!! $value->id_transaction !!}</td>
                                            <td>{!! $value['user']->first()->fullname !!}</td>
                                            <td>{{$value['user']->first()->email}}</td>
                                            <td>
                                                <p>Tổng tiền sản phẩm: <br /><span style="padding-left:10px">{{number_format($value->totalPrice)}}</span> đ</p>
                                                <p>Thuế VAT: {{number_format($value->tax)}} đ</p>
                                                <p>Giảm giá: {{number_format($value->discount)}} đ</p>
                                            </td>
                                            <td>
                                                @php $sum = $value->totalPrice + $value->tax - $value->discount @endphp
                                                {{number_format($sum)}} đ
                                            </td>
                                            <td>{{ date( "m/d/Y", strtotime($value->created_at)) }}</td>
                                            <td style="text-align: center">
                                                @if( $value->status == -1 )
                                                <a class="btn btn-outline btn-success">Đang vận chuyển</a>
                                                @elseif( $value->status == 1 )
                                                <a class="btn btn-outline btn-info">Đang xét duyệt</a>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                <a data-id="{{$value->id_transaction}}" class="view_transaction btn btn-info">Xem</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <div class="modal fade" id="modalDetail" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Thông tin đơn hàng</h4>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function() {
                                            $('.view_transaction').click(function() {
                                                const id = $(this).data('id');
                                                $.ajax({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    },
                                                    type: 'POST',
                                                    url: "{{route('shoes.transaction.viewTransaction')}}",
                                                    data: {
                                                        id: id
                                                    },
                                                    success: function(data) {
                                                        $('#modalDetail').modal('show');
                                                        $('.modal-body').html('').append(data);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    @else
                                    <h1>Hết hàng</h1>
                                    @endif
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
    {{--modal--}}
</div>
@endsection