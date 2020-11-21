@extends('templates.shoes.master')
@section('title') Thanh Toán @endsection
@section('content')
    <div class="contact">
        <div class="container margin-res-top" style="margin-top: 150px">
            <div class="col-sm-6 contact-left">
                <h3>Thông tin liên hệ</h3>
                <p><i class="fa fa-map-marker" aria-hidden="true"></i> 72 Nguyễn Xuân Nhĩ, Hải Châu, Đà Nẳng</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> 0362411205</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> binhnguyen280498@gmail.com</p>
                <p><i class="fa fa-facebook" aria-hidden="true"></i> /binhxikeno2</p>
                <div class="gg-map">

                </div>
                <div id="map" style="width:100%;height:400px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.69151896779!2d108.22449321480725!3d16.029566088905355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219fab297947d%3A0x239448f97cb61ede!2zNzIgTmd1eeG7hW4gWHXDom4gTmjEqSwgSG_DoCBDxrDhu51uZyBOYW0sIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZywgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1580984743725!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
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
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại"">
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
