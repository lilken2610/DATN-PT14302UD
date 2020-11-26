//Thay đổi giới hạn records và trở về page 1 khi search
function insertParam(key, value) {
    key = escape(key);
    value = escape(value);
    var kvp = document.location.search.substr(1).split("&");
    if (kvp == "") {
        document.location.search = "?" + key + "=" + value;
    } else if (length.kvp == 1) {
        var i = kvp.length;
        var x;
        while (i--) {
            x = kvp[i].split("=");

            if (x[0] == key) {
                x[1] = value;
                kvp[i] = x.join("=");
                break;
            }
        }

        if (i < 0) {
            kvp[kvp.length] = [key, value].join("=");
        }
        document.location.search = kvp.join("&");
    } else {
        var i = kvp.length;
        var y;
        while (i--) {
            y = kvp[i].split("=");
            if (y[0] == "page") {
                y[1] = 1;
                kvp[i] = y.join("=");
            }
            if (y[0] == key) {
                y[1] = value;
                kvp[i] = y.join("=");
                break;
            }
        }

        if (i < 0) {
            kvp[kvp.length] = [key, value].join("=");
        }
        document.location.search = kvp.join("&");
    }
}

function refreshFunctionCategories() {
    document.getElementById("name").value = "";
    document.getElementById("content").value = "";
    document.getElementById("searchCreated_at").value = "";
    document.getElementById("searchUpdated_at").value = "";
}

function refreshFunctionPosts() {
    document.getElementById("title").value = "";
    document.getElementById("shortSummary").value = "";
    document.getElementById("content").value = "";
    document.getElementById("category").value = "";
    document.getElementById("searchCreated_at").value = "";
    document.getElementById("searchUpdated_at").value = "";
}

$(document).ready(function () {
    $("#formCreateCategory").validate({
        rules: {
            name: {
                // đây là trường name của input
                required: true, // không được để trống
                minlength: 5,
                maxlength: 255,
            },
            content: {
                required: true,
                minlength: 10,
                maxlength: 10000,
            },
        },
        messages: {
            name: {
                required: "Xin vui lòng nhập tên thể loại",
                maxlength: "Tên thể loại quá dài vui lòng nhập lại",
                minlength: "Tên thể loại quá ngắn vui lòng nhập lại",
            },
            content: {
                required: "Xin vui lòng nhập nội dung thể loại",
                maxlength: "Nội dung thể loại quá dài vui lòng nhập lại",
                minlength: "Nội dung thể loại quá ngắn vui lòng nhập lại",
            },
        },
    });
});

$(window).load(function () {
    $("#modalSuccess").modal("show");
    $("#modalErrors").modal("show");
    $("#modalDelete").modal("show");
});

var loadFile = function (event) {
    var output = document.getElementById("output");
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src); // free memory
    };
};

$(document).ready(function () {
    $("#formCreatePost").validate({
        rules: {
            image: {
                required: true,
                filesize: 2048,
            },
            title: {
                required: true,
                minlength: 5,
                maxlength: 255,
            },
            shortSummary: {
                required: true,
                minlength: 10,
                maxlength: 500,
            },
            content: {
                required: true,
                minlength: 10,
            },
        },
        messages: {
            image: {
                required: "Xin vui lòng chọn ảnh",
                filesize: "Không quá 2 mb",
            },
            title: {
                required: "Xin vui lòng nhập tiêu đề",
                maxlength: "Tiêu đề quá dài vui lòng nhập lại",
                minlength: "Tiêu đề quá ngắn vui lòng nhập lại",
            },
            shortSummary: {
                required: "Xin vui lòng nhập mô tả ngắn",
                maxlength: "Mô tả ngắn, quá dài vui lòng nhập lại",
                minlength: "Mô tả ngắn, quá ngắn vui lòng nhập lại",
            },
            content: {
                required: "Xin vui lòng nhập nội dung",
                minlength: "Nội dung quá ngắn vui lòng nhập lại",
            },
        },
    });
});
