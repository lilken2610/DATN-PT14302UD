@extends('templates.shoes.master')
@section('title')
{{__('sentence.search')}}: {{$keyword}}
@endsection
@section('content')<div class="container categories margin-res-top" style="margin-top: 150px">
    <div class="col-sm-3 categories-title">
        <a href="{{route('shoes.shoes.index')}}">{{__('sentence.home_page')}}</a>
        /
        <a href="/tim-kiem?keyword={{$keyword}}">{{__('sentence.results')}}: ({{$resultSearch->total()}})</a>
    </div>
    <form action="{{route('shoes.shopping.search')}}">
        <div class="col-sm-2">
            <div style="width: 100%;float: right;">
                <input type="text" name="keyword" @if (!empty($keyword)) value={{$keyword}} @endif hidden>
                <select name="category" class="form-control" onchange="this.form.submit()">
                    <option value="">{{__('sentence.category')}}</option>
                    @foreach ($menu as $item)
                    <option value="{{$item->id_cat}}" {{$category == $item->id_cat ? 'selected': ''}}>
                        {{$item->name_cat}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div style="width: 100%;float: right;">
                <select name="brand" class="form-control" onchange="this.form.submit()">
                    <option value="">{{__('sentence.brand')}}</option>
                    @foreach ($menuBrand as $item)
                    <option value="{{$item->id_brand}}" {{$brand == $item->id_brand ? 'selected': ''}}>
                        {{$item->name_brand}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <div style="width: 100%;float: right;">
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
        @if(isset($resultSearch))
        <div class="row">
            <div class="categories-right">
                @foreach($resultSearch as $value)
                <div class="container-product">
                    <div class="container-product-content">
                        <div class="container-product-content-img">
                            @php
                            $arImg = json_decode($value->images);
                            $img = reset($arImg);
                            @endphp
                            <img src="{{asset('images/app/thumbnails/'.$img)}}">
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
                                class="btn btn-primary new-product-button"
                                style="opacity: 1">{{__('sentence.see_details')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="text-center">
            {!!$resultSearch->appends(Request::except('page'))->render() !!}
        </div>
    </div>
</div>

<script>
    (function () {

        var parent = document.querySelector(".price-slider");
        if (!parent) return;

        var
            rangeS = parent.querySelectorAll("input[type=range]"),
            numberS = parent.querySelectorAll("input[type=number]");

        rangeS.forEach(function (el) {
            el.oninput = function () {
                var slide1 = parseFloat(rangeS[0].value),
                    slide2 = parseFloat(rangeS[1].value);

                if (slide1 > slide2) {
                    [slide1, slide2] = [slide2, slide1];
                }

                numberS[0].value = slide1;
                numberS[1].value = slide2;
            }
        });

        numberS.forEach(function (el) {
            el.oninput = function () {
                var number1 = parseFloat(numberS[0].value),
                    number2 = parseFloat(numberS[1].value);

                if (number1 > number2) {
                    var tmp = number1;
                    numberS[0].value = number2;
                    numberS[1].value = tmp;
                }

                rangeS[0].value = number1;
                rangeS[1].value = number2;

            }
        });

    })();

</script>
@endsection
