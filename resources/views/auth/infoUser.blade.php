@extends('templates.shoes.master')
@section('title')
{{Auth::user()->fullname}}
@stop
@section('content')
<div class="container" style="margin-top: 150px; width: 80%">
    <form action="{{route('shoes.auth.postInfo')}}" method="post" enctype="multipart/form-data">
        <div class="col-sm-3">
            <div class="card">
                @csrf
                @if(Session::has('msg'))
                <span style="margin: 10px 0" class="alert-success">{{Session::get('msg')}}</span>
                @elseif(Session::has('error'))
                <span style="margin: 10px 0" class="alert-danger">{{Session::get('error')}}</span>
                @endif
                @if( Auth::user()->avatar != null )
                <img id='output' src="{{asset('images/app/users/'. Auth::user()->avatar) }}">
                @else
                <img id='output' src="{{asset('images/app/users/notfount.png')}}">
                @endif
                <input type='file' name="avatar" accept='image/*' onchange='openFile(event)' style="padding-top: 10px">
                <div class="card">
                    <h4><b>{{ Auth::user()->fullname }}</b></h4>
                </div>
            </div>
            <div class="profile">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i style="color:blue" class="fa fa-user"></i>{{__('sentence.profile')}}</a></li>
                    @if (Auth::user()->email_code)
                    <li><a href="{{route( 'shoes.auth.activeAc',Auth::id() )}}"><i style="color: green" class="fa fa-file-text-o"></i> {{__('sentence.active_account')}} </a></li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i style="color: red" class="fa fa-file-text-o"></i> {{__('sentence.purchase history')}}</a>
                    </li>
                    <li><a href="{{route('shoes.auth.logoutUser')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>{{__('sentence.logout')}}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9 tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade">
                <div class="form-group ">
                    <div class="form-group">
                        <label for="pwd">{{__('sentence.user_name')}}:</label>
                        <input type="text" class="form-control" id="pwd" name="username" value="{{ Auth::user()->username }}">
                    </div>
                    <div class="form-group">
                        <label for="pwd">{{__('sentence.password')}}:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" value="{{ Auth::user()->password }}">
                    </div>
                    <label for="email">{{__('sentence.full_name')}}:</label>
                    <input type="text" class="form-control" id="email" name="fullname" value="{{ Auth::user()->fullname }}">
                </div>
                <div class="form-group">
                    <label for="pwd">{{__('sentence.address')}}:</label>
                    <input type="text" class="form-control" id="pwd" name="address" value="{{ Auth::user()->address }}">
                </div>
                <div class="form-group">
                    <label for="pwd">{{__('sentence.number_phone')}}:</label>
                    <input type="text" class="form-control" id="pwd" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group">
                    <label for="pwd">{{__('sentence.email')}}:</label>
                    <input type="text" class="form-control" id="pwd" name="email" value="{{ Auth::user()->email }}">
                </div>
                <input type="submit" class="button btn btn-primary" value="Lưu" />
            </div>
    </form>
    <div id="history" class="tab-pane fade in active">
        <form action="{{route('shoes.auth.postInfo')}}">
            <div class="col-sm-3">
                <input id="date" class="form-control" value="{{$date}}" type="date" name="date" onchange="this.form.submit()">
            </div>
            <div class="col-sm-2">
                <select id="status" name="status" class="form-control" onchange="this.form.submit()">
                    <option value="">{{__('sentence.status')}}</option>
                    <option value="1" {{$status == '1' ? 'selected':''}}>{{__('sentence.begin_transaction')}}</option>
                    <option value="-1" {{$status == '-1' ? 'selected':''}}>{{__('sentence.under_review')}}</option>
                    <option value="-2" {{$status == '-2' ? 'selected':''}}>{{__('sentence.cancel_order')}}</option>
                    <option value="2" {{$status == '2' ? 'selected':''}}>{{__('sentence.success_order')}}</option>
                </select>
            </div>
            <div class="col-sm-2">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="refreshSearchHistory(); this.form.submit();">{{__('sentence.refresh')}}</button>
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
                <!-- /.panel-heading -->
                @if(isset($object))
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr class="gradeU">
                                    <th style="min-width: 40px; text-align: center">No.</th>
                                    <th style="min-width: 118px; text-align: center">{{__('sentence.customer_name')}}
                                    </th>
                                    <th style="min-width: 118px; text-align: center">
                                        {{__('sentence.additional_infomation')}}</th>
                                    <th style="min-width: 40px; text-align: center">{{__('sentence.total_money')}}</th>
                                    <th style="min-width: 40px; text-align: center">{{__('sentence.date_of_booking')}}
                                    </th>
                                    <th style="min-width: 40px; text-align: center">{{__('sentence.status')}}</th>
                                    <th style="min-width: 40px; text-align: center">{{__('sentence.function')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (asset($object))
                                @foreach($object as $value)
                                <tr class="gradeU">
                                    <td>{!! $value->id_transaction !!}</td>
                                    <td>{!! $value['user']->first()->fullname !!}</td>
                                    <td>
                                        <p>Tổng tiền sản phẩm: <br /><span style="padding-left:10px">{{number_format($value->totalPrice)}}</span> đ
                                        </p>
                                        <p>Thuế VAT: {{number_format($value->tax)}} đ</p>
                                        <p>Giảm giá: {{number_format($value->discount)}} đ</p>
                                    </td>
                                    <td>
                                        @php $sum = $value->totalPrice + $value->tax - $value->discount @endphp
                                        {{number_format($sum)}} đ
                                    </td>
                                    <td>{{ date( "d/m/Y", strtotime($value->created_at)) }}</td>
                                    <td style="text-align: center">
                                        @if( $value->status == 1 )
                                        <a id="{{$value->id_transaction}}" onclick="successOrder(event);" class="btn btn-outline btn-success">{{__('sentence.begin_transaction')}}</a>
                                        @elseif( $value->status == -1 )
                                        <a id="{{$value->id_transaction}}" onclick="cancelOrder(event);" class="btn btn-outline btn-info">{{__('sentence.under_review')}}</a>
                                        @elseif( $value->status == -2 )
                                        <a class="btn btn-outline btn-success">{{__('sentence.cancel_order')}}</a>
                                        @elseif( $value->status == 2 )
                                        <a class="btn btn-outline btn-success">{{__('sentence.success_order')}}</a> 
                                        @endif
                                        <br>
                                        <br>
                                        @if( $value->status == -1  && $value->id_pay == 2)
                                        <a href="{{route('shoes.shoes.paymentVnpay',$value->id_transaction)}}"  class="btn btn-outline btn-success">{{__('sentence.unpaid_order')}}</a>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">
                                        <a data-id="{{$value->id_transaction}}" class="view_transaction btn btn-info">{{__('sentence.see_details')}}</a>
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
                                            <h4 class="modal-title">{{__('sentence.additional_infomation')}}</h4>
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
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                                    .attr('content')
                                            },
                                            type: 'GET',
                                            url: "/viewForUser",
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
    </div>
</div>
</div>
<script>
    var openFile = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    };

    function cancelOrder(event) {
        debugger;
        var id = event.target.id
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Muốn hủy đơn đặt hàng!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, tôi chắc chắn!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Thành công!',
                    'Hủy đơn hàng thành công.',
                    'success'
                ).then((result) => {
                    window.location.href = "/cancel-order/" + id;
                })
            }
        })
    }

    function successOrder(event) {
        var id = event.target.id
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Xác nhân đã nhận hàng!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, tôi đã nhận!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Thành công!',
                    'Xác nhận thành công, cảm ơn bạn đã mua hàng.',
                    'success'
                ).then((result) => {
                    window.location.href = "/success-order/" + id;
                })
            }
        })
    }
</script>
@endsection