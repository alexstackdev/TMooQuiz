$(function(){
	$('.change-pass').css('display', 'none');
	$('#edit-pass').click(function(){
		$('.change-pass').css('display', 'block');
	})
	$('#close').click(function(){
		$('.change-pass').css('display', 'none');
	})
})

// sự kiện xác nhận đổi mật khẩu
$('#ok-change-pass').click(function(){
	$old_pass = $('#old-pass').val();
	$new_pass = $('#new-pass').val();
	if ($old_pass =='' || $new_pass == '') {
		$('#alert-pass').removeClass('hidden');
		$('#alert-pass').html('Vui lòng không để trống dữ liệu');
	} else {
		$url = $('#alert-pass').attr('data-url');
		var pattern = /^[a-zA-Z0-9_-]{6,16}$/;
		if (pattern.test($new_pass) ) {
			// thực hiện ajax
			$.ajax({
				url: $url,
				type: 'post',
				data: {
					old_pass: $old_pass,
					new_pass: $new_pass
				},
				success : function($data){
					if ($data == 1) {
						$('#alert-pass').removeClass('hidden');
						$('#alert-pass').removeClass('alert-danger');
						$('#alert-pass').addClass('alert-success');
						$('#alert-pass').html('Đổi mật khẩu thành công !');
						$('#close').click();
						$('.reset-form').click();
						console.log($data);
					} 
					if ($data == 0) {
						$('#alert-pass').removeClass('hidden');
						$('#alert-pass').html('Mật khẩu hiện tại không đúng , vui lòng nhập lại !');
						console.log($data);
					}
					if ($data == 2) {
						$('#alert-pass').removeClass('hidden');
						$('#alert-pass').html('Có lỗi xảy ra , vui lòng thử lại!');
						$('.reset-form').click();
						console.log($data);
					}
				}
			});
		} else {
			$('#alert-pass').removeClass('hidden');
			$('#alert-pass').html('Mật khẩu mới không được có ký tự đặc biệt , có độ dài từ 6 - 16');
		}
	}
})

$fullname = $('#myname').val();
$gmail = $('#my-gmail').val();
$fb = $('#my-fb').val();
$('#ok-change').click(function(){
	$new_name = $('#myname').val();
	$new_gmail = $('#my-gmail').val();
	$new_fb = $('#my-fb').val();
	if ($new_name == '') {
		$('#alert-change').removeClass('hidden');
		$('#alert-change').html('Tên của bạn không được để trống !');
	}
	else {
		// thực hiện ajax
		$url1 = $('#alert-change').attr('data-url');
		$.ajax({
			url: $url1,
			type: 'post',
			data: {
				new_name: $new_name,
				new_gmail: $new_gmail,
				new_fb: $new_fb
			},
			success : function($data){
				if ($data == 1) {
					$('#alert-change').removeClass('hidden');
					$('#alert-change').removeClass('alert-danger');
					$('#alert-change').addClass('alert-success');
					$('#alert-change').html('Thay đổi thông tin thành công !');
				}
				if ($data == 0) {
					$('#alert-change').removeClass('hidden');
					$('#alert-change').html('Có lỗi xảy ra, vui lòng thử lại !');
				}
			}
		})
	}
})
