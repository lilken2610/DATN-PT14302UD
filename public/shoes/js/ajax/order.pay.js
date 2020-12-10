$(document).ready(function () {
    $('#order-pay').submit(function (e) {
        e.preventDefault();
        const id_pay = $('input[name="orderpay"]:checked').val();
     
        if (id_pay == 1) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/thanh-toan',
                data: {
                    id_pay: id_pay
                },
                success: function (data) {
                    if (data == 1) {
                        Swal.fire(
                            'Thông báo!',
                            'Đặt hàng thành công!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/tai-khoan-cua-toi#lich-su";
                            }
                        })
                    }
                }
            });
        }else if(id_pay == 2){
            console.log('id_pay2 ',id_pay);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/thanh-toan',
                data: {
                    id_pay: id_pay,
                    
                },
                success: function (data) {
                    console.log('data ',data)
                    if (data != null) {
                        Swal.fire(
                            'Thống báo!',
                            'Đang chuyển sang trang thanh toán trực tuyến!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/thanh-toan/vnpay/"+data+"";
                            }
                        })
                    }
                }
            });}
         else {
            $('#form-pay').css('display', 'none');
            $('#button-submit').css('display', 'none');
            $('#paypal-button-container').css('display', 'block');
        }
    })
});
