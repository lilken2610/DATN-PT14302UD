<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('shoes.admin.index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Trang chủ</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Quản lý Sản phẩm<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('shoes.categories.index')}}">Danh mục</a>
                    </li>
                    <li>
                        <a href="{{route('shoes.products.index')}}">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="{{route('shoes.size.index')}}">Size</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('shoes.transaction.index')}}"><i class="fa fa-cart-arrow-down fa-fw"></i> Quản lý đơn hàng</a>
            </li>
            <li>
                <a href="{{route('shoes.gift.index')}}"><i class="fa fa-gift fa-fw"></i> Quản lý mã giảm giá </a>
            </li>
            <li>
                <a href="{{route('shoes.news.index')}}"><i class="fa fa-table fa-fw"></i> Quản lý bài đăng</a>
            </li>
            <li>
                <a href="{{route('shoes.slide.index')}}"><i class="fa fa-film fa-fw"></i> Quản lý slide </a>
            </li>
            <li>
                <a href="{{route('shoes.contact.index')}}"><i class="fa fa-envelope-o fa-fw"></i> Quản lý liên hệ </a>
            </li>
            <li>
                <a href="{{route('shoes.user.index')}}"><i class="fa fa-user-md fa-fw"></i> Quản lý người dùng </a>
            </li>
            @if( Auth::user()->username == 'admin' )
            <li>
                <a href="{{route('shoes.statistics.index','20'.date('y'))}}"><i class="fa fa-line-chart fa-fw"></i> Doanh Thu </a>
            </li>
            @endif
        </ul>
    </div>
</div>
