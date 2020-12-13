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
                            'Thống báo!',
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
        } else if (id_pay == 2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/thanh-toan/tt',
                data: {
                    id_pay: id_pay,

                },
                success: function (data) {
                    if (data != null) {
                        let timerInterval
                        Swal.fire({
                            title: 'Thống báo!',
                            html: 'Đang chuyển sang trang thanh toán trực tuyến sau <strong></strong> giây.',
                            timer: 5000,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                    var times = Swal.getTimerLeft() / 1000;
                                    var timeTrunc = Math.trunc(times);
                                    Swal.getContent().querySelector('strong')
                                        .textContent = timeTrunc
                                }, 1000)
                            },
                            onClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/thanh-toan/vnpay/" + data + "";
                            } else {
                                if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.timer
                                ) {
                                    window.location.href = "/thanh-toan/vnpay/" + data + "";
                                }
                            }
                        })
                    }
                }
            });
        }
        else {
            $('#form-pay').css('display', 'none');
            $('#button-submit').css('display', 'none');
            $('#paypal-button-container').css('display', 'block');
        }
    })
    // $('#payment-vnpay').submit(function (e) {
    //     e.preventDefault();
    //     const order_id = document.getElementById("order_id").textContent;
    //     const amount = document.getElementById("amount").textContent;
    //     const order_desc = document.getElementById("order_desc").textContent;
    //     const bank_code = document.getElementById("bank_code");
    //     const id_bank_code = bank_code.selectedIndex;
    //     const language = document.getElementById("language");
    //     const id_language = language.selectedIndex;
    //     alert(order_desc)
    //         $.ajax({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             type: 'POST',
    //             url: '/thanh-toan/vnp',
    //             data: {
    //                 order_id: order_id,
    //                 amount: amount,
    //                 order_desc: order_desc,
    //                 bank_code: id_bank_code,
    //                 language: id_language,
    //             },
    //             success: function (data) {
    //                 if (data != null) {
    //                     alert(data)

    //                     let timerInterval
    //                     Swal.fire({
    //                         title: 'Thống báo!',
    //                         html: 'Đang chuyển sang trang thanh toán trực tuyến sau <strong></strong> giây.',
    //                         timer: 5000,
    //                         onBeforeOpen: () => {
    //                             Swal.showLoading()
    //                             timerInterval = setInterval(() => {
    //                                 var times = Swal.getTimerLeft() / 1000;
    //                                 var timeTrunc = Math.trunc(times);
    //                                 Swal.getContent().querySelector('strong')
    //                                     .textContent = timeTrunc
    //                             }, 1000)
    //                         },
    //                         onClose: () => {
    //                             clearInterval(timerInterval)
    //                         }
    //                     }).then((result) => {
    //                         if (result.isConfirmed) {
    //                             window.location.href =data;
    //                         } else {
    //                             if (
    //                                 /* Read more about handling dismissals below */
    //                                 result.dismiss === Swal.DismissReason.timer
    //                             ) {
    //                                 // http://shopshoe.com:8000/thanh-toan/vnpay/0http://sandbox.vnpayment.vn/paymentv2/vpcpay.html?vnp_Amount=62400000&vnp_BankCode=0&vnp_Command=pay&vnp_CreateDate=20201212085830&vnp_CurrCode=VND&vnp_IpAddr=127.0.0.1&vnp_Locale=0&vnp_OrderInfo=Thanh+to%C3%A1n+h%C3%B3a+%C4%91%C6%A1n+mua+h%C3%A0ng+t%E1%BA%A1i+shopshoe.com&vnp_ReturnUrl=http%3A%2F%2Fshopshoe.com%3A8000%2Fthanh-toan%2Ftc&vnp_TmnCode=F60Y3QL1&vnp_TxnRef=161&vnp_Version=2.0.0&vnp_SecureHashType=SHA256&vnp_SecureHash=e0b9af04d84342d355e40ac8f878b3b9af0f395745deb1105d963caeedfc2f2b
    //                                 window.location.href = data;
    //                             }
    //                         }
    //                     })
    //                 }
    //             }
    //         });
    // })
});
