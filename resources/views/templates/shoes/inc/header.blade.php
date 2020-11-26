<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Epic Shoes | @yield('title')</title>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="{{asset('shoes/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('shoes/css/responsive.css')}}">
    <!-- font -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    {{--flickity--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css">
    {{--fancybox--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    {{--form awwesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--ajax--}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.1/sweetalert2.all.min.js"
        integrity="sha512-8ehqhNuD1bseIPwrxDUkt2VcYdhvHJptB5vmVCWwCqJShQdOq7gnj4FfXEUnNMfRaWN2/q7yXBO4cboaRloP8w=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.1/sweetalert2.min.css"
        integrity="sha512-zEmgzrofH7rifnTAgSqWXGWF8rux/+gbtEQ1OJYYW57J1eEQDjppSv7oByOdvSJfo0H39LxmCyQTLOYFOa8wig=="
        crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="{{asset('admin/js/customjs/login.js')}}"></script>
        <link rel="stylesheet" href="{{asset('admin/css/customCss/admin.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div id="wrapper">
        <header>
            <div id="navbar">
                <div class="header-scroll">
                    <div class="header-menu-logo container">
                        <div class="bar-header account-user">
                            @if ( Auth::check() )
                            <div class="dropdown">
                                <a href="" data-toggle="dropdown"
                                    class="dropdown-toggle">{{ Auth::user()->fullname }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('shoes.auth.info')}}">Tài khoản</a></li>
                                    <li><a href="{{route('shoes.auth.logoutUser')}}">Đăng xuất</a></li>
                                </ul>
                            </div>
                            @else
                            <a href="{{route('shoes.auth.getLoginUser')}}">Đăng nhập</a>/
                            <a href="{{route('shoes.auth.signUp')}}">Đăng ký</a>
                            @endif
                        </div>
                        <div class="bar-header-logo">
                            <a href="{{route('shoes.shoes.index')}}">
                                <img id="nav-logo-img" src="{{asset('images/file/payment3.png')}}" alt="">
                            </a>
                        </div>
                        <form action="/tim-kiem" method="GET">
                            <div class="bar-header">
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="keyword" @if (!empty($keyword))
                                        value="{{$keyword}}" @else placeholder="Tìm kiếm..." @endif>
                                    <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="bar-header" style="text-align: right;">
                            @if( Cart::count() > 0 )
                            @php $title = 'Tổng: '.Cart::total(0).'đ'; @endphp
                            @else
                            @php $title = 'Giỏ hàng trống '; @endphp
                            @endif
                            <a href="{{route('shoes.shopping.index')}}" data-toggle="popover" data-placement="bottom"
                                data-toggle="popover" data-trigger="hover" title="{{$title}}">Giỏ hàng <i
                                    class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            <!-- loaded popover content -->
                            @if( Cart::count() > 0 )
                            <div id="popover-content" style="display: none">
                                <ul class="list-group custom-popover">
                                    @foreach(Cart::content() as $item_cart )
                                    <li class="list-group-item">
                                        <div class="popover-content-cart">
                                            <div class="list-group-item-img">
                                                <img src="{{ asset('images/app/products/'.$item_cart->options->image)}}"
                                                    alt="">
                                            </div>
                                            <div class="list-group-item-text">
                                                <p>{{$item_cart->name}}</p>
                                                <p class="popover-price">{{$item_cart->qty}} x {{$item_cart->price}} VNĐ
                                                </p>
                                            </div>
                                            <div style="clear: both"></div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="menu-mobile">
                            <label for="show-menu-mobile">
                                <i class="fa fa-bars"></i>
                            </label>
                        </div>
                        <input hidden type="checkbox" class="nav__input" id="show-menu-mobile">
                        <label for="show-menu-mobile" class="nav-overlay"></label>
                        {{--nav mobile--}}
                        <nav class="navbar-mobile">

                            <form action="/tim-kiem" method="GET">
                                <div class="bar-mobile">
                                    <div class="searchbar">
                                        <input class="search_input" type="text" name="keyword" @if (!empty($keyword))
                                            value="{{$keyword}}" @else placeholder="Tìm kiếm..." @endif>
                                        <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <div class="cart-mobile">
                                <a href="{{route('shoes.shopping.index')}}" style="color:red">Giỏ hàng
                                    <i>{{Cart::total(0)}} đ</i>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{route('shoes.shoes.index')}}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="">Loại sản phẩm</a>
                                    <div class="sub-menu">
                                        <ul>
                                            @foreach ($menu as $item)
                                        <li><a href="/the-loai/{{$item->slug_cat}}">{{$item->name_cat}}</a>
                                            </li>                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>   
                                <li>
                                    <a href="{{route('shoes.shoes.news')}}">Tin tức</a>
                                </li>
                                <li>
                                    <a href="{{route('shoes.shoes.contact')}}">Liên hệ</a>
                                </li>
                                <div style="border-top: 1px solid #ddd">
                                    <li>
                                        <a href="">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="{{route('shoes.auth.signUp')}}">Đăng ký</a>
                                    </li>
                                </div>
                            </ul>
                            <div class="close-mobile">
                                <label for="show-menu-mobile">
                                    <i class="fa fa-times" style="color:#333;font-size: 20px" aria-hidden="true"></i>
                                </label>
                            </div>
                        </nav>
                    </div>
                    {{--nav pc--}}
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid" id="myTopnav">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('shoes.shoes.index')}}">Trang chủ</a></li>
                                <li>
                                    <a href="">Loại sản phẩm</a>
                                    <div class="sub-menu">
                                        <ul>
                                            @foreach ($menu as $item)
                                        <li><a href="/the-loai/{{$item->slug_cat}}">{{$item->name_cat}}</a>
                                            </li>                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="">Thương hiệu</a>
                                    <div class="sub-menu">
                                        <ul>
                                            @foreach ($menuBrand as $item)
                                        <li><a href="/thuong-hieu/{{$item->slug_brand}}">{{$item->name_brand}}</a>
                                            </li>                                                
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{route('shoes.shoes.news')}}">Tin Tức</a>
                                </li>
                                <li><a href="{{route('shoes.shoes.contact')}}">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            {{--form modal registration--}}
            <div class="modal fade" id="login" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Đăng nhập</h4>
                        </div>
                        <form method="get" action="" id="submit-login">
                            @csrf
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                    <input type="text" name="username" class="username form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên đăng nhập"
                                        required="Vui lòng nhập tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu</label>
                                    <input type="password" name="password" class="password form-control"
                                        id="exampleInputPassword1" placeholder="Mật khẩu" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Đăng nhập">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <script src="{{asset('shoes/js/ajax.login.js')}}"></script>
            {{--form modal login--}}

        </header>
