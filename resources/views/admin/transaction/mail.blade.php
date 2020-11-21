<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đơn hàng - {{$object->fullname}}</title>
</head>
<style>
    body {
        background: #eee;
        font-family: DejaVu Sans;
    }
    #bill {
        width: 500px;
        margin: 0 auto;
        text-align: center;
        background: #ffffff;
        box-shadow: 0px 0px 20px 0px #000000;
        margin-top: 20px;
    }
    .bill-title {
        padding: 10px;
        border-bottom: 2px dotted black;
    }
    .bill-title h3 {
        margin: 8px !important;
    }
    .bill-title h5 {
        margin: 10px !important;
    }
    .bill-product {
        margin: 10px;
        border-bottom: 2px dotted black;
    }
    .bill-product table {
        width: 100%;
    }
    .bill-footer {
        text-align: left;
        padding: 10px;
    }
    .bill-footer table td {
        text-align: right;
        padding: 5px;
    }
</style>
<body>
<div id="bill">
    <p>Cảm ơn bạn đã ủng hộ sản phẩm của chúng tôi</p>
    <div class="bill-title">
        <h3>Shop Sneaker</h3>
        <h5>Đc: 72 Nguyễn Xuân Nhĩ</h5>
        <h5>Sđt: 0362411205</h5>
    </div>
    <div class="bill-footer" >
        <table border="1" class="table" style="width: 100%">
            <thead>
            <tr>
                <th>Khách hàng</th>
                <td>{{$object->fullname}}</td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td>{{ $object->phone }}</td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td>{{ $object->address }}</td>
            </tr>
            </thead>
        </table>
    </div>
    <div class="bill-product">
        <table border="1" class="table" style="width: 100% !important;">
            <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Size</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @php $stt=0; @endphp
            @foreach( $object->detail as $value )
                @php $stt++ @endphp
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$value->name_product}}</td>
                    <td>{{$value->size}}</td>
                    <td>{{number_format($value->price)}} đ</td>
                    <td>{{$value->qtyTr}}</td>
                    <td>{{number_format($value->totalproduct)}} đ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="bill-footer" >
        <table border="1" class="table" style="width: 100%">
            <thead>
            <tr>
                <th>Tổng tiền</th>
                <td>{{number_format($object->totalPrice)}} đ</td>
            </tr>
            <tr>
                <th>VAT (2%)</th>
                <td>{{number_format($object->tax)}} đ</td>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <td>{{ number_format($object->discount) }} đ</td>
            </tr>
            <tr>
                <th>Tổng tiền</th>
                @php  $sumTotal = $object->totalPrice + $object->tax - $object->discount; @endphp
                <td>{{ number_format($sumTotal) }} đ</td>
            </tr>
            </thead>
        </table>
    </div>
</div>
</body>
</html>
