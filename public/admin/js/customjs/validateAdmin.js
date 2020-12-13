$(document).ready(function () {
    $("#formAddCategory").validate({
            rules: {
                namecat: {
                    required: true,
                    minlength: 3
                }
            },
            messages: {
                namecat: {
                    required: "Xin vui lòng nhập tên!",
                    minlength: "Tên quá ngắn!"
                }
            }
        });
    });
    
    $(document).ready(function () {
        $("#formEditCategory").validate({
                rules: {
                    editnamecat: {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    editnamecat: {
                        required: "Xin vui lòng nhập tên!",
                        minlength: "Tên quá ngắn!"
                    }
                }
            });
        });