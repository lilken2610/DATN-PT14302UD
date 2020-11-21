$(document).ready(function () {
    $('#gift-code').submit(function (e) {
        e.preventDefault();
        var gift = $('.gift-code').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/thanh-toan/gift-code',
            data:{ gift:gift },
            success:function(data){
                if ( data!=0 ) {
                    const result = JSON.parse(data);
                    $('#discount-pay').html(result.discount);
                    $('#total-pay').html(result.total);
                }else {
                    alert('Mã này đã hết hạn hoặc không chính xác');
                }
            }
        });
    })
});
