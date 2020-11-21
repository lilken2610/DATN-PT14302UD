function qtyCart(qty,id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url:'/gio-hang/update',
        data:{qty:qty, rowid:id},
        success:function(data){
            const  object = JSON.parse(data);
            $('#'+id).html(object.priceId);
            $('#price_total').html(object.priceTotal);
            $('#tax').html(object.tax);
            $('#total').html(object.total);
        }
    });
}
