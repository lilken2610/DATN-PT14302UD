//Validate đăng nhập
$(document).ready(function () {
    $("#formLogin").validate({
        rules: {
            password: {
                required: true,
                maxlength: 255
            },
            username: {
                required: true,
                maxlength: 255
            }
        },
        messages: {
            password: {
                required: "Xin vui lòng nhập mật khẩu!",
                maxlength: "Mật khẩu quá dài!"
            },
            username: {
                required: "Xin vui lòng nhập tài khoản!",
                maxlength: "Tài khoản quá dài!"
            }
        }
    });
});

// Validate Đặt lại mật khẩu
$(document).ready(function () {
    $("#changePassword").validate({
        rules: {
            password: {
                required: true,
                minlength: 10,
                maxlength: 255,
            },
            re_password: {
                required: true, // không được để trống
                minlength: 10,
                maxlength: 255,
                equalTo: "#password",
            },
        },
        messages: {
            password: {
                required: "Xin vui lòng nhập mật khẩu!",
                minlength: "Mật khẩu quá ngắn!",
                maxlength: "Mật khẩu quá dài!"
            },
            re_password: {
                required: "Xin vui lòng nhập lại mật khẩu !",
                minlength: "Mật khẩu quá ngắn!",
                maxlength: "Mật khẩu quá dài!",
                equalTo: "Mật khẩu không giống nhau !"
            }
        }
    });
});

// Validate Gửi reset mật khẩu
$(document).ready(function () {
    $("#resetPassword").validate({
        rules: {
            email: {
                required: true,
                email: true // bắt lỗi định dạng mail
            }
        },
        messages: {
            email: {
                required: "Xin vui lòng nhập email !",
                email: "Email sai định dạng, xin vui lòng kiểm tra lại !"
            }
        }
    });
});

$(document).ready(function () {
    $("#formSignup").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 10
            },
            username: {
                required: true
            },
            email: {
                required: true,
                email: true // bắt lỗi định dạng mail
            },
            pwd: {
                required: true,
                minlength: 10,
                maxlength: 255,
            },
            pwdreturn: {
                required: true, // không được để trống
                minlength: 10,
                maxlength: 255,
                equalTo: "#pwd",
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
            username: {
                required: "Xin vui lòng nhập tên tài khoản!"
            },
            email: {
                required: "Xin vui lòng nhập email !",
                email: "Email sai định dạng, xin vui lòng kiểm tra lại !"
            },
            pwd: {
                required: "Xin vui lòng nhập mật khẩu!",
                minlength: "Mật khẩu quá ngắn!",
                maxlength: "Mật khẩu quá dài!"
            },
            pwdreturn: {
                required: "Xin vui lòng nhập lại mật khẩu !",
                minlength: "Mật khẩu quá ngắn!",
                maxlength: "Mật khẩu quá dài!",
                equalTo: "Mật khẩu không giống nhau !"
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
$(document).ready(function () {
    $("#formCart").validate({
        rules: {
            quantity: {
                required: true,
                min: 1,
                max: 10
            }
        },
        messages: {
            quantity: {
                required: "Vui lòng nhập số lượng!",
                min: "Số lương lớn hơn 0!",
                max: "Số lượng nhỏ hơn 11!"
            }
        }
    });
});

$(document).ready(function () {
    $("#formAddToCart").validate({
        rules: {
            qty: {
                required: true,
                min: 1,
                max: 10
            }
        },
        messages: {
            qty: {
                required: "Vui lòng nhập số lượng!",
                min: "Số lương lớn hơn 0!",
                max: "Số lượng nhỏ hơn 11!"
            }
        }
    });
});

$(document).ready(function () {
$("#formContact").validate({
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
            title: {
                required: true
            },
            content: {
                required: true
            }
        },
        messages: {
            fullname: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!"
            },
            username: {
                required: "Xin vui lòng nhập tên tài khoản!"
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
            title: {
                required: "Xin vui lòng nhập tiêu đề"
            },
            content: {
                required: "Xin vui lòng nhập nội dung"
            }
        }
    });
});