@extends('templates.shoes.master')
@section('title') Thanh Toán @endsection
@section('content')
@if (count(Cart::content()) == 0)
    <script>
        window.location.href = "/";
    </script>
@else
    <div class="pay">
        <div class="container margin-res-top" style="margin-top: 150px">
            <div class="col-sm-6">
                <div style="padding: 10px 0">
                    @if(Session::has('msg'))
                        <span class="alert-success">{{Session::get('msg')}}</span>
                    @elseif(Session::has('error'))
                        <span class="alert-danger">{{Session::get('error')}}</span>
                    @endif
                </div>
                <form action="{{route('shoes.shoes.updateInfo')}}" method="post">
                    @csrf
                    <div class="form-group" >
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
                    <div class="form-group">
                        <label for="pwd">{{__('sentence.note')}}:</label>
                        <textarea name="" id="" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="bt-pay-update button btn btn-primary">{{__('sentence.update')}}</button>
                </form>
            </div>
            <div class="col-sm-6 ">
                <div class="pay-right">
                    <h4>{{__('sentence.your_order')}}</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('sentence.product')}}</th>
                            <th scope="col">{{__('sentence.total_money')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( Cart::content() as $pay )
                            <tr>
                                <td scope="row">{{$pay->name}} (x {{$pay->qty}} )</td>
                                <td>{{number_format($pay->priceTotal)}} đ</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th scope="row">{{__('sentence.total')}}</th>
                            <td><strong>{{ Cart::initial(0) }} đ</strong></td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700" scope="row">{{__('sentence.tax')}} (20%)</td>
                            <td>{{ Cart::tax(0) }} đ</td>
                        </tr>
                        {{-- <tr>
                            <td style="font-weight: 700" scope="row">{{__('sentence.gift_code')}} (%)</td>
                            <td>
                                <form class="form-group" id="gift-code" action="">
                                    <div class="col-sm-6">
                                        <input type="text" name="code" class="gift-code form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn-right btn btn-dropbox" value="{{__('sentence.apply')}}">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">{{__('sentence.sale')}}</th>
                            <td><span id="discount-pay">{{Cart::discount(0)}}</span> đ</td>
                        </tr> --}}
                        <tr>
                            <th scope="row">{{__('sentence.total')}}</th>
                            <td><strong><span id="total-pay">{{ Cart::total(0) }}</span> đ</strong></td>
                        </tr>
                        </tbody>
                    </table>
                    <form action="{{route('shoes.shoes.postPay')}}" method="post" id="order-pay">
                        @csrf
                        @if( isset($order_pays) )
                            <div id="form-pay">
                            @foreach( $order_pays as $itemPay )
                                <div class="radio">
                                    <label><input type="radio" value="{{$itemPay->id_pay}}" class="idpay" name="orderpay" required>{{__('sentence.payment_on_delivery')}}</label>
                                </div>
                            @endforeach
                            </div>
                        @endif
                        <div style="width: 500px;">
                            <div id="paypal-button-container" style="display: none"></div>
                        </div>
                        <input type="submit" id="button-submit" class="button btn btn-primary" value="{{__('sentence.order')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@php
    $arrayUsd = explode(',', Cart::total(0) );
    $getUsd = implode($arrayUsd);
    $usd = round($getUsd/22000*1000);
@endphp
@section('src-public')
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
    <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
        <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
    <script>
        // Render the PayPal button into #paypal-button-container
    
        paypal.Buttons({
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$usd}}'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    const idpay = $('input[name="orderpay"]:checked').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'POST',
                        url:'/thanh-toan',
                        data:{ id_pay:idpay },
                        success:function(data){
                            if (data==1) {
                                Swal.fire(
                                    'Thống báo!',
  'Đặt hàng thành công!',
  'success'
                                ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/tai-khoan-cua-toi#lich-su";
                            }
                        })
                            }
                        }
                    });
                });
            }


        }).render('#paypal-button-container');
    </script>
    <script src="{{asset('shoes/js/ajax/gift.code.order.js')}}"></script>
    <script src="{{asset('shoes/js/ajax/order.pay.js')}}"></script>
@endsection
@endif
