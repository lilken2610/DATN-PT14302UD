@extends('templates.shoes.master')
@section('title')
Tìm kiếm: {{$keyword}}
@endsection
@section('content')
<div class="container categories margin-res-top" style="margin-top: 150px">
    <div class="col-sm-3 categories-title">
        <a href="{{route('shoes.shoes.index')}}">Trang chủ</a>
        /
        <a href="/tim-kiem?keyword={{$keyword}}">Kết quả: ({{$resultSearch->total()}})</a>
    </div>
<form action="{{route('shoes.shopping.search')}}">
        <div class="col-sm-3">
            <div style="width: 100%;float: right;padding-right: 25px">
                <input type="text" name="keyword" @if (!empty($keyword)) value={{$keyword}} @endif hidden>
                <select name="category" class="form-control" onchange="this.form.submit()">
                    <option value="">Loại sản phẩm</option>
                    @foreach ($menu as $item)
                    <option value="{{$item->id_cat}}" {{$category == $item->id_cat ? 'selected': ''}}>{{$item->name_cat}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div style="width: 100%;float: right;padding-right: 25px">
                <select name="brand" class="form-control" onchange="this.form.submit()">
                    <option value="">Thương hiệu</option>
                    @foreach ($menuBrand as $item)
                    <option value="{{$item->id_brand}}" {{$brand == $item->id_brand ? 'selected': ''}}>{{$item->name_brand}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div style="width: 100%;float: right;padding-right: 25px">
                <select name="options" class="form-control" onchange="this.form.submit()">
                    <option value="1" {{$option == 1 ? 'selected': ''}}>Mới nhất</option>
                    <option value="2" {{$option == 2 ? 'selected': ''}}>Giá thấp đến cao</option>
                    <option value="3" {{$option == 3 ? 'selected': ''}}>Giá cao đến thấp</option>
                </select>
            </div>
        </div>

    </form>
</div>
<div class="container" style="margin-top: 1%">
    @if(isset($arProductBar))
    <div class="col-sm-3">
        <div class="categories-bar-left">
            <h3>Sản phẩm mua nhiều</h3>
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
                            <img src="{{asset('images/app/products/'.$img)}}" alt="">
                        </div>
                        <div class="container-product-content-text">
                            <p>{{str_limit($item->name_product, 18)}}</p>
                            <p>{{number_format($value->price)}} VNĐ</p>
                            @if( $value->sale !=0 )
                            <div class="sale-product" style="top: 8%;left: 5%">
                                <p>{{$value->sale}}%</p>
                            </div>
                            @endif
                            <a href="{{route('shoes.shoes.product',$value->slug_product)}}"
                                class="btn btn-primary new-product-button" style="opacity: 1">Xem chi chiết</a>
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
@endsection
