var pattern = /^[a-zA-Z0-9_-]{6,16}$/;
// Bắt sự kiện click vào nút Đăng nhập
$('#submit_signup').on('click', function() {
    // Gán các giá trị trong form đăng nhập vào các biến
    $url = $('#formSignup').attr('data-url');
    $user_signup = $('#user_signup').val();
    $pass_signup = $('#pass_signup').val();
    $fullname = $('#fullname').val();
    $capt = $('#captcha').val();
    $re_capt = $('#re_captcha').val();
    if ($capt != $re_capt) {
            // Hiển thị thông báo lỗi
            $('#formSignup .alert').removeClass('hidden');
            $('#formSignup .alert').html('Mã captcha không đúng. Vui lòng nhập lại');
        }
    // Nếu một trong các biến này rỗng
    else if ($user_signup == '' || $pass_signup == '' || $fullname == '')
    {
        // Hiển thị thông báo lỗi
        $('#formSignup .alert').removeClass('hidden');
        $('#formSignup .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    // Ngược lại
    else
    {
        if (pattern.test($user_signup) && pattern.test($pass_signup)) {
            // Thực thi gửi dữ liệu bằng Ajax
            $.ajax({
                url : $url, // Đường dẫn file nhận dữ liệu
                type : 'POST', // Phương thức gửi dữ liệu
                // Các dữ liệu
                data : {
                    username : $user_signup,
                    pass : $pass_signup,
                    fullname : $fullname
                // Thực thi khi gửi dữ liệu thành công
                }, success : function(data) {
                    $('#formSignup .alert').removeClass('hidden');
                    $('#formSignup .alert').html(data);
                    $('.reset-form').click();
                }
            });
        }
        else
        {
            // Hiển thị thông báo lỗi
            $('#formSignup .alert').removeClass('hidden');
            $('#formSignup .alert').html('Tài khoản hoặc mật khẩu không được có ký tự đặc biệt, có độ dài từ 6-16 ký tự!');
        }
    }
});