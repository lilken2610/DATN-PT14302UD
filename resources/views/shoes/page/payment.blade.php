@extends('templates.shoes.master')
@section('title') Thanh Toán @endsection
@section('content')
@if (Auth::user() == null)
    <script>
        window.location.href = "/";
    </script>
@else
@if(isset($object))
<div class="pay">
    <div class="container margin-res-top " style="margin-top: 150px">
        <div class="col-sm-12">
            <div class="header clearfix">
                <h3 class="text-muted">THANH TOÁN TRỰC TUYẾN THÔNG QUA VNPAY</h3>
            </div>
            <div class="table">
                <form action="{{route('shoes.shoes.postPayment')}}" method="post" id="create_form" >
                @csrf
                    <div class="form-group">
                        <label for="order_id">Mã hóa đơn</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" value="{{$object->id_transaction}}" />
                    </div>
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount" name="amount" type="number" value="10000" />
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Mã giao dịch</label>
                        <div class="col-sm-10">
                      
                        <label for="colFormLabelSm" class="">  {{$object->id_transaction}}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toán hóa đơn mua hàng tại shopshoe.com</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán Popup</button>
                    <button type="submit" class="btn btn-default">Thanh toán Redirect</button>

                </form>
            </div>

        </div>
    </div>
</div>
@endif
@endsection
@section('src-public')
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
<link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet" />
<script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>

<script src="{{asset('shoes/js/ajax/gift.code.order.js')}}"></script>
<script src="{{asset('shoes/js/ajax/order.pay.js')}}"></script>
@endsection
@endif