@extends('templates.shoes.master')
@section('title')
{{__('sentence.cart')}}
@endsection
@section('content')
<br>
<br>
<div class="cart">
    @if( Cart::count() != 0 )
    <div class="container margin-res-top" style="margin-top: 150px">
        <div class="col-sm-7 cart-content-left">
            <form action="{{route('shoes.shopping.update')}}" method="post" id="formCart">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('sentence.product')}}</th>
                            <th scope="col">{{__('sentence.price')}}</th>
                            <th scope="col">{{__('sentence.salary')}}</th>
                            <th scope="col">{{__('sentence.total')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td>
                                <div class="cart-product">
                                    <div class="cart-product-image">
                                        <img src="{{asset('images/app/thumbnails/'.$item->options->image)}}" alt="">
                                    </div>
                                    <div class="cart-product-info">
                                        <p>{{$item->name}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{number_format($item->price)}} đ</td>
                            <td>
                                <div class="quantity">
                                    <input type="number" value="{{$item->qty}}" name="quantity"
                                        onchange="qtyCart(this.value,'{{$item->rowId}}')"
                                        class="value-qty {{$item->rowId}}" maxlength="2" min="1" max="10" size="1"
                                        id="number" style="text-align: center">
                                </div>
                            </td>
                            <td>
                                <span id="{{$item->rowId}}">{{number_format($item->subtotal)}}</span>
                                <a href="{{route('shoes.shopping.del',$item->rowId)}}" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <a href="{{route('shoes.shoes.index')}}" class="button-close btn btn-success" style="opacity: 1">
                        <i class="fa fa-arrow-circle-left"></i> {{__('sentence.continue_to_buy_products')}}
                    </a>
                </div>
            </form>
            <script src="{{asset('shoes/js/ajax.functions.js')}}"></script>
        </div>
        <div class="col-sm-5 cart-content-right">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{__('sentence.total')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{__('sentence.total_sub')}}</th>
                        <td><span id="price_total">{{ Cart::priceTotal(0) }}</span> đ</td>
                    </tr>
                    <tr>
                        <th scope="row">{{__('sentence.tax')}}(0%)</th>
                        <td><span id="tax">{{Cart::tax() }}</span> đ</td>
                    </tr>
                    <tr>
                        <th scope="row">T{{__('sentence.total_money')}}</th>
                        <td><span id="total">{{ Cart::total(0) }}</span> đ</td>
                    </tr>
                </tbody>
            </table>
            <input type="button" value="{{__('sentence.proceed_with_payment')}}" style="width: 100%" class="button btn btn-primary"
                onclick="checkLogin();" />

            <script>
                var user = {!! json_encode(optional(auth()->user())->only('id', 'email', 'email_code')) !!}
                function checkLogin() {
                    var validator = $( "#formCart" ).validate();
                    if((validator.errorList).length == 0){

                    if ( user == null) {
                        Swal.fire({
                            title: 'Oh, có vấn đề?',
                            text: "Bạn cần đăng nhập để thanh toán!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đăng nhập tại đây!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{route('shoes.auth.getLoginUser')}}";
                            }
                        })
                    } else {
                        if(user.email_code){
                            Swal.fire({
                            title: 'Oh, có vấn đề?',
                            text: "Bạn cần xác thực email mới có thế mua hàng!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Xác thực tại đây!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/kich-hoat-tai-khoan/" + user.id;
                            }
                        })
                        }
                        else{
                        window.location.href = "{{route('shoes.shoes.pay')}}";
                        }
                    }
                    }else{
                        console.log('error')
                    }
                }

            </script>
        </div>
    </div>
    @else
    <br>
    <br>
    <div class="container margin-res-top" style="margin-top: 150px;text-align: center">
        <h3>{{__('sentence.empty_cart')}}</h3>
        <a href="{{route('shoes.shoes.index')}}" class="button-close btn btn-success" style="opacity: 1">
            <i class="fa fa-arrow-circle-left"></i> {{__('sentence.continue_to_buy_products')}}
        </a>
    </div>
    <br>
    <br>
    @endif
</div>
<br>
<br>
@endsection
