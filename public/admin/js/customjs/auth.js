$(document).ready(function () {
    $("#form_infor").validate({
        rules: {
            username: {
                required: true
            },
            pwd: {
                required: true,
                minlength: 10,
                maxlength: 255,
            },
            fullname: {
                required: true,
                minlength: 10
            },
            address: {
                required: true
            },
            phone: {
                required: true,
                minlength: 8,
                maxlength: 13
            },
            email: {
                required: true,
                email: true // bắt lỗi định dạng mail
            }    
        },
        messages: {
            username: {
                required: "Xin vui lòng nhập tên tài khoản!"
            },
            pwd: {
                required: "Xin vui lòng nhập mật khẩu!",
                minlength: "Mật khẩu quá ngắn!",
                maxlength: "Mật khẩu quá dài!"
            },
            
            fullname: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!"
            },
            address: {
                required: "Xin vui lòng nhập địa chỉ"
            },
            phone: {
                required: "Xin vui lòng nhập số điện thoại!",
                minlength: "Số điện thoại quá ngắn!",
                maxlength: "Số điện thoại quá dài!"
            },
            email: {
                required: "Xin vui lòng nhập email !",
                email: "Email sai định dạng, xin vui lòng kiểm tra lại !"
            }  
            
        }
    });
});