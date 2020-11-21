$(document).ready(function () {
    $('#gift-code').validate({
        rules: {
            "gift": {
                required: true,
            },
            "value": {
                required: true,
            },
            "qty": {
                required: true,
                min:1,
            },
            "created_at": {
                required: true,
            },
            "end_day": {
                required: true,
            },
        },
        messages: {
            "gift": {
                required: 'Vui lòng nhập mã quà tặng',
            },
            "value": {
                required: 'Vui lòng nhập giá trị',
            },
            "qty": {
                required: 'Vui lòng nhập số lượng',
                min: 'Vui lòng số lượng lớn hơn 1',
            },
            "created_at": {
                required: 'Vui lòng chọn ngày áp dụng',
            },
            "end_day": {
                required: 'Vui lòng nhập ngày kết thúc',
            },
        },
    });
});
