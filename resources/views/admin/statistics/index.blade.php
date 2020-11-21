@extends('templates.admin.master')
{{--title--}}
@section('title-admin') Doanh Thu @endsection
{{--src--}}
@section('src-header-admin')
    <!-- DataTables CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
@endsection
{{--content--}}
@section('content-admin')
    <style href="{{$urlPublicAdmin}}css/hightchart.css"></style>
    <div id="page-wrapper">
        @if(isset($arResult))
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Doanh thu </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw year" data-year="{{$year}}"></i> Thông kê đơn hàng
                            @if( !empty($arResult['year']) )
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Năm
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                           @foreach( $arResult['year'] as $year )
                                               <li><a href="{{route('shoes.statistics.index',$year->year)}}">{{$year->year}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if( !empty($arResult['chart']) )
                            <figure class="highcharts-figure">
                                <div id="chart" data-array="{{ $arResult['chart'] }}" ></div>
                                <p class="highcharts-description">

                                </p>
                            </figure>
                        @endif
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                @if( !empty($arResult['product']) )
                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw year"></i> Top 10 sản phẩm bán chạy nhất
                        </div>
                        <figure class="highcharts-figure">
                            <div id="top5" data-product="{{$arResult['product']}}"></div>
                            <div id="sliders">
                                <table>
                                    <tr>
                                        <td><label for="alpha">Góc Alpha</label></td>
                                        <td><input id="alpha" type="range" min="0" max="45" value="15"/> </td>
                                    </tr>
                                    <tr>
                                        <td><label for="beta">Góc Beta</label></td>
                                        <td><input id="beta" type="range" min="-45" max="45" value="15"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="depth">Chiều sâu</label></td>
                                        <td><input id="depth" type="range" min="20" max="100" value="50"/></td>
                                    </tr>
                                </table>
                            </div>
                        </figure>
                    </div>
                    <!-- /.panel -->
                </div>
                @endif
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Kitchen Sink
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Tổng đơn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($arResult['user'] as $value)
                                            <tr>
                                                <td>1</td>
                                                <td>{{$value->username}}</td>
                                                <td>{{$value->email}}</td>
                                                <td>{{$value->orders}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
        </div>
        @endif
        <!-- /.container-fluid -->
    </div>
@endsection
{{--src-footer--}}
@section('src-footer-admin')
    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/js/dataTables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>
    {{--hight-charts--}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    {{--chart--}}
    <script src="{{asset('admin/js/hight.chart.js')}}"></script>
    <script src="{{asset('admin/js/tophightchart.js')}}"></script>
@endsection

