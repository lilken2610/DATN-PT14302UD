$(document).ready(function () {
    var subLg = $('#submit-login');
    subLg.submit(function (e) {
        var user = $('.username').val();
        var pwd  = $('.password').val();
        e.preventDefault();
        $('#login').modal('hide');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/dang-nhap-ajax',
            data:{
                user: user,
                pwd : pwd
            },
            success:function(data){
                if (data == 0) {
                    alert('Sai tài khoản hoặc mật khẩu');
                }else {
                    alert('Đăng nhập thành công');
                    $('.account-user').html("<a href='/tai-khoan-cua-toi'>"+data+"</a>");
                }
            }
        });
    })
});
