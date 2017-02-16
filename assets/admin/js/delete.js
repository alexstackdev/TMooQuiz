function delete_quiz($id){
	$url = $('h1.title').attr('data-url');
	var $check = confirm('Bạn chắc chắn muốn xóa đề này không? Nhấn Ok để xóa.');
	if ($check) {
		$.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
            	quiz_id : $id               
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {           
                console.log(data);
                location.href = '';
            }
        });
	}
}