@extends('templates.shoes.master')
@section('title') Tin Tức @endsection
@section('content')
    @if(isset($arNew))
    <div class="container news margin-res-top" style="margin-top: 150px">
        <div class="col-sm-9">
            <div class="categories-right">
                @if(isset($arNew))
                    @foreach($arNew['news'] as $value)
                        <div class="container-new">
                            <div class="container-news-content-img">
                                @if(!empty($value->picture))
                                    <img src="{{asset('images/app/news/'.$value->picture)}}" alt="">
                                @else
                                    <img src="{{asset('images/app/news/download.png')}}" style="height: 100% !important;" alt="">
                                @endif
                            </div>
                            <div class="container-news-content-text">
                                @php $slug_new = \Illuminate\Support\Str::slug($value->title,'-') @endphp
                                <h5><a href="{{route('shoes.shoes.newDetail',['slug_new'=>$slug_new,'id'=>$value->id_new])}}">{{$value->title}}</a></h5>
                                <div class="news-preview">
                                    <p>{!! $value->preview !!}</p>
                                </div>
                                <p style="font-size: 12px">Ngày đăng: {{ date( "d/m/Y", strtotime($value->created_at)) }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-3" >
            <div class="categories-bar-left">
                <h3>{{__('sentence.positive_writing')}}</h3>
                <div class="categories-bar-left-container">
                    <ul>
                        <li>
                            <div id="">
                                <ul class="list-group custom-popover" >
                                    @foreach( $arNew['hot_news'] as $hot_new )
                                        <li class="list-group-item">
                                            <div class="popover-content-cart">
                                                <div class="list-group-item-img">
                                                    @if( !empty($hot_new->picture) )
                                                        <img src="{{asset('images/app/news/'.$hot_new->picture)}}" alt="">
                                                    @else
                                                        <img src="{{$urlStorage}}storage/app/news/download.png" alt="">
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
    @endif
@endsection
