<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/icon.png')}}" type="image/png" sizes="136x136">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title-admin') - Admin </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{asset('/admin/css/metisMenu.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('/admin/css/startmin.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('src-header-admin')
</head>

<body>
    @if (Auth::user()->id_level == 3)
    <script type="text/javascript">
        window.location.href = "/";
    </script>
    @else
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('shoes.admin.index')}}"><img id="nav-logo-img"
                        style="max-height: 140%" src="{{asset('images/logo.png')}}" alt=""></a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="{{route('shoes.shoes.index')}}" target="_blank"><i class="fa fa-home fa-fw"></i>
                        Website</a></li>
            </ul>
            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->fullname }}<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('shoes.auth.logout')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            @include('templates.admin.inc.left-bar')
        </nav>
        @endif
