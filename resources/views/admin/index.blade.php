@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Trang Chủ @endsection
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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                @if( isset($arCount) )
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-fw fa-5x" aria-hidden="true" title="Copy to use product-hunt">&#xf288</i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$arCount['product']}}</div>
                                        <div>Sản phẩm!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('shoes.products.index')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$arCount['new']}}</div>
                                        <div>Bài đăng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('shoes.news.index')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$arCount['order']}}</div>
                                        <div>Đơn hàng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('shoes.transaction.index')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-fw fa-5x" aria-hidden="true" title="Copy to use user-md">&#xf0f0</i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$arCount['user']}}</div>
                                        <div>Người dùng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('shoes.user.index')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Xem chi tiết</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Session::has('msg'))
                            <span class="alert-success">{{Session::get('msg')}}</span>
                        @elseif(Session::has('error'))
                            <span class="alert-danger">{{Session::get('error')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
{{--src footer --}}
@section('src-footer-admin')
    <!-- Morris Charts JavaScript -->
    <script src="{{asset('admin/js/raphael.min.js')}}"></script>
    <script src="{{asset('admin/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/morris-data.js')}}"></script>
@endsection
