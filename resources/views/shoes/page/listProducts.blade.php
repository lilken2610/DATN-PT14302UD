@extends('templates.shoes.master')
@section('title')
{{__('sentence.list_products')}}
@endsection
@section('content')
<div class="container categories margin-res-top" style="margin-top: 150px">
    <div class="col-sm-4 categories-title">
        <a href="{{route('shoes.shoes.index')}}">{{__('sentence.home_page')}}</a>
        /
        <a href="/san-pham">{{__('sentence.list_products')}} ({{$listProducts->total()}})</a>
    </div>

    <form action="/san-pham">
        <div class="col-sm-5">
            <div style="width: 50%;float: right;padding-right: 25px">
                <select name="options" class="form-control" onchange="this.form.submit()">
                    <option value="1" {{$option == 1 ? 'selected': ''}}>{{__('sentence.latest')}}</option>
                    <option value="2" {{$option == 2 ? 'selected': ''}}>{{__('sentence.low_to_hight_price')}}</option>
                    <option value="3" {{$option == 3 ? 'selected': ''}}>{{__('sentence.hight_to_low_price')}}</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">

            <div class="price-slider"><span>
                <input type="number" value="{{$minPrice ? $minPrice:'0'}}" min="0" max="10000000"
                    onchange="this.form.submit()" /> {{__('sentence.to')}}
                <input type="number" value="{{$maxPrice ? $maxPrice:'10000000'}}" min="0" max="10000000"
                    onchange="this.form.submit()" /></span>
            <input value="{{$minPrice ? $minPrice:'0'}}" name="minPrice" min="0" max="10000000" step="50000"
                type="range" onchange="this.form.submit()" />
            <input value="{{$maxPrice ? $maxPrice:'10000000'}}" name="maxPrice" min="0" max="10000000" step="50000"
                type="range" onchange="this.form.submit()">
        </div>
        </div>
    </form>
</div>
<div class="container" style="margin-top: 1%">
    @if(isset($arProductBar))
    <div class="col-sm-3">
        <div class="categories-bar-left">
            <h3>{{__('sentence.product_buy_more')}}</h3>
            <div class="categories-bar-left-container">
                <ul>
                    <li>
                        <div id="popover-content">
                            <ul class="list-group custom-popover">
                                @foreach($arProductBar['muanhieu'] as $value)
                                <li class="list-group-item">
                                    <a href="{{route('shoes.shoes.product',$value->slug_product)}}">
                                        <div class="popover-content-cart">
                                            <div class="list-group-item-img">
                                                @php
                                                $images = json_decode( $value->images );
                                                $imgs = reset($images);
                                                @endphp
                                                <img src="{{asset('images/app/thumbnails/'.$imgs)}}" alt="">
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
            <h3>{{__('sentence.hot_products')}}</h3>
            <div class="categories-bar-left-container">
                <ul>
                    <li>
                        <div id="popover-content">
                            <ul class="list-group custom-popover">
                                @foreach($arProductBar['noibat'] as $item)
                                <li class="list-group-item">
                                    <a href="{{route('shoes.shoes.product',$item->slug_product)}}">
                                        <div class="popover-content-cart">
                                            <div class="list-group-item-img">
                                                @php
                                                $images = json_decode( $item->images );
                                                $imgs = reset($images);
                                                @endphp
                                                <img src="{{asset('images/app/thumbnails/'.$imgs)}}" alt="">
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
    <div class="col-md-9 col-sm-9">
        @if(isset($listProducts))
        <div class="row">
            <div class="categories-right">
                @foreach($listProducts as $value)
                <div class="container-product">
                    <div class="container-product-content">
                        <div class="container-product-content-img">
                            @php
                            $arImg = json_decode($value->images);
                            $img = reset($arImg);
                            @endphp
                            <img src="{{asset('images/app/thumbnails/'.$img)}}" alt="">
                        </div>
                        <div class="container-product-content-text">
                            <p>{{str_limit($value->name_product, 18)}}</p>
                            <p>{{number_format($value->price)}} VNĐ</p>
                            @if( $value->sale !=0 )
                            <div class="sale-product" style="top: 8%;left: 5%">
                                <p>{{$value->sale}}%</p>
                            </div>
                            @endif
                            <a href="{{route('shoes.shoes.product',$value->slug_product)}}"
                                class="btn btn-primary new-product-button" style="opacity: 1">{{__('sentence.see_details')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="text-center">
            {!!$listProducts->appends(Request::except('page'))->render() !!}
        </div>
    </div>
</div>
@endsection
