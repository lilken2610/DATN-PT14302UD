<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Thông tin</th>
        <th>Tổng tiền</th>
        <th>Ngày đặt</th>
    </tr>
    </thead>
    <tbody>
    @php $stt=0 @endphp
    @foreach($object as $value)
        @php $stt++; @endphp
        <tr class="gradeU">
            <td>{!! $stt !!}</td>
            <td>{!! $value->name_product !!}</td>
            <td>
                @php
                    $images = json_decode($value->images);
                    $img = reset($images);
                @endphp
                <img src="{{asset('images/app/products/'.$img)}}" style="max-width: 100px">
            </td>
            <td>
                <p>Size: {{$value->size}}</p>
                <p>SL: {{ $value->qtyTr }}</p>
                <p>Giá: {{ number_format($value->price) }} đ</p>
            </td>
            <td style="text-align: center;">{{ number_format($value->totalproduct) }} đ</td>
            <td>{{ date( "d/m/Y", strtotime($value->dayTr)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
