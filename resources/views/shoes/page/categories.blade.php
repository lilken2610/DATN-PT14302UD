@extends('templates.shoes.master')
@section('title') Danh Mục @endsection
@section('content')
    <div class="container categories margin-res-top" style="margin-top: 150px">
        <div class="col-sm-6 categories-title">
            <a href="{{route('shoes.shoes.index')}}">Trang chủ</a>/
            <a  style="font-weight: 700;color: #333333">{{$nameCat}} ({{$getProductCat->total()}})</a>
        </div>
        <div class="col-sm-6">
            <div style="width: 50%;float: right;padding-right: 25px">
                <form action="">
                    <select name="" class="form-control">
                        <option value="">Mặc định</option>
                        <option value="">Giá thấp đến cao</option>
                        <option value="">Giá cao đến thấp</option>
                        <option value="">Mới nhất</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 1%">
        @if(isset($arProductBar))
            <div class="col-sm-3" >
            <div class="categories-bar-left">
                <h3>Sản phẩm mua nhiều</h3>
                <div class="categories-bar-left-container">
                    <ul>
                        <li>
                            <div id="popover-content">
                                <ul class="list-group custom-popover" >
                                    @foreach($arProductBar['muanhieu'] as $value)
                                    <li class="list-group-item">
                                        <a href="{{route('shoes.shoes.product',$value->slug_product)}}">
                                        <div class="popover-content-cart">
                                            <div class="list-group-item-img">
                                                @php
                                                    $images = json_decode( $value->images );
                                                    $imgs = reset($images);
                                                @endphp
                                                <img src="{{asset('images/app/products/'.$imgs)}}" alt="">
                                            </div>
                                            <div class="list-group-item-text">
                                                <p>{{$value->name_product}}</p>
                                                <p class="popover-price">{{number_format($value->price)}} VNĐ</p>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="categories-bar-left">
                <h3>Sản phẩm nổi bật</h3>
                <div class="categories-bar-left-container">
                    <ul>
                        <li>
                            <div id="popover-content">
                                <ul class="list-group custom-popover" >
                                    @foreach($arProductBar['noibat'] as $item)
                                        <li class="list-group-item">
                                            <a href="{{route('shoes.shoes.product',$item->slug_product)}}">
                                                <div class="popover-content-cart">
                                                    <div class="list-group-item-img">
                                                        @php
                                                            $images = json_decode( $item->images );
                                                            $imgs = reset($images);
                                                        @endphp
                                                        <img src="{{asset('images/app/products/'.$imgs)}}" alt="">
                                                    </div>
                                                    <div class="list-group-item-text">
                                                        <p>{{$item->name_product}}</p>
                                                        <p class="popover-price">{{number_format($item->price)}} VNĐ</p>
                                                    </div>
                                                    <div style="clear: both"></div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        <div class="col-sm-9">
            <div class="categories-right">
                @if(isset($getProductCat))
                    @foreach($getProductCat as $value)
                    <div class="container-product">
                        <div class="container-product-content">
                            <div class="container-product-content-img">
                                @php
                                    $arImg = json_decode($value->images);
                                    $img = reset($arImg);
                                @endphp
                                <img src="{{asset('images/app/products/'.$img)}}" alt="">
                            </div>
                            <div class="container-product-content-text">
                                <p>{{$value->name_product}}</p>
                                <p>{{number_format($value->price)}} VNĐ</p>
                                @if( $value->sale !=0 )
                                    <div class="sale-product" style="top: 8%;left: 5%">
                                        <p>{{$value->sale}}%</p>
                                    </div>
                                @endif
                                <a href="{{route('shoes.shoes.product',$value->slug_product)}}" class="btn btn-primary new-product-button" style="opacity: 1">Xem chi chiết</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection