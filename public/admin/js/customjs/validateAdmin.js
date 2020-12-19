//validate-add-danh-muc
$(document).ready(function () {
    $("#formAddCategory").validate({
        rules: {
            namecat: {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            namecat: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!",
            },
        },
    });
});
//validate-edit-danh-muc
$(document).ready(function () {
    $("#formEditCategory").validate({
        rules: {
            editnamecat: {
                required: true,
                minlength: 3,
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

//validate-add-thuong-hieu
$(document).ready(function () {
    $("#formAddBrand").validate({
        rules: {
            namebrand: {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            namebrand: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!",
            },
        },
    });
});
//validate-edit-thuong-hieu
$(document).ready(function () {
    $("#formEditBrand").validate({
        rules: {
            editnamebrand: {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            editnamebrand: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!",
            },
        },
    });
});
//validate-add-san-pham

$(document).ready(function () {
    $("#product").validate({
        rules: {
            nameproduct: {
                required: true,
                minlength: 3
            },
            preview: {
                required: true,
                minlength: 20
            },
            price: {
                required: true,
                min: 0
            },
            sale: {
                required: true,
                min: 0
            },
            'ch_name[]': {
                required: true,
            },
            idcat: {
                required: true,
                min: 0
            },
            idbrand: {
                required: true,
                min: 0
            },
            "img[]": {
                required: true,
                
            }                

        },
        messages: {
            nameproduct: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!"
            },
            preview: {
                required: "Xin vui lòng nhập Mô tả!",
                minlength: "Mô tả phải hơn 20 kí tự"
            },
            sale: {
                required: "Không được để trống",
                min: "Phải lớn hơn 0"
            },
            'ch_name[]': {
                required: "Vui lòng chọn size",
            },
            idcat: {
                required: "Vui lòng chọn Thể loại",
                min: "Vui lòng chọn Thể loại"
            },
            idbrand: {
                required: "Vui lòng chọn thương hiệu",
                min: "Vui lòng chọn thương hiệu"
            },
            "img[]": {
                required: "Vui lòng chọn Hình ảnh",
                
            }  

        }
    });
});
$(document).ready(function () {
    $("#Editproduct").validate({
        rules: {
            nameproduct: {
                required: true,
                minlength: 3
            },
            idcat: {
                required: true,
                min:0
            },
            idbrand: {
                required: true,
                min:0
            },
            'imgedit[]': {
                required: true,
            },
            price: {
                required: true,
                min:0,
                max:10000000
                
            },
            sale: {
                required: true,
                min:0,
                max:100
                
            },
            preview: {
                required: true,
                minlength: 10
            },
            detail: {
                required: true,
                minlength: 10
            }
            
                     

        },
        messages: {
            nameproduct: {
                required: "Xin vui lòng nhập tên!",
                minlength: "Tên quá ngắn!"
            },
            idcat: {
                required: "Vui lòng chọn thể loại",
                min:"Vui lòng chọn thể loại"
            },
            idbrand: {
                required: "Vui lòng chọn thương hiệu",
                min:"Vui lòng chọn thể loại"
            },
            'imgedit[]': {
                required: "Vui lòng chọn hình ảnh",
            },
            price: {
                required: "Vui lòng chọn giá",
                min: "Giá phải lớn hơn 0",
                max: "Giá phải nhỏ hơn 10.000.000"

            },
            price: {
                required: "Vui lòng chọn giảm giá",
                min: "Giảm giá phải lớn hơn 0",
                max: "giảm giá phải nhỏ hơn 100"

            },
            preview: {
                required: "Vui lòng điền Mô tả",
                minlength: "Số lượng kí tự lớn hơn 10"
            },
            detail: {
                required: "Vui lòng điền Mô tả",
                minlength: "Số lượng kí tự lớn hơn 10"
            }

            
        }
    });
});

