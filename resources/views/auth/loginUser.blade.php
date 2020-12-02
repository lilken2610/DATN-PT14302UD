@extends('templates.shoes.master')
@section('title')
{{Auth::user()->fullname}}
@stop
@section('content')
    <div class="container" style="margin-top: 150px">
        <form action="{{route('shoes.auth.postInfo')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::has('msg'))
                <span style="margin: 10px 0" class="alert-success">{{Session::get('msg')}}</span>
            @elseif(Session::has('error'))
                <span style="margin: 10px 0" class="alert-danger">{{Session::get('error')}}</span>
            @endif
            <div class="col-sm-4">
                <div class="card">
                    @if( Auth::user()->avatar != null )
                        <img id='output' src="{{asset('images/app/users/'. Auth::user()->avatar) }}">
                    @else
                        <img id='output' src="{{asset('images/app/users/notfount.png')}}">
                    @endif
                    <input type='file' name="avatar" accept='image/*' onchange='openFile(event)' style="padding-top: 10px">
                    <div class="card-text">
                        <h4><b>{{ Auth::user()->fullname }}</b></h4>
                    </div>
                </div>
                <div class="profile">
                    <ul>
                        <li><a href=""><i style="color:blue" class="fa fa-user"></i> Hồ sơ</a></li>
                        @if (Auth::user()->email_code)
                        <li><a href="{{route( 'shoes.auth.activeAc',Auth::id() )}}"><i style="color: green" class="fa fa-file-text-o"></i> Kích hoạt tài khoản</a></li>
                        @endif
                        <li><a href=""><i style="color: red" class="fa fa-file-text-o"></i> Lịch sử mua hàng</a></li>
                        <li><a href="{{route('shoes.auth.logoutUser')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8">
                    <div class="form-group" >
                        <div class="form-group">
                            <label for="pwd">Tên đăng nhập:</label>
                            <input type="text" class="form-control" id="pwd" name="username" value="{{ Auth::user()->username }}">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" value="{{ Auth::user()->password }}">
                        </div>
                        <label for="email">Họ tên:</label>
                        <input type="text" class="form-control" id="email" name="fullname" value="{{ Auth::user()->fullname }}">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Địa chỉ:</label>
                        <input type="text" class="form-control" id="pwd" name="address" value="{{ Auth::user()->address }}">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Số điện thoại:</label>
                        <input type="text" class="form-control" id="pwd" name="phone" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Email:</label>
                        <input type="text" class="form-control" id="pwd" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    <input type="submit" class="button btn btn-primary" value="Lưu" />
            </div>
        </form>
    </div>
    <script>
        var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('output');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
@endsection
