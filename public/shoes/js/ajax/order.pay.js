$(document).ready(function () {
    $('#order-pay').submit(function (e) {
        e.preventDefault();
        const id_pay = $('input[name="orderpay"]:checked').val();
        if ( id_pay == 1 ){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/thanh-toan',
                data:{ id_pay:id_pay },
                success:function(data){
                   if (data==1) {
                       alert('Đặt hàng thành công !');
                       window.location.href='/';
                   }
                }
            });
        }else {
            $('#form-pay').css('display','none');
            $('#button-submit').css('display','none');
            $('#paypal-button-container').css('display','block');
        }
    })
});
