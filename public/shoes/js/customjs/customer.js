$(document).ready(function () {
    $("#formUpdateInfoPayment").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true // bắt lỗi định dạng mail
            },
            phone: {
                required: true,
                minlength: 8,
                maxlength: 13
            },
            address: {
                required: true
            }
        },
        messages: {
            fullname: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!"
            },
            email: {
                required: "Xin vui lòng nhập email !",
                email: "Email sai định dạng, xin vui lòng kiểm tra lại !"
            },  
            phone: {
                required: "Xin vui lòng nhập số điện thoại!",
                minlength: "Số điện thoại quá ngắn!",
                maxlength: "Số điện thoại quá dài!"
            },
            address: {
                required: "Xin vui lòng nhập địa chỉ"
            }
        }
    });
});
