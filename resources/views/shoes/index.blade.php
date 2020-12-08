@extends('templates.shoes.master')
@section('title') Sneaker @endsection
@section('content')


@if (Session::has('success'))
<script>
    Swal.fire(
        'Chúc mừng!',
        'Bạn đã kích hoạt thành công, bây giờ bạn có thể đặt hàng!',
        'success'
    )
</script>
@endif
<div class="container margin-res-top" style="margin-top: 150px">
    @if( !empty($arIndex['slide']) )
    <div class="owl-one owl-carousel owl-theme">
        @foreach($arIndex['slide'] as $item)
        <div class="item slide-item" style="background-image: url('{{ asset('images/app/slide/'.$item->img)}}');">
            <div class="slide-item-text" style="float: {{$item->position_text}}">
                <h2>{{$item->title}}</h2>
                <p>{!! $item->content !!}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    {{--col3--}}
    @if( !empty($arIndex['randomPro']) )
    <div class="row margin-top">
        @foreach( $arIndex['randomPro'] as $random)
        <div class="col-sm-4 ads-product">
            <div class="ads-product-content">
                <div class="ads-product-img">
                    @php
                    $images_rand = json_decode($random->images);
                    $img_rand = reset($images_rand);
                    @endphp
                    <img src="{{asset('images/app/products/'.$img_rand)}}" alt="">
                </div>
            </div>
            <div class="ads-product-button">
                <a href="{{route('shoes.shoes.product',$random->slug_product)}}" class="btn btn-primary">{{__('sentence.see_details')}}</a>
            </div>
        </div>
        @endforeach
    </div>@endif
    {{--col 4--}}
    <div class="product margin-top">
        <script>
            jQuery(function () {
                jQuery('#default').click();
            });

        </script>
        <div class="">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="default">{{__('sentence.sale_products')}}</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">{{__('sentence.selling_products')}}</button>
                <button class="tablinks" onclick="openCity(event, 'Tokyo')">{{__('sentence.new_products')}}</button>
            </div>
            {{--sản phẩm mới--}}
            @if(!empty($arIndex['productNews']))
            <div id="London" class="tabcontent">
                <div class="product-new owl-two owl-carousel owl-theme">
                    @foreach($arIndex['productNews'] as $value)
                    <div class=" box-product-new item">
                        <div class="new-product-content">
                            <div class="product-new-content">
                                @php
                                $img = json_decode($value->images);
                                $linkImg = reset($img);
                                @endphp
                                <img src="{{asset('images/app/thumbnails/'.$linkImg)}}" alt="">
                            </div>
                        </div>
                        <div class="info">
                            <p>{{$value->name_product}}</p>
                            <p>{{number_format($value->price)}} đ</p>
                        </div>
                        <div class="new-product-button">
                            <a href="{{route('shoes.shoes.product',$value->slug_product )}}" class="btn btn-primary">Xem
                                sản phẩm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if( !empty($arIndex['product_selling']) )
            <div id="Paris" class="tabcontent">
                <div class="product-new owl-two owl-carousel owl-theme">
                    @foreach( $arIndex['product_selling'] as $selling )
                    <div class=" box-product-new item">
                        <div class="new-product-content">
                            <div class="product-new-content">
                                @php
                                $images_selling = json_decode($selling->images);
                                $img_selling = reset($images_selling);
                                @endphp
                                <img src="{{asset('images/app/thumbnails/'.$img_selling)}}" alt="">
                            </div>
                        </div>
                        <div class="info">
                            <p>{{$selling->name_product}}</p>
                            <p>{{number_format($selling->price)}} đ</p>
                        </div>
                        <div class="new-product-button">
                            <a href="{{route('shoes.shoes.product',$selling->slug_product)}}"
                                class="btn btn-primary">{{__('sentence.see_details')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if( !empty($arIndex['new_produts']) )
            <div id="Tokyo" class="tabcontent">
                <div class="product-new owl-two owl-carousel owl-theme">
                    @foreach( $arIndex['new_produts'] as $new_pd )
                    <div class=" box-product-new item">
                        <div class="new-product-content">
                            <div class="product-new-content">
                                @php
                                $images_newpd = json_decode($new_pd->images);
                                $img_newpd = reset($images_newpd);
                                @endphp
                                <img src="{{asset('images/app/thumbnails/'.$img_newpd)}}" alt="">
                            </div>
                        </div>
                        <div class="info">
                            <p>{{$selling->name_product}}</p>
                            <p>{{number_format($new_pd->price)}} đ</p>
                        </div>
                        <div class="new-product-button">
                            @php $slug_npd = \Illuminate\Support\Str::slug($new_pd->name_product,'-') @endphp
                            <a href="{{route('shoes.shoes.product',['slug'=>$slug_npd,'id'=>$new_pd->id_product] )}}"
                                class="btn btn-primary">{{__('sentence.see_details')}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    {{--sản phẩm giảm giá--}}
    <div class=" margin-top">
        <div class="accessories">
            <h3>{{__('sentence.sale_products')}}</h3>
        </div>
        @if(!empty($arIndex['sale']))
        <div class="product-new row">
            @foreach($arIndex['sale'] as $item_sale)
            <div class="col-sm-3 box-product-new box-product-new">
                <div class="new-product-content">
                    <div class="product-new-content">
                        @php
                        $images = json_decode($item_sale->images);
                        $img = reset($images)
                        @endphp
                        <img src="{{asset('images/app/thumbnails/'.$img)}}" alt="">
                        <div class="sale-product">
                            <p>{{$item_sale->sale}}%</p>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <p>{{$item_sale->name_product}}</p>
                    <del>{{number_format($item_sale->price)}} đ</del>
                    @php $price_sale = $item_sale->price - $item_sale->price*$item_sale->sale/100 @endphp
                    <p>{{number_format($price_sale)}} đ</p>
                </div>
                <div class="new-product-button">
                    <a href="{{route('shoes.shoes.product',$item_sale->slug_product)}}" class="btn btn-primary">{{__('sentence.see_details')}}</a>
                </div>
            </div>
            @endforeach
            {{--read more--}}
        </div>
        <div class="row button-read-mode">
            <a href="{{route('shoes.shopping.sale')}}" class="btn btn-primary button-hover">{{__('sentence.see_all')}}</a>
        </div>
        @endif
    </div>
    {{--sản phẩm mới--}}
    <div class=" margin-top">
        <div class="accessories">
            <h3>{{__('sentence.new_products')}}</h3>
        </div>
        @if(!empty($arIndex['new_produts']))
        <div class="product-new row">
            @foreach($arIndex['new_produts'] as $item_sale)
            <div class="col-sm-3 box-product-new box-product-new">
                <div class="new-product-content">
                    <div class="product-new-content">
                        @php
                        $images = json_decode($item_sale->images);
                        $img = reset($images)
                        @endphp
                        <img src="{{asset('images/app/thumbnails/'.$img)}}" alt="">
                        <div class="sale-product">
                            <p>{{$item_sale->sale}}%</p>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <p>{{$item_sale->name_product}}</p>
                    <del>{{number_format($item_sale->price)}} đ</del>
                    @php $price_sale = $item_sale->price - $item_sale->price*$item_sale->sale/100 @endphp
                    <p>{{number_format($price_sale)}} đ</p>
                </div>
                <div class="new-product-button">
                    <a href="{{route('shoes.shoes.product', $item_sale->slug_product)}}" class="btn btn-primary">{{__('sentence.see_details')}}</a>
                </div>
            </div>
            @endforeach
            {{--read more--}}
        </div>
        <div class="row button-read-mode">
            <a href="{{route('shoes.shopping.list')}}" class="btn btn-primary button-hover">{{__('sentence.see_all')}}</a>
        </div>
        @endif
    </div>
</div>
@endsection
