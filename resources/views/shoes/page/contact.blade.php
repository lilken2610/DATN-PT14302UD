@extends('templates.shoes.master')
@section('title') Thanh Toán @endsection
@section('content')
    <div class="contact">
        <div class="container margin-res-top" style="margin-top: 150px">
            <div class="col-sm-6 contact-left">
                <h3>Thông tin liên hệ</h3>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 137 Nguyễn Thị Thập, Thanh Khê Tây, Liên Chiểu, Đà Nẵng </p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> 0336751070 </p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> trungthinh2610@gmail.com</p>
                <div class="gg-map">

                </div>
                <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                    <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                    var setting = {"height":400,"width":600,"zoom":17,"queryString":"137 Nguyễn Thị Thập, Hòa Minh, Liên Chiểu, Đà Nẵng, Vietnam","place_id":"ChIJ9WYu5-YYQjERCjdVLQ6aYUY","satellite":false,"centerCoord":[16.07578265457635,108.16998310000001],"cid":"0x46619a0e2d55370a","lang":"en","cityUrl":"/vietnam/da-nang-33810","cityAnchorText":"Map of Da Nang, Da Nang Municipality, Vietnam","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"315724"};
                    var d = document;
                    var s = d.createElement('script');
                    s.src = 'https://1map.com/js/script-for-user.js?embed_id=315724';
                    s.async = true;
                    s.onload = function (e) {
                      window.OneMap.initMap(setting)
                    };
                    var to = d.getElementsByTagName('script')[0];
                    to.parentNode.insertBefore(s, to);
                  })();</script><a href="https://1map.com/map-embed">1 Map</a></div>
            </div>
            <div class="col-sm-6 contact-right">
                <form action="{{route('shoes.shoes.postContact')}}" method="post">
                    @csrf
                    <div class="form-group col-sm-6 form-left" >
                        <input type="text" class="form-control" name="fullname" placeholder="Họ tên" >
                    </div>
                    <div class="form-group col-sm-6 form-right" >
                        <input type="text" class="form-control" name="email" placeholder="Email" >
                    </div>
                    <div class="form-group col-sm-6 form-left" >
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group col-sm-6 form-right" >
                        <input type="text" class="form-control" name="title" placeholder="Tiêu dề" name="pwd">
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="" cols="5" rows="5" class="form-control" placeholder="Lời nhắn"></textarea>
                    </div>
                    <input type="submit" class="button btn btn-primary" value="Gởi">
                </form>
            </div>
        </div>
    </div>
@endsection
