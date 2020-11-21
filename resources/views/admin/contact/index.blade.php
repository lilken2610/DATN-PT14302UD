@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Quản Lý Liên Hệ @endsection
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
                    <h1 class="page-header">Liên Hệ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
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
                        @if(isset($object))
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Tiêu đề</th>
                                            <th>Chức Năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $stt=0 @endphp
                                        @foreach($object as $value)
                                            @php $stt++; @endphp
                                            <tr class="gradeU">
                                                <td>{!! $stt !!}</td>
                                                <td>{!! $value->fullname !!}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->title}}</td>
                                                <td>
                                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#info-contact{{$stt}}">Xem</a>
                                                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#confilm{{$stt}}">Phản hồi</a>
                                                    <a href="{{route('shoes.contact.del',$value->id_contact)}}" onclick="return xacnhaxoa('Bạn có chắc muốn xóa !')" class="btn btn-danger" class="btn btn-danger">Xóa</a>
                                                </td>
                                            </tr>
                                            {{--modal--}}
                                            <div class="modal fade" id="info-contact{{$stt}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Liên hệ </h4>
                                                        </div>
                                                        <div class="modal-body info-product">
                                                            <p><strong>Họ tên</strong>: {!! $value->fullname !!}</p>
                                                            <p><strong>Số điện thoại</strong>: {!! $value->phone !!}</p>
                                                            <p><strong>Email</strong>: {!! $value->email !!}</p>
                                                            <p><strong>Tiêu đề:</strong></p>
                                                            <p style="padding:10px">{!! $value->title !!}</p>
                                                            <p><strong>Nội dung:</strong></p>
                                                            <p style="padding:10px">{!! $value->content !!}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal fade" id="confilm{{$stt}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <form action="{{route('shoes.contact.confilm',$value->id_contact)}}" method="post">
                                                        @csrf
                                                    <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Phản hồi </h4>
                                                            </div>
                                                            <div class="modal-body info-product">
                                                                <label for="">Gởi phản hồi của bạn đến <span style="color:red">{{$value->email}}</span></label>
                                                                <textarea class="form-control" name="content" id="" cols="5" rows="5"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" class="btn btn-primary" value="Gởi">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
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
@section('src-footer-admin')
    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/dataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true,
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            });
        });
    </script>
@endsection

