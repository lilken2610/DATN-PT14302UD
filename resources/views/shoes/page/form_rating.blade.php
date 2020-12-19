@foreach($arObject as $itemR)
    <div style="padding: 10px 0">
        <h5>{{$itemR->username}}</h5>
        <div style="padding: 10px">
            <p>{{ $itemR->comment }}</p>
            <p><i class="fa fa-clock-o" style="padding-right: 5px"></i>{{$itemR->created_at}}</p>
        </div>
    </div>
@endforeach
