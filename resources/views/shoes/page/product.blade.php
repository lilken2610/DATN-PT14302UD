@extends('templates.shoes.master')
@section('title') {{$object->name_product}} @endsection
@section('content')
    <div class="container detail-product margin-res-top" style="margin-top: 150px">
        @if(isset($object))
        <div class="col-sm-6">
            <div class="main-carousel">
                @php $images = json_decode($object->images) @endphp
                @foreach($images as $item)
                    <div class="carousel-cell">
                        <a href="{{asset('images/app/products/'.$item)}}" data-fancybox="gallery">
                            <img src="{{asset('images/app/products/'.$item)}}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6">
            <div class="product-right">
                <a href="{{route('shoes.shoes.index')}}">Trang chủ</a>/
                <a href="">{{$object->name_product}}</a>
                <h3>{{$object->name_product}}</h3>
                <div>
                    <span class="pro-rating">
                        @for($i = 1; $i <= 5 ; $i++)
                            <i class="fa fa-star {{ $i<=$object->pro_rating ? 'active' : '' }}"></i>
                        @endfor
                    </span>
                </div>
                @if( !empty($object->sale) )
                    @php
                        $price = $object->price - $object->price*$object->sale/100;
                    @endphp
                    <h4><del>{{number_format($object->price)}}</del> VNĐ</h4>
                    <h4>{{number_format($price)}} VNĐ</h4>
                @else
                    <h4>{{number_format($object->price)}} VNĐ</h4>
                @endif
                <div class="info-cart">
                    <form action="{{route('shoes.shopping.add',$object->id_product)}}" method="post" id="formAddToCart">
                        @csrf
                        <div class="size" id="size-product">
                            <h4>Size</h4>
                            @foreach($getSize as $size)
                                <label class="label-size btn btn-info">{{$size->size}} <input type="radio" name="size" value="{{$size->id_size}}" class="badgebox"><span class="badge">&check;</span></label>
                            @endforeach
                        </div>
                        <span class="alert-danger">{{$errors->first('size')}}</span>
                        <div class="quantity">
                            <input type="button" value="-" class="quantity-buff" onclick="decrementValue()">
                            <input type="text" value="1" name="qty" class="value-qty" maxlength="2" max="10" size="1" id="number">
                            <input type="button" value="+" class="quantity-buff" onclick="incrementValue()">
                        </div>
                        <input  type="submit" style="margin-top: 20px" class="btn btn-primary product-button" value="Thêm vào giỏ hàng" />
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="container information-product margin-top">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'infor-product')" id="defaultOpen">Thông tin bổ sung</button>
            <button class="tablinks" onclick="openCity(event, 'vote')">Đánh giá ({{$rating->count()}})</button>
        </div>

        <div id="infor-product" class="tabcontent">
            {!! $object->description !!}
        </div>

        <div id="vote" class="tabcontent vote" >
            @if( Auth::check() )
                <div id="content-rating">
                    <h4>Đánh giá</h4>
                    <form action="" class="form-group" id="form-rating">
                        <h5>Hãy gởi phản hồi của bạn về sản phẩm giày này !</h5>
                        <div style="padding: 10px">
                            <h6>Đánh giá sao</h6>
                            <span style="margin: 0 15px;" class="list_start">
                            @for($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star" id="ra_content" data-key="{{ $i }}"></i>
                                @endfor
                            </span>
                            <span class="list_text"></span>
                            <input type="hidden" value="" class="number_rating">
                        </div>
                        <div style="clear: both"></div>
                        <div class="form-group">
                            <label for="">Nhận xét của bạn</label>
                            <textarea name="" id="rating-content" cols="5" rows="5" class="form-control" required></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary product-button" value="Gửi đi" />
                    </form>
                </div>
            @else
                <p style="color:red">Nếu bạn muốn đánh giá sản phẩm thì hãy đăng nhập !</p>
            @endif
            <div style="margin-top: 30px" id="result-rating">
                @if( $rating->count()>0 )
                    @foreach($rating as $itemR)
                        <div style="padding: 10px 0">
                            <h5>{{$itemR->username}}</h5>
                            <div style="padding: 10px">
                                <p>{{ $itemR->comment }}</p>
                                <span class="pro-rating">
                                @for($i = 1; $i <= 5 ; $i++)
                                        <i class="fa fa-star {{ $i<=$itemR->rating ? 'active' : '' }}"></i>
                                    @endfor
                                </span>
                                <p><i class="fa fa-clock-o" style="padding-right: 5px"></i>{{$itemR->created_at}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Chưa có đánh giá nào</p>
                @endif
            </div>
        </div>
    </div>

    {{--san pham noi bat--}}
    <div class="container detail-product margin-top">
        <h3>Sản phẩm tương tự</h3>
        <div class="margin-top">
            @foreach($proSameType as $item)
                <div class="col-sm-3">
                    <div class="container-product">
                        <div class="container-product-content">
                            <div class="container-product-content-img">
                                @php
                                    $item_imgs = json_decode($item->images);
                                    $item_img = reset($item_imgs);
                                @endphp
                                <img src="{{asset('images/app/products/'.$item_img)}}" alt="">
                            </div>
                            <div class="container-product-content-text">
                                <p>{{$item->name_product}}</p>
                                <p>{{number_format($item->price)}} VNĐ</p>
                                <a href="{{route('shoes.shoes.product',$item->slug_product)}}" class="btn btn-primary new-product-button" style="opacity: 1">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @section('src-public')
        <script src="{{asset('shoes/js/rating.code.js')}}"></script>
    @endsection
    <script>
        var header = document.getElementById("size-product");
        var btns = header.getElementsByClassName("btn-size");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        };
        /*quantity*/
        function incrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                document.getElementById('number').value = value;
            }
        }
        function decrementValue()
        {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                document.getElementById('number').value = value;
            }

        };
        $(document).ready(function () {
            let listStart = $(".list_start .fa");
            var listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'Tuyệt vời quá',
            };
            listStart.mouseover( function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active');//rơ đánh giá sao

                $(".number_rating").val(number);
                $.each(listStart , function (key,value) {//foreach
                    if(key + 1 <= number)//vì key đì từ 0,=> listRatingText 1 -> 5
                    {
                        $(this).addClass('rating_active');//hover khi click vào
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();//show ra
            });
            $('#form-rating').submit(function (e) {
                e.preventDefault();
                let rating = $('.number_rating').val();
                let content = $('#rating-content').val();
                if( rating>0 ) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'POST',
                        url:'/rating/{{$object->id_product}}',
                        data:{rating:rating, content:content},
                        success:function(data){
                            if( data!=0 ) {
                                alert('Cảm ơn bạn đã góp ý về sản phẩm !');
                                $('#content-rating').hide();
                                $('#result-rating').html(data);
                            }else {

                            }
                        }
                    });
                }else {
                    alert('Vui lòng đánh giá sao !');
                }
            });
        });

    </script>
@endsection
