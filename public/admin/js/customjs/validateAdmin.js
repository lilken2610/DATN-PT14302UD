$(document).ready(function () {
    $("#formEditCategory").validate({
        rules: {
            editnamecat: {
                required: true,
                minlength: 5,
            },
        },
        messages: {
            editnamecat: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!",
            },
        },
    });
});
//thêm bài viết
$(document).ready(function () {
    $("#formAddnew").validate({
        rules: {
            namenew: {
                required: true,
                minlength: 5,
            },
            pic: {
                required: true,
            },
            previewnew: {
                required: true,
                minlength: 20,
            },
            detailnew: {
                required: true,
            },
        },
        messages: {
            namenew: {
                required: "Xin vui lòng nhập tiêu đề!",
                minlength: "Tiêu đề quá ngắn!",
            },
            pic: {
                required: "Vui lòng chọn hình ảnh!",
            },
            previewnew: {
                required: "Xin vui lòng nhập mô tả!",
                minlength: "Mô tả quá ngắn",
            },
            detailnew: {
                required: "Xin vui lòng nhập nội dung bài viết!",
            },
        },
    });
});
//sửa bài viết
$(document).ready(function () {
    $("#editNews").validate({
        rules: {
            namenew: {
                required: true,
                minlength: 10,
            },
            pic: {
                required: true,
            },
            previewnew: {
                required: true,
                minlength: 20,
            },
            detailnew: {
                required: true,
            },
        },
        messages: {
            namenew: {
                required: "Xin vui lòng nhập tiêu đề!",
                minlength: "Tiêu đề quá ngắn!",
            },
            pic: {
                required: "Vui lòng chọn hình ảnh!",
            },
            previewnew: {
                required: "Xin vui lòng nhập mô tả!",
                minlength: "Mô tả quá ngắn",
            },
            detailnew: {
                required: "Xin vui lòng nhập nội dung bài viết!",
            },
        },
    });
});
//thêm slide
$(document).ready(function () {
    $("#product").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
            },
        },
        messages: {
            editnamecat: {
                required: "Xin vui lòng nhập tiêu đề cho slide!",
                minlength: "Tiêu đề cho slide quá ngắn!",
            },
        },
    });
});
//sửa slide
$(document).ready(function () {
    $("#product").validate({
        rules: {
            title: {
                required: true,
                minlength: 5,
            },
        },
        messages: {
            editnamecat: {
                required: "Xin vui lòng nhập tiêu đề cho slide!",
                minlength: "Tiêu đề cho slide quá ngắn!",
            },
        },
    });
});
//thêm user
$(document).ready(function () {
    $("#add-user").validate({
        rules: {
            username: {
                required: true,
                unique: posts,
                minlength: 5,
            },
            fullname: {
                required: true,
                minlength: 4,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                matches: "[0-9]+",
                minlength: 10,
                maxlength: 10,
            },
        },
        messages: {
            username: {
                required: "Username không thể bỏ trống!",
                unique: "Đã có người xài username này rồi!",
                minlength: "Username cần nhiều hơn 5 kí tự",
            },
            fullname: {
                required: "Vui lòng nhập họ tên!",
                minlength: "Vui lòng nhập họ tên đầy đủ!",
            },
            email: {
                required: "Email không thể bỏ trống!",
                email: "Email này đã được đăng kí cho tài khoản khác!",
            },
            phone: {
                required: "Vui lòng nhập số điện thoại!",
                matches: "Số điện thoại phải là kí tự số từ 0-9",
                minlength: "Số điện thoại không đúng!",
                maxlength:
                    "Số điện thoại không đúng, Lưu ý: SĐT đã được chuyển thành 10 số!",
            },
        },
    });
});
