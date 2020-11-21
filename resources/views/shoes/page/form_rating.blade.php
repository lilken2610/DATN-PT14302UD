@foreach($arObject as $itemR)
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
