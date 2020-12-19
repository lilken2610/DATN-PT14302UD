@extends('templates.shoes.master')
@section('title') {{$object->title}} @endsection
@section('content')
<div class="container categories margin-res-top" style="margin-top: 150px">
    <div class="col-sm-9 categories-title">
        <a href="{{route('shoes.shoes.index')}}">Trang chủ</a>/
        <a href="{{route('shoes.shoes.news')}}" style="font-weight: 700;color: #333333">Bài viết</a>/
        <a style="font-weight: 700;color: #333333">{{$object->title}}</a>
    </div>
</div>
<div class="container" style="margin-top: 1%">
    <div class="col-sm-9 newDetail">
        <h3>{{$object->title}}</h3>
        <h5 style="padding: 20px 0">{{$object->preview}}</h5>
        <div style="padding: 20px 0">
            @if( !empty($object->picture) )
            <img src="{{asset('images/app/news/'.$object->picture)}}" alt="" style="max-width: 100%">
            @endif
        </div>
        <p>{!! $object->detail !!}</p>
    </div>
    <div class="col-sm-3">
        <div class="categories-bar-left">
            <h3>Bài viết nổi bật</h3>
            <div class="categories-bar-left-container">
                <ul>
                    <li>
                        <div id="">
                            <ul class="list-group custom-popover">
                                @foreach( $newOk as $hot_new )
                                <li class="list-group-item">
                                    <div class="popover-content-cart">
                                        <div class="list-group-item-img">
                                            @if( !empty($hot_new->picture) )
                                            <img src="{{asset('images/app/news/'.$hot_new->picture)}}" alt="">
                                            @else
                                            <img src="{{asset('images/app/news/download.png')}}" alt="">
                                            @endif
                                        </div>
                                        <div class="list-group-item-text new-lq">
                                            @php $slug = \Illuminate\Support\Str::slug($hot_new->title,'-') @endphp
                                            <h5><a href="{{route('shoes.shoes.newDetail',['slug'=>$slug,'id'=>$hot_new->id_new])}}">{{$hot_new->title}}</a></h5>
                                        </div>
                                        <div style="clear: both"></div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
